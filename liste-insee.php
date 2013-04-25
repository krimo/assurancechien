<?php 
try {

	# $dbh = new PDO("mysql:host=localhost;dbname=assuranczkcomp", "assuranczkcomp", "Pen4kaPr");
	$dbh = new PDO("mysql:host=localhost;dbname=misterassur_dev", "misterassur", "Mah;vGh!s");
	$sql = "SELECT code_insee, ville FROM insee WHERE code_postal = \"".$_POST["cp"]."\" ";
	$sth = $dbh->prepare($sql);
	$sth->execute();

	$data = $sth->fetch(PDO::FETCH_ASSOC);
	echo json_encode(array($data['code_insee'], $data['ville']));

} catch (Exception $e) {
	echo $e;
}

?>