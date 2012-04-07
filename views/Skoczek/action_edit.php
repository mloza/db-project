<?php if ($jumper) : ?>
<article class="container_12">		
	<section class="grid_12">
		<div class="block-border"><div class="block-content">
				<div class="h1">
					<h1>Edycja skoczka</h1>
				</div>	
				<?php echo lib_View::factory('skoczek/form')->set('jumper', $jumper); ?>
		</div></div>
	</section>
</article>
<?php else : ?>
	<?php echo lib_View::factory('skoczek/not_exists'); ?>
<?php endif; ?>