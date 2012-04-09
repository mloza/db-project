<?php if ($arbiter) : ?>
<article class="container_12">
	<section class="grid_12">
		<div class="block-border">
			<div class="block-content">
				<div class="h1">
					<h1>Szczegóły arbitra</h1>
				</div>
				<form class="form">
					<fieldset class="grey-bg grid_4">
						<legend>Imię i nazwisko</legend>
						<div class="">
							<strong><?php echo $arbiter->imie.' '.$arbiter->nazwisko ?> </strong>
						</div>

						<div class="clear"></div>
					</fieldset>
					<fieldset class="grey-bg grid_3">
						<legend>Data urodzenia</legend>
						<div class="">
							<strong><?php echo $arbiter->dataUrodzenia ?> </strong>
						</div>
						<div class="clear"></div>
					</fieldset>
					<fieldset class="grey-bg grid_3">
						<legend>Narodowość</legend>
						<div class="">
							<strong><?php echo $arbiter->narodowosc ?> </strong>
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
				<h1>Sędziowane zawody</h1>

				<div class="columns">

					<div class="col200pxL-left">
						<h2>Wybierz sezon</h2>

						<ul class="side-tabs js-tabs same-height">

							<li><a href="#one" title="Sezon 2008">Sezon 2008</a></li>

							<li><a href="#two" title="Sezon 2009">Sezon 2009</a></li>

							<li><a href="#three" title="Sezon 2010">Sezon 2010</a></li>

							<li><a href="#four" title="Sezon 2011">Sezon 2011</a></li>

						</ul>

					</div>
					<div class="col200pxL-right">

						<div id="one" class="tabs-content">
							<div>
								<table class="table" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th class="black-cell"></th>
											<th scope="col">Zawody</th>
											<th scope="col">Skocznia</th>
									</thead>

									<tbody>
										<?php  $p = $arbiter->getWyniki(2008); while($n = $p->fetchObject()) { ?>
										<tr>
											<!--onclick="document.location.href='/skoczek/details/<?php echo $n->idSedziego ?>.html';"
											style="cursor: pointer;"> -->
											<th scope="row" class="table-check-cell"><input
												type="checkbox" name="selected[]" id="table-selected-1"
												value="1"></th>
											<td><?php echo $n->name ?></td>
											<td><?php echo $n->nazwaskoczni ?></td>
											
										</tr>
										<?php } ?>
									</tbody>

								</table>
							</div>
							<div class="clear"></div>
						</div>

						<div id="two" class="tabs-content">

							<div>
								<table class="table" cellspacing="0" width="100%">

									<thead>
										<tr>
											<th class="black-cell"></th>
											<th scope="col">Zawody</th>
											<th scope="col">Skocznia</th>
									
									</thead>

									<tbody>
										<?php  $p = $arbiter->getWyniki(2009); while($n = $p->fetchObject()) { ?>
										<tr>
											<!--onclick="document.location.href='/skoczek/details/<?php echo $n->idSedziego ?>.html';"
											style="cursor: pointer;"> -->
											<th scope="row" class="table-check-cell"><input
												type="checkbox" name="selected[]" id="table-selected-1"
												value="1"></th>
											<td><?php echo $n->name ?></td>
											<td><?php echo $n->nazwaskoczni ?></td>
										</tr>
										<?php } ?>
									</tbody>

								</table>
							</div>

						</div>
						<div id="three" class="tabs-content">
							<div>
								<table class="table" cellspacing="0" width="100%">

									<thead>
										<tr>
											<th class="black-cell"></th>
											<th scope="col">Zawody</th>
											<th scope="col">Skocznia</th>
									
									</thead>

									<tbody>
										<?php  $p = $arbiter->getWyniki(2010); while($n = $p->fetchObject()) { ?>
										<tr>
											<!--onclick="document.location.href='/skoczek/details/<?php echo $n->idSedziego ?>.html';"
											style="cursor: pointer;"> -->
											<th scope="row" class="table-check-cell"><input
												type="checkbox" name="selected[]" id="table-selected-1"
												value="1"></th>
											<td><?php echo $n->name ?></td>
											<td><?php echo $n->nazwaskoczni ?></td>
										</tr>
										<?php } ?>
									</tbody>

								</table>
							</div>
						</div>
						<div id="four" class="tabs-content">
							<div>
								<table class="table" cellspacing="0" width="100%">

									<thead>
										<tr>
											<th class="black-cell"></th>
											<th scope="col">Zawody</th>
											<th scope="col">Skocznia</th>
									</thead>

									<tbody>
										<?php  $p = $arbiter->getWyniki(2011); while($n = $p->fetchObject()) { ?>
										<tr>
											<!--onclick="document.location.href='/skoczek/details/<?php echo $n->idSedziego ?>.html';"
											style="cursor: pointer;"> -->
											<th scope="row" class="table-check-cell"><input
												type="checkbox" name="selected[]" id="table-selected-1"
												value="1"></th>
											<td><?php echo $n->name ?></td>
											<td><?php echo $n->nazwaskoczni ?></td>
										</tr>
										<?php } ?>
									</tbody>

								</table>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>

		<div class="clear"></div>
	</section>
</article>
<?php else : ?>
<?php echo lib_View::factory('nagroda/not_exists'); ?>
<?php endif; ?>