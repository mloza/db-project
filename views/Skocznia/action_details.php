<?php if ($skiJump) : ?>
<article class="container_12">
	<section class="grid_12">
		<div class="block-border">
			<div class="block-content">
				<div class="h1">
					<h1>Szczegóły skoczni</h1>
				</div>
				<form class="form">
					<fieldset class="grey-bg grid_2">
						<legend>Nazwa</legend>
						<div class="">
							<strong><?php echo $skiJump->nazwa ?> </strong>
						</div>

						<div class="clear"></div>
					</fieldset>
					<fieldset class="grey-bg grid_2">
						<legend>Miasto</legend>
						<div class="">
							<strong><?php echo $skiJump->miasto ?> </strong>
						</div>

						<div class="clear"></div>
					</fieldset>
					<fieldset class="grey-bg grid_2">
						<legend>Punkt K</legend>
						<div class="">
							<strong><?php echo $skiJump->punktKonstrukcyjny ?> </strong>
						</div>

						<div class="clear"></div>
					</fieldset>
					<fieldset class="grey-bg grid_2">
						<legend>Rekord</legend>
						<div class="">
							<strong><?php echo $skiJump->rekordSkoczni ?> </strong>
						</div>

						<div class="clear"></div>
					</fieldset>
					

				</form>
				<div class="clear"></div>
			</div>
		</div>
		<br><br>
		<div class="block-border">
			<div class="block-content">
				<div class="h1">
					<h1>Zawody na skoczni</h1>
				</div>
				<div>
					<table class="table" cellspacing="0" width="100%">

						<thead>
							<tr>
								<th class="black-cell"></th>
								<th scope="col">Nazwa</th>
								<th scope="col">Sezon</th>
							</tr>
						</thead>

						<tbody>
							<?php $p = $skiJump->getZawody(); while($n = $p->fetchObject()) { ?>
							<tr
								onclick="document.location.href='/zawody/details/.html';"
								style="cursor: pointer;">
								<th scope="row" class="table-check-cell"><input type="checkbox"
									name="selected[]" id="table-selected-1" value="1"></th>
								<td><?php echo $n->nazwa ?></td>
								<td><?php echo $n->sezon ?></td>
							

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
<?php echo lib_View::factory('skocznia/not_exists'); ?>
<?php endif; ?>