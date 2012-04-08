<?php if ($prize) : ?>
<article class="container_12">
	<section class="grid_12">
		<div class="block-border">
			<div class="block-content">
				<div class="h1">
					<h1>Szczegóły nagrody</h1>
				</div>
				<form class="form">
					<fieldset class="grey-bg grid_4">
						<legend>Nazwa nagrody</legend>
						<div class="">
							<strong><?php echo $prize->nazwaNagrody?> </strong>
						</div>

						<div class="clear"></div>
					</fieldset>
					<fieldset class="grey-bg grid_3">
						<legend>Wartość</legend>
						<div class="">
							<strong><?php echo $prize->wartosc ?> </strong>
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
					<h1>Laureaci</h1>
				</div>
				<div>
					<table class="table" cellspacing="0" width="100%">

						<thead>
							<tr>
								<th class="black-cell"></th>
								<th scope="col">Imię</th>
								<th scope="col">Nazwisko</th>
								<th scope="col">Data</th>
							</tr>
						</thead>

						<tbody>
							<?php $p = $prize->getSkoczek(); while($n = $p->fetchObject()) { ?>
							<tr
								onclick="document.location.href='/skoczek/details/<?php echo $n->idSkoczka ?>.html';"
								style="cursor: pointer;">
								<th scope="row" class="table-check-cell"><input type="checkbox"
									name="selected[]" id="table-selected-1" value="1"></th>
								<td><?php echo $n->imie ?></td>
								<td><?php echo $n->nazwisko ?></td>
								<td><?php echo $n->data ?></td>
								
							</tr>
							<?php }?>
						</tbody>

					</table>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</section>
</article>
<?php else : ?>
<?php echo lib_View::factory('skoczek/not_exists'); ?>
<?php endif; ?>