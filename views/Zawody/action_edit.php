<?php if ($contest) : ?>
<article class="container_12">		
	<section class="grid_12">
		<div class="block-border"><div class="block-content">
				<div class="h1">
					<h1>Edycja zawodów</h1>
				</div>	
				<?php echo lib_View::factory('zawody/form')->set('contest', $contest); ?>
		</div></div>
	</section>
</article>
<?php else : ?>
	<?php echo lib_View::factory('zawody/not_exists'); ?>
<?php endif; ?>