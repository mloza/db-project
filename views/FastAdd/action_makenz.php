Do tabeli dodano:<br>
<strong>Nagroda:</strong> <?php echo $_POST['nagroda']?><br>
<strong>Zawody:</strong> <?php echo $_POST['zawody']?><br>
<strong>Miejsce:</strong> <?php echo $_POST['miejsce']?><br>
	<?php 
		$f = lib_Database::instance()->prepare("INSERT INTO nagroda_zawody VALUES(:idNagrody, :nazwa, :miejsce)");
		$f->bindParam(':idNagrody', $_POST['nagroda']);
		$f->bindParam(':miejsce', $_POST['miejsce']);
		$f->bindParam(':nazwa', $_POST['zawody']);
		$f->execute();
	?>
