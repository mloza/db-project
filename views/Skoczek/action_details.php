<?php if ($jumper) : ?>
<article class="container_12">
	<section class="grid_12">
		<div class="block-border">
			<div class="block-content">
				<div class="h1">
					<h1>Szczegóły skoczka</h1>
				</div>
				<form class="form">
					<fieldset class="grey-bg grid_2">
						<legend>Imię i nazwisko</legend>
						<div class="">
							<strong><?php echo $jumper->imie.' '.$jumper->nazwisko ?> </strong>
						</div>

						<div class="clear"></div>
					</fieldset>
					<fieldset class="grey-bg grid_2">
						<legend>Płeć</legend>
						<div class="">
							<strong><?php echo $jumper->plec ?> </strong>
						</div>

						<div class="clear"></div>
					</fieldset>
					<fieldset class="grey-bg grid_2">
						<legend>Kraj pochodzenia</legend>
						<div class="">
							<strong><?php echo $jumper->krajPochodzenia ?> </strong>
						</div>

						<div class="clear"></div>
					</fieldset>
					<fieldset class="grey-bg grid_2">
						<legend>Data urodzenia</legend>
						<div class="">
							<strong><?php echo $jumper->dataUrodzenia ?> </strong>
						</div>

						<div class="clear"></div>
					</fieldset>
					<fieldset class="grey-bg grid_2">
						<legend>Data śmierci</legend>
						<div class="">
							<strong><?php echo $jumper->dataSmierci ?> </strong>
						</div>

						<div class="clear"></div>
					</fieldset>
					<fieldset class="grey-bg grid_6">
						<legend>Informacje</legend>
						<div class="" style="line-height: 18px; text-align: justify">
							<?php echo $jumper->informacje ?>
						</div>

						<div class="clear"></div>
					</fieldset>

				</form>
				<div class="clear"></div>
			</div>
		</div>
		<br> <br>
		<div class="block-border">
			<div class="block-content">
				<div class="h1">
					<h1>Trenerzy</h1>
				</div>
				<div>
					<table class="table" cellspacing="0" width="100%">

						<thead>
							<tr>
								<th class="black-cell"></th>
								<th scope="col">Imię</th>
								<th scope="col">Nazwisko</th>
								<th scope="col">Od kiedy</th>
								<th scope="col">Do kiedy</th>
							</tr>
						</thead>

						<tbody>
							<?php $p = $jumper->getTrener(); while($n = $p->fetchObject()) { ?>
							<tr
								onclick="document.location.href='/trener/details/<?php echo $n->idTrenera ?>.html';"
								style="cursor: pointer;">
								<th scope="row" class="table-check-cell"><input type="checkbox"
									name="selected[]" id="table-selected-1" value="1"></th>
								<td><?php echo $n->imie ?></td>
								<td><?php echo $n->nazwisko ?></td>
								<td><?php echo $n->od ?></td>
								<td><?php echo $n->do ?></td>

							</tr>
							<?php }?>
						</tbody>

					</table>
				</div>
				<div class="clear"></div>
			</div>
		</div>
				<div class="block-border">
			<div class="block-content">
				<div class="h1">
					<h1>Zdobyte nagrody</h1>
				</div>
				<div>
					<table class="table" cellspacing="0" width="100%">

						<thead>
							<tr>
								<th class="black-cell"></th>
								<th scope="col">Nazwa</th>
								<th scope="col">Data</th>
							</tr>
						</thead>

						<tbody>
							<?php $p = $jumper->getNagroda(); while($n = $p->fetchObject()) { ?>
							<tr
								onclick="document.location.href='/nagroda/details/<?php echo $n->idNagrody ?>.html';"
								style="cursor: pointer;">
								<th scope="row" class="table-check-cell"><input type="checkbox"
									name="selected[]" id="table-selected-1" value="1"></th>
								<td><?php echo $n->nazwaNagrody ?></td>
								<td><?php echo $n->data ?></td>
								
							</tr>
							<?php }?>
						</tbody>

					</table>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="block-border">
			<div class="block-content">
				<div class="h1">
					<h1>Sprzęt skoczka</h1>
				</div>

				<form class="form">
					<fieldset class="dark-bg grid_10">
						<legend>Narty</legend>
						<?php $p = $jumper->getNarty(); while($n = $p->fetchObject()) { ?>
						<fieldset class="grey-bg grid_2">

							<legend>Firma</legend>
							<?php echo $n->firma ?>
						</fieldset>
						<fieldset class="grey-bg grid_2">
							<legend>Model</legend>
							<?php echo $n->model ?>
						</fieldset>
						<fieldset class="grey-bg grid_2">
							<legend>Waga</legend>
							<?php echo $n->waga?>
							kg
						</fieldset>
						<fieldset class="grey-bg grid_2">
							<legend>Długość</legend>
							<?php echo $n->dlugosc?>
							cm

						</fieldset>
						<div class="clear"></div>
						<?php }?>

					</fieldset>
					<fieldset class="dark-bg grid_10">
						<legend>Kombinezon</legend>
						<?php $p = $jumper->getKombinezon(); while($k = $p->fetchObject()) { ?>
						<fieldset class="grey-bg grid_2">
							<legend>Firma</legend>
							<?php echo $k->firma ?>
						</fieldset>
						<fieldset class="grey-bg grid_2">
							<legend>Model</legend>
							<?php echo $k->model ?>
						</fieldset>
						<fieldset class="grey-bg grid_2">
							<legend>Waga</legend>
							<?php echo $k->waga?>
							kg
						</fieldset>
						<fieldset class="grey-bg grid_2">
							<legend>Powierzchnia</legend>
							<?php echo $k->powierzchnia?>
							cm<sup style="vertical-align: super; font-size: 70%;">2</sup>
						</fieldset>
						<fieldset class="grey-bg grid_2">
							<legend>Materiał</legend>
							<?php echo $k->material ?>
						</fieldset>
						<div class="clear"></div>
						<?php }?>
					</fieldset>
					<fieldset class="dark-bg grid_10">
						<legend>Pozostałe</legend>
						<?php $p = $jumper->getPozostale(); while($pozostale = $p->fetchObject()) { ?>
						<fieldset class="grey-bg grid_3">
							<legend>Typ</legend>
							<?php echo $pozostale->typ; ?>
						</fieldset>
						<fieldset class="grey-bg grid_2">
							<legend>Firma</legend>
							<?php echo $pozostale->firma; ?>
						</fieldset>
						<fieldset class="grey-bg grid_2">
							<legend>Model</legend>
							<?php echo $pozostale->model; ?>
						</fieldset>
						<fieldset class="grey-bg grid_2">
							<legend>Waga</legend>
							<?php echo $pozostale->waga; ?>
							kg
						</fieldset>
						<div class="clear"></div>
						<?php } ?>
					</fieldset>
				</form>
				<div class="clear"></div>
			</div>
		</div>
	</section>
</article>
<?php else : ?>
<?php echo lib_View::factory('skoczek/not_exists'); ?>
<?php endif; ?>