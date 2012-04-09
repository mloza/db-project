<form action="" method="post" class="form">
	<fieldset class="grey-bg">
		<legend>Dane osobowe</legend>
		<div class="grid_3">
			<label for="name" class="required">Imię</label>
			<input type="text" name="imie" id="imie" value="<?php echo $arbiter->imie ?>" class="full-width">
		</div>
		<div class="grid_3">
			<label for="complex-fr-title" class="required">Nazwisko</label>
			<input type="text" name="nazwisko" id="" value="<?php echo $arbiter->nazwisko ?>" class="full-width">
		</div>
		<div class="grid_3">
			<label for="complex-fr-title" class="required">Narodowość</label>
			<input type="text" name="narodowosc" id="" value="<?php echo $arbiter->narodowosc ?>" class="full-width">
		</div>
		<div class="grid_2">
			<label for="complex-fr-title" class="required">Data Urodzenia</label>
			<input type="text" name="dataUr" class="datepicker hasDatepick full-width" id="" value="<?php echo $arbiter->dataUrodzenia ?>" >
		</div>
		<div class="clear"></div>
	</fieldset>
	<div class="clear"></div>
	<div class="grid_12">
		<button type="submit">Zapisz</button>
	</div>
	<div class="clear"></div>
</form>






		