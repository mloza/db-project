
<script type="text/javascript">
	$(document).ready(function() {
		$('#sf1').submit(function(e) {
			e.preventDefault();

			$.post('/FastAdd/makenz.html', $(this).serialize(), function(r) {
				$('#result').html(r);
			});
		});
	});
</script>

<div id="result"></div>
<form action="" id="sf1" class="form">
	<select name="zawody">
	<?php
	$q = lib_Database::instance()->query('SELECT * FROM zawody'); 
	while($z = $q->fetchObject() ) { ?>
		<option value="<?php echo $z->nazwa ?>"><?php echo $z->nazwa ?></option>
	<?php } ?>
	</select>
	
	<select name="nagroda">
	<?php 
		$q = lib_Database::instance()->query('SELECT * FROM nagroda'); 
		while($z = $q->fetchObject() ) { ?>
		<option value="<?php echo $z->idNagrody ?>"><?php echo $z->nazwaNagrody ?> <?php echo $z->wartosc ?> <?php echo $z->idNagrody ?></option>
	<?php } ?>
	</select>
	<select name="miejsce">
	<option>1</option>
	<option>2</option>
	<option>3</option>
	</select>
	<button type="submit">Add</button>
</form>