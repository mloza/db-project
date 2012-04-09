
<pre>
<?php

$q = lib_Database::instance()->prepare("SELECT * FROM zawody");
if(!$q->execute()) {
	print_r($q->errorInfo());
} else {
	while($x = $q->fetchObject()) {
		$sz[$x->nazwa]['typ'] = $x->typ;
	}
}

$q = lib_Database::instance()->prepare("SELECT * FROM skocznia");
if(!$q->execute()) {
	print_r($q->errorInfo());
} else {
	while($x = $q->fetchObject()) {
		$s[$x->idSkoczni] = $x;
	}
}


$q = lib_Database::instance()->prepare("SELECT DISTINCT ass.nazwa, ass.idSkoczni, ass.sezon FROM arbiter_skocznia_sezon ass");
if(!$q->execute()) {
	print_r($q->errorInfo());
} else {
	while($x = $q->fetchObject()) {
		$sz[$x->nazwa]['skocznie'][$x->sezon][] = array('idsk' => $x->idSkoczni, 'k' => $s[$x->idSkoczni]->punktKonstrukcyjny);
	}
}

$q = lib_Database::instance()->prepare("SELECT * FROM skoczek WHERE dataSmierci is NULL");
if(!$q->execute()) {
	print_r($q->errorInfo());
} else {
	while($x = $q->fetchObject()) {
		$skoczek[$x->plec][] = $x->idSkoczka;
	}
}

$lday = 1;
$zday = -8;
foreach($sz as $k => $v)
{
	if($v['typ'] == 'letnie' OR stripos($k, 'Letni') !== FALSE) {
		$month = 6; 
		$day = &$lday;
		$day += 8;
	} else 
	{
		$day = &$zday;
		$month = 11;
	}
	$max = 0;
	foreach($v['skocznie'] as $a => $b)
	{
		$year = $a;
		foreach($b as $c => $d)
		{
			$max = $c;
			$t = mktime(0, 0, 0, $month, $day+$c, $year);
			$sz[$k]['skocznie'][$a][$c]['data'] = date('Y-m-d', $t);
		}
	}
	$day+=$max;
}

$q = lib_Database::instance()->prepare("SELECT * FROM skoczek s NATURAL JOIN nagroda_skoczek ns JOIN nagroda n ON ns.idNagrody = n.idNagrody JOIN nagroda_zawody nz ON nz.idNagrody = n.idNagrody JOIN zawody");
if(!$q->execute()) {
	print_r($q->errorInfo());
} else {
	while($x = $q->fetchObject()) {
		$d = explode('-', $x->data);
		$sz[$x->nazwaZawodow]['skocznie'][$d[0]]['zwyciezca'][$x->miejsce] = $x->idSkoczka;
	}
}

foreach($sz as $nazwaZawodow => $a)
{
	foreach($a['skocznie'] as $sezon => $skocznie)
	{
		foreach($skocznie as $i => $dane)
		{
			if($i === 'zwyciezca') continue;
			if($a['typ'] == 'kobiet') $z = $skoczek['kobieta']; else $z = $skoczek['mężczyzna'];
			foreach($z as $is => $id)
			{
				$p = 0;
				for($it=0; $it<6; $it++)
				{
					$p = rand(8,17);
				}
				if(rand(0, 1)) $p += 0.5;
				$sz[$nazwaZawodow]['skocznie'][$sezon][$i]['skoczkowie'][$id] = array( 'odl' => rand($s[$dane['idsk']]->punktKonstrukcyjny-20, $s[$dane['idsk']]->punktKonstrukcyjny+20), 'pkt' => $p);
			} 
			if(!empty($skocznie['zwyciezca'])) {
			foreach($skocznie['zwyciezca'] as $k => $zid)
			{
				//print_r($zid);
				$p = 0;
				for($it=0; $it<6; $it++)
				{
					$p = rand(20-$k, 21-$k);
				}
				if(rand(0, 1)) $p += 0.5;
				$sz[$nazwaZawodow]['skocznie'][$sezon][$i]['skoczkowie'][$zid] = array('odl' =>
									rand(
												$s[$dane['idsk']]->punktKonstrukcyjny+20+10*(3-$k), 
												$s[$dane['idsk']]->punktKonstrukcyjny+20+10*(4-$k)
											), 'pkt' => $p);
			}
			}
		}
	}
}
//print_r($sz);
$q = lib_Database::instance()->prepare("INSERT INTO wynik VALUES(:idSkoczka, :sezon, :idSkoczni, :nazwaZawodow, :punkty, :odleglosc, :typ, :data)");
$q->bindParam(':idSkoczka', $idSkoczka);
$q->bindParam(':sezon', $sezon);
$q->bindParam(':idSkoczni', $idSkoczni);
$q->bindParam(':nazwaZawodow', $nazwaZawodow);
$q->bindParam(':punkty', $punkty);
$q->bindParam(':odleglosc', $odleglosc);
$q->bindParam(':typ', $typ);
$q->bindParam(':data', $data);
foreach($sz as $nazwaZawodow => $a)
{
	if(stripos($nazwaZawodow, 'Drużynowe') === FALSE) $typ = "Indywidualne"; else $typ = 'Drużynowe';
	foreach($a['skocznie'] as $sezon => $skocznie)
	{
		foreach($skocznie as $i => $skocznia)
		{
			$idSkoczni = $skocznia['idsk'];
			$data = $skocznia['data'];
			foreach($skocznia['skoczkowie'] as $idSkoczka => $da)
			{
				$punkty = $da['pkt']*6;
				$odleglosc = $da['odl'];
				if(!$q->execute()) print_r($q->errorInfo());
				//exit;
			}
		}
	}
}

?>
</pre>