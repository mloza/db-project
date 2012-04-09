<?php

$q = lib_Database::instance()->prepare("SELECT DISTINCT ass.sezon, ass.nazwa, ass.idSkoczni FROM arbiter_skocznia_sezon ass NATURAL JOIN skocznia");
if(!$q->execute()) {
	print_r($q->errorInfo());	
}

?>
<select name="zawody">
<?php 
while($z = $q->fetchObject()) 
{ 
?>
<option value="<?php ?>"><?php echo $z->sezon.' '.$z->nazwa ?></option>	
<?php 
}
?>
</select>