<?php 
try {

	if ($_SERVER['HTTP_HOST'] == "monassurancechien.com") {
		$dbh = new PDO("mysql:host=localhost;dbname=assuranczkcomp", "assuranczkcomp", "Pen4kaPr");
	} else if ($_SERVER['HTTP_HOST'] == "assurancechien.eu1.frbit.net") {
		$dbh = new PDO("mysql:host=assurancechien.mysql.eu1.frbit.com;dbname=assurancechien", "assurancechien", "VPJ3v0_Mf5kO9cez");
	} else {
		$dbh = new PDO("mysql:host=localhost;dbname=misterassur_dev", "misterassur", "Mah;vGh!s");
	}
	
	$sql = "SELECT code_insee, ville FROM insee WHERE code_postal = \"".$_POST["cp"]."\" ";
	$sth = $dbh->prepare($sql);
	$sth->execute();

	$data = $sth->fetch(PDO::FETCH_ASSOC);
	echo json_encode(array($data['code_insee'], $data['ville']));

} catch (Exception $e) {
	echo $e;
}

?>