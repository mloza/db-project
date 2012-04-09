<?php if ($team) : ?>
<article class="container_12">		
	<section class="grid_12">
		<div class="block-border"><div class="block-content">
				<div class="h1">
					<h1>Edycja drużyny</h1>
				</div>	
				<?php echo lib_View::factory('druzyna/form')->set('team', $team); ?>
		</div></div>
	</section>
</article>
<?php else : ?>
	<?php echo lib_View::factory('druzyna/not_exists'); ?>
<?php endif; ?>