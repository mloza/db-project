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
	</section>
</article>
<?php else : ?>
<?php echo lib_View::factory('nagroda/not_exists'); ?>
<?php endif; ?>