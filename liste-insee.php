<?php 
try {

	if ($_SERVER['HTTP_HOST'] == "monassurancechien.com") {
		$dbh = new PDO("mysql:host=localhost;dbname=assuranczkcomp", "assuranczkcomp", "Pen4kaPr");
	} else if ($_SERVER['HTTP_HOST'] == "assurancechien.eu01.aws.af.cm") {
		$dbh = new PDO("mysql:host=eu01-user01.cbxizyg0fwcn.eu-west-1.rds.amazonaws.com;dbname=d3d80d206724943d5aa4310a9215528b1", "uFczgcgkqr0EG", "poWP9k9Z55xJF");
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