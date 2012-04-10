<?php if ($contest) : ?>
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
			<form class="block-content form" id="complex_form" method="post"
				action="">
				<h1>Uczestnicy</h1>

				<div class="columns">

					<div class="col200pxL-left">
						<h2>Wybierz sezon</h2>

						<ul class="side-tabs js-tabs same-height">
							<?php $x = $contest->getSeasons(); while($s = $x->fetchObject()) { ?>
							<li><a href="#sezon-<?php echo $s->sezon ?>" title="Sezon 2008">Sezon <?php echo $s->sezon ?></a></li>
							<?php } ?>
						</ul>

					</div>
					<div class="col200pxL-right">
						<?php $f = $contest->getSeasons(); 
								while($ss = $f->fetchObject()) { ?>
						<div id="sezon-<?php echo $ss->sezon ?>" class="tabs-content">
							<ul class="tabs js-tabs same-height">
								<?php $s = $contest->getSkocznie($ss->sezon); while($x = $s->fetchObject()) { ?>
									<li><a href="#skocznia-n<?php echo $x->idSkoczni; ?>-<?php echo $ss->sezon ?>" title="<?php echo $x->nSkoczni?>"><?php echo $x->nSkoczni?></a></li>
								<?php } ?>
							</ul>
							
							<div>					
								<?php $s = $contest->getSkocznie($ss->sezon); while($x = $s->fetchObject()) { ?>
								<div id="skocznia-n<?php echo $x->idSkoczni ?>-<?php echo $ss->sezon ?>" class="tabs-content">
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
											
											<?php $p = $contest->getWynikiBySezonSkocznia($ss->sezon, $x->idSkoczni); while($n = $p->fetchObject()) { ?>
											<tr>
												<!--onclick="document.location.href='/skoczek/details/<?php echo $n->nazwa ?>.html';"
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
								</div>
								<?php } ?>
							</div>
							<div class="clear"></div>
						</div>
					<?php } ?>
					</div>
				</div>
			</form>
		</div>

		<div class="clear"></div>
	</section>
</article>
<?php else : ?>
<?php echo lib_View::factory('trener/not_exists'); ?>
<?php endif; ?>