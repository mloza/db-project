<?php if ($contest) : ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.add-score').submit(function(e) { 
			e.preventDefault(); 
			window.cv = $(this).find('fieldset');
			window.cvhtml = $(this).find('fieldset').html();
			window.vart = $(this).serialize();
			$.post('/zawody/add.html?method=ajax', $(this).serialize(), function(r) { 
				window.cv.html(r.html); 
				setTimeout(function() { window.cv.fadeOut(1000, function() { window.cv.html(window.cvhtml).fadeIn(1000); }); }, 2000); 
				if(r.success == '1')
				{
					x = $('<tr><th scope="row"></th></tr>');
					x.append('<td>'+r.imie+'</td>');
					x.append('<td>'+r.nazwisko+'</td>');
					x.append('<td>'+r.odl+'</td>');
					x.append('<td>'+r.pkt+'</td>');
					x.append('<td>'+r.date+'</td>');
					window.cv.parent().parent().find('.table tbody').append(x);
				}
			}, 'json');
			$(this).find('fieldset').html('Dodawanie...');
		});
	});
</script>

<article class="container_12">
	<section class="grid_12">
		<div class="block-border">
			<div class="block-content">
				<div class="h1">
					<h1>Szczegóły zawodów</h1>
				</div>
				<form class="form">
					<fieldset class="grey-bg grid_2">
						<legend>Nazwa</legend>
						<div class="">
							<strong><?php echo $contest->nazwa ?> </strong>
						</div>

						<div class="clear"></div>
					</fieldset>
					<fieldset class="grey-bg grid_2">
						<legend>Typ</legend>
						<div class="">
							<strong><?php echo $contest->typ ?> </strong>
						</div>

						<div class="clear"></div>
					</fieldset>
					</form>
				<div class="clear"></div>
			</div>
		</div>
				<br> <br>
		<div class="block-border">

				<h1>Uczestnicy</h1>

				<div class="columns">

					<div class="col200pxL-left">
						<h2>Wybierz sezon</h2>

						<ul class="side-tabs js-tabs same-height">
							<?php $x = $contest->getSeasons();
	while ($s = $x->fetchObject()) { ?>
							<li><a href="#sezon-<?php echo $s->sezon ?>" title="Sezon 2008">Sezon <?php echo $s
				->sezon ?></a></li>
							<?php } ?>
						</ul>

					</div>
					<div class="col200pxL-right">
						<?php $f = $contest->getSeasons();
	while ($ss = $f->fetchObject()) {
						?>
						<div id="sezon-<?php echo $ss->sezon ?>" class="tabs-content">
							<ul class="tabs js-tabs same-height">
								<?php $s = $contest->getSkocznie($ss->sezon);
		while ($x = $s->fetchObject()) { ?>
									<li><a href="#skocznia-n<?php echo $x
					->idSkoczni; ?>-<?php echo $ss->sezon ?>" title="<?php echo $x
					->nSkoczni ?>"><?php echo $x->nSkoczni ?></a></li>
								<?php } ?>
							</ul>
							
							<div>					
								<?php $s = $contest->getSkocznie($ss->sezon);
		while ($x = $s->fetchObject()) { ?>
								<div id="skocznia-n<?php echo $x->idSkoczni ?>-<?php echo $ss
					->sezon ?>" class="tabs-content">
									<table class="table" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th class="black-cell"></th>
												<th scope="col">Imię</th>
												<th scope="col">Nazwisko</th>
												<th scope="col">Odległość</th>
												<th scope="col">Punkty</th>
												<th scope="col">Data</th>
												
										</thead>
	
										<tbody>
											
											<?php $p = $contest
					->getWynikiBySezonSkocznia($ss->sezon, $x->idSkoczni);
			while ($n = $p->fetchObject()) { ?>
											<tr>
												<!--onclick="document.location.href='/skoczek/details/<?php echo $n
						->nazwa ?>.html';"
												style="cursor: pointer;"> -->
												<th scope="row" class="table-check-cell"><input
													type="checkbox" name="selected[]" id="table-selected-1"
													value="1"></th>
												<td><?php echo $n->imie ?></td>
												<td><?php echo $n->nazwisko ?></td>
												<td><?php echo $n->odleglosc ?></td>
												<td><?php echo $n->punkty ?></td>
												<td><?php echo $n->data ?></td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
									
									<form class="form add-score" id="tab-stats" method="post" action="" style="height: 300px;">
										<fieldset class="grey-bg ">
											<legend><a href="#">Dodaj wynik</a></legend>
											<input type="hidden" name="skocznia" value="<?php echo $x->idSkoczni ?>">
											<input type="hidden" name="sezon" value="<?php echo $ss->sezon ?>">
											<input type="hidden" name="zawody" value="<?php echo $contest->nazwa; ?>">
											<div class="float-left gutter-right">
												<span class="label">Skoczek</span>
												<select name="skoczek" id="stats-sites-0">
													<?php foreach($skoczkowie as $i): ?>
														<option value="<?php echo $i['idSkoczka']?>"><?php echo $i['imie'] ,' ',$i['nazwisko']?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class="float-left gutter-right">
												<label for="stats-period">Odległość</label>
												<span class="input-type-text"><input type="text" name="odl" id="stats-period" value="" placeholder="Odległość w metrach..."></span>
											</div>
											<div class="float-left gutter-right">
												<label for="stats-period">Punkty</label>
												<span class="input-type-text"><input type="text" name="pkt" id="stats-period" value="" placeholder="Suma punktów"></span>
											</div>
											<div class="float-left gutter-right">
												<label for="stats-period">Data</label>
												<span class="input-type-text"><input type="text" name="date" id="stats-period" value="" placeholder="YYYY-MM-DD"></span>
											</div>
											<div class="float-left gutter-right">
												<span class="label">Typ</span>
												<p class="input-height grey-bg">
													<input type="radio" name="typ" id="stats-sites-0" value="Indywidualne" checked="checked">&nbsp;<label for="stats-sites-0">Indywidualne</label> 
													<input type="radio" name="typ" id="stats-sites-1" value="Drużynowe" >&nbsp;<label for="stats-sites-1">Drużynowe</label>
												</p>
											</div>
											<div class="float-left">
												<span class="label">&nbsp;</span>
												<button type="submit">Dodaj</button>
											</div>
										</fieldset>		
									</form>
									<div class="clear"></div>
								</div>
								<?php } ?>
							</div>
							<div class="clear"></div>
						</div>
					<?php } ?>
					</div>
				</div>

		</div>

		<div class="clear"></div>
	</section>
</article>
<?php else : ?>
<?php echo lib_View::factory('trener/not_exists'); ?>
<?php endif; ?>