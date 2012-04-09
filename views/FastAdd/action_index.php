
<script type="text/javascript">
	$(document).ready(function() {
		$('#sf1').submit(function(e) {
			e.preventDefault();

			$.post('FastAdd/add.html', $(this).serialize(), function(r) {
				$('#result').html(r);
			});
		});
	});
</script>

<div id="result"></div>
<form action="" id="sf1" class="form">
	<select name="zawody">
	<?php
	$q = lib_Database::instance()->query('SELECT * FROM sezon'); 
	while($z = $q->fetchObject() ) { ?>
		<option value="<?php echo $z->sezon ?>_<?php echo $z->nazwaZawodow ?>"><?php echo $z->sezon?> <?php echo $z->nazwaZawodow ?></option>
	<?php } ?>
	</select>
	
	<select name="skocznia">
	<?php 
		$q = lib_Database::instance()->query('SELECT * FROM skocznia'); 
		while($z = $q->fetchObject() ) { ?>
		<option value="<?php echo $z->idSkoczni ?>"><?php echo $z->nazwa ?> <?php echo $z->miasto ?></option>
	<?php } ?>
	</select>
	<button type="submit">Add</button>
</form>