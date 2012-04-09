<form action="" method="post" class="form">
	<fieldset class="grey-bg">
		<legend>Informacje</legend>
		<div class="grid_4">
			<label for="name" class="required">Nazwa</label>
			<input type="text" name="nazwaNagrody" id="nazwa" value="<?php echo $prize->nazwaNagrody ?>" class="full-width">
		</div>
		<div class="grid_3">
			<label for="complex-fr-title" class="required">Wartość</label>
			<input type="text" name="wartosc" id="" value="<?php echo $prize->wartosc ?>" class="full-width">
		</div>
		<div class="clear"></div>
	</fieldset>
	<div class="clear"></div>
	<div class="grid_12">
		<button type="submit">Zapisz</button>
	</div>
	<div class="clear"></div>
</form>






		
