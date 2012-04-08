<form action="" method="post" class="form">
	<fieldset class="grey-bg">
		<legend>Informacje</legend>
		<div class="grid_3">
			<label for="name" class="required">Nazwa</label>
			<input type="text" name="nazwa" id="nazwa" value="<?php echo $contest->nazwa ?>" class="full-width">
		</div>
		<div class="grid_3">
			<label for="complex-fr-title" class="required">Typ</label>
			<ul class="checkable-list">
	        	<li><input type="radio" name="typ" id="" value="typ1" <?php if($contest->typ == 'letnie'): ?>checked="checked"<?php endif; ?>><label for="typ1">Letnie</label></li>
	        	<li><input type="radio" name="typ" id="" value="typ2" <?php if($contest->typ == 'zimowe'): ?>checked="checked"<?php endif; ?>><label for="typ2">Zimowe</label></li>
	       		<li><input type="radio" name="typ" id="" value="typ3" <?php if($contest->typ == 'mistrzowskie'): ?>checked="checked"<?php endif; ?>><label for="typ3">Mistrzowskie</label></li>
	       		<li><input type="radio" name="typ" id="" value="typ4" <?php if($contest->typ == 'lokalne'): ?>checked="checked"<?php endif; ?>><label for="typ4">Lokalne</label></li>
	       		<li><input type="radio" name="typ" id="" value="typ5" <?php if($contest->typ == 'kobiet'): ?>checked="checked"<?php endif; ?>><label for="typ5">Kobiet</label></li>
	   		</ul>
		</div>	
		<div class="clear"></div>
	</fieldset>
	<div class="clear"></div>
	<div class="grid_12">
		<button type="submit">Zapisz</button>
	</div>
	<div class="clear"></div>
</form>






		