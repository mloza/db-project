<form action="" method="post" class="form">
	<fieldset class="grey-bg">
		<legend>Dane osobowe</legend>
		<div class="grid_3">
			<label for="name" class="required">Imię</label>
			<input type="text" name="imie" id="imie" value="<?php echo $jumper->imie ?>" class="full-width">
		</div>
		<div class="grid_3">
			<label for="complex-fr-title" class="required">Nazwisko</label>
			<input type="text" name="nazwisko" id="" value="<?php echo $jumper->nazwisko ?>" class="full-width">
		</div>
		<div class="grid_3">
			<label for="complex-fr-title" class="required">Płeć</label>
			<select name="plec">
				<option value="">---- Wybierz ----</option>
				<option value="mężczyzna" <?php if($jumper->plec == 'mężczyzna'): ?>selected="selected"<?php endif; ?>>Mężczyzna</option>
				<option value="kobieta" <?php if($jumper->plec == 'kobieta'): ?>selected="selected"<?php endif; ?>>Kobieta</option>
			</select>
		</div>	
		<div class="clear"></div>
	</fieldset>
	<fieldset class="grey-bg">
		<legend>Dodatkowe</legend>
		<div class="grid_3">
			<label for="complex-fr-title" class="required">Kraj</label>
			<input type="text" name="kraj" id="" value="<?php echo $jumper->krajPochodzenia ?>" class="full-width">
		</div>
		<div class="grid_3">
			<label for="complex-fr-title" class="required">Data Urodzenia</label>
			<input type="text" name="dataUr" class="datepicker hasDatepick full-width" id="" value="<?php echo $jumper->dataUrodzenia ?>">
		</div>
		<div class="grid_3">
			<label for="complex-fr-title">Data Śmierci</label>
			<input type="text" name="dataSm" class="datepicker hasDatepick full-width" id="" value="<?php echo $jumper->dataSmierci ?>" >
		</div>
		<div class="clear"></div>		
	</fieldset>
	<fieldset class="grey-bg">
		<legend>Informacje</legend>
		<div class="grid_12">
			<label for="complex-fr-title">Informacje</label>
			<textarea name="informacje" id=""  class="full-width" rows="20"><?php echo $jumper->informacje ?></textarea>
		</div>
		<div class="clear"></div>
	</fieldset>
	<div class="clear"></div>
	<div class="grid_12">
		<button type="submit">Zapisz</button>
	</div>
	<div class="clear"></div>
</form>






		