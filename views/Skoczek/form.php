<form action="" method="post" class="form">
	<fieldset class="grey-bg">
		<legend>Dane osobowe</legend>
		<div class="grid_3">
			<label for="name">Imię</label>
			<input type="text" name="imie" id="imie" value="<?php echo $jumper->imie ?>" class="full-width">
		</div>
		<div class="grid_3">
			<label for="complex-fr-title">Nazwisko</label>
			<input type="text" name="nazwisko" id="" value="<?php echo $jumper->nazwisko ?>" class="full-width">
		</div>
		<div class="grid_3">
			<label for="complex-fr-title">Kraj</label>
			<input type="text" name="kraj" id="" value="<?php echo $jumper->krajPochodzenia ?>" class="full-width">
		</div>
		<div class="grid_3">
			<label for="complex-fr-title">Data Urodzenia</label>
			<input type="text" name="dataUr" class="datepicker hasDatepick" id="" value="<?php echo $jumper->dataUrodzenia ?>" class="full-width">
		</div>
		<div class="grid_3">
			<label for="complex-fr-title">Płeć</label>
			<select name="plec">
				<option value="">---- Wybierz ----</option>
				<option value="mężczyzna" <?php if($jumper->plec == 'mezczyzna'): ?>selected="selected"<?php endif; ?>>Mężczyzna</option>
				<option value="kobieta" <?php if($jumper->plec == 'kobieta'): ?>selected="selected"<?php endif; ?>>Kobieta</option>
			</select>
		</div>
		<div class="clear"></div>
	</fieldset>
	<div class="clear"></div>
	<div class="grid_12">
		<button type="submit">Zapisz</button>
	</div>
	<div class="clear"></div>
</form>