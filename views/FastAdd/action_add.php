Do tabeli dodano:<br>
<strong>Skocznia:</strong> <?php echo $_POST['skocznia']?><br>
<strong>Zawody:</strong> <?php echo $_POST['zawody']?><br>
Arbitrów:
<?php while($a = $q->fetchObject()) { ?>
	<?php 
		$f = lib_Database::instance()->prepare("INSERT INTO arbiter_skocznia_sezon VALUES(:idSkoczni, :idSedziego, :sezon, :nazwa)");
		$f->bindParam(':idSkoczni', $_POST['skocznia']);
		$f->bindParam(':idSedziego', $a->idSedziego);
		$s = explode('_', $_POST['zawody']);
		$f->bindParam(':sezon', $s[0]);
		$f->bindParam(':nazwa', $s[1]);
		$f->execute();
	?>
	<?php echo $a->imie.' '.$a->nazwisko; ?><br>
<?php } ?>
