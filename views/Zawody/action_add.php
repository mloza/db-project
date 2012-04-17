<?php 
	if($act == 1) echo json_encode(array("html" => "Wynik został dodany", 'success' => '1', 'odl' => $_POST['odl'], 'pkt' => $_POST['odl'], 'date' => $_POST['date'], 'imie' => $skoczek->imie, 'nazwisko' => $skoczek->nazwisko));
	else echo json_encode(array('success' => '0', "html" => "Dodawanie się nie powiodło:".$act.print_r($act, true)));