<?php if ($prize) : ?>
<article class="container_12">		
	<section class="grid_12">
		<div class="block-border"><div class="block-content">
				<div class="h1">
					<h1>Edycja nagrody</h1>
				</div>	
				<?php echo lib_View::factory('nagroda/form')->set('prize', $prize); ?>
		</div></div>
	</section>
</article>
<?php else : ?>
	<?php echo lib_View::factory('nagroda/not_exists'); ?>
<?php endif; ?>