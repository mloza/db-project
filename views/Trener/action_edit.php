<?php if ($trener) : ?>
<article class="container_12">		
	<section class="grid_12">
		<div class="block-border"><div class="block-content">
				<div class="h1">
					<h1>Edycja trenera</h1>
				</div>	
				<?php echo lib_View::factory('trener/form')->set('trener', $trener); ?>
		</div></div>
	</section>
</article>
<?php else : ?>
	<?php echo lib_View::factory('trener/not_exists'); ?>
<?php endif; ?>