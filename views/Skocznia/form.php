<form action="" method="post" class="form">
	<fieldset class="grey-bg">
		<legend>Dane techniczne</legend>
		<div class="grid_3">
			<label for="name" class="required">Nazwa</label>
			<input type="text" name="nazwa" id="nazwa" value="<?php echo $skiJump->nazwa ?>" class="full-width">
		</div>
		<div class="grid_3">
			<label for="complex-fr-title" class="required">Miasto</label>
			<input type="text" name="miasto" id="" value="<?php echo $skiJump->miasto ?>" class="full-width">
		</div>
		<div class="grid_2">
			<label for="name" class="required">Punkt K</label>
			<input type="text" name="punktK" id="" value="<?php echo $skiJump->punktKonstrukcyjny ?>" class="full-width">
		</div>
		<div class="grid_2">
			<label for="name" class="required">Rekord Skoczni</label>
			<input type="text" name="rekord" id="" value="<?php echo $skiJump->rekordSkoczni ?>" class="full-width">
		</div>
		<div class="clear"></div>
	</fieldset>
	<div class="clear"></div>
	<div class="grid_12">
		<button type="submit">Zapisz</button>
	</div>
	<div class="clear"></div>
</form>






		