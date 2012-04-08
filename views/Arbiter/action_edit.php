<?php if ($arbiter) : ?>
<article class="container_12">		
	<section class="grid_12">
		<div class="block-border"><div class="block-content">
				<div class="h1">
					<h1>Edycja arbitra</h1>
				</div>	
				<?php echo lib_View::factory('arbiter/form')->set('arbiter', $arbiter); ?>
		</div></div>
	</section>
</article>
<?php else : ?>
	<?php echo lib_View::factory('arbiter/not_exists'); ?>
<?php endif; ?>