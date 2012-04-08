<?php if ($skiJump) : ?>
<article class="container_12">		
	<section class="grid_12">
		<div class="block-border"><div class="block-content">
				<div class="h1">
					<h1>Edycja skoczni</h1>
				</div>	
				<?php echo lib_View::factory('skocznia/form')->set('skiJump', $skiJump); ?>
		</div></div>
	</section>
</article>
<?php else : ?>
	<?php echo lib_View::factory('skocznia/not_exists'); ?>
<?php endif; ?>