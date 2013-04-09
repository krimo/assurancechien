<?php
if(!empty($_POST['cp']) && preg_match('/^\d{4,5}$/', trim($_POST['cp']))){
	$cp = trim($_POST['cp']);
	if(strlen($cp) == 4){
		$cp = '0'.$cp;
	}
	$url = "http://dev.misterassur.com/moteur/moteur_import.php";
	$client = new SoapClient(null, array("uri" => $url, "location" => $url, "trace" => 1, "exceptions" => 1));
	$villes = $client->getVillesFromCP($cp);
	
	echo $villes;
}
?>
