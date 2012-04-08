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
	</section>
</article>
<?php else : ?>
<?php echo lib_View::factory('trener/not_exists'); ?>
<?php endif; ?>