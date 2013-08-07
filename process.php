<?php

	date_default_timezone_set("Europe/Paris"); 

	// Constantes
	define("WS_URL", "http://www.misterassur.com/moteur/moteur_import.php");
	define("SERVICE", "animaux");
	
	/**
	 * Formatage de la date pour entrée dans la base de donnée
	 * @param  string $inputName Le nom du champ contenant la date
	 * @return string            La date au format AAAA-MM-JJ
	 */
	function get_date($inputName) {
		if (array_key_exists($inputName, $_POST)) {
			$dateArray = explode("/", filter_var($_POST[$inputName], FILTER_SANITIZE_STRING));		
			return date('Y-m-d', strtotime(implode("-",$dateArray)));
		} else {
			return "0000-00-00";
		}			
	}

	/**
	 * Numero mobile ou non
	 * @param  string $phone Le numéro à vérifier
	 * @return boolean       Le retour vrai ou faux
	 */
	function check_mobile($phone) {
		if (preg_match("/^0(6|7)/", $phone)) {
			return true;
		} else {
			return false;
		}
	}

	// Traitement variables
	// (nettoyage && renommage)
	if (isset($_POST['dog_breed'])) {
		$animal_type = 1;
		$breed = filter_var($_POST['dog_breed'], FILTER_SANITIZE_NUMBER_INT);
	} elseif (isset($_POST['cat_breed'])) {
		$animal_type = 2;
		$breed = filter_var($_POST['cat_breed'], FILTER_SANITIZE_NUMBER_INT);
	} elseif (isset($_POST['nac_breed'])) {

		$breed = filter_var($_POST['nac_breed'], FILTER_SANITIZE_NUMBER_INT);

		switch ($breed) {
			case 1:
				$animal_type = 3;
				$breed = 1;
				break;
			case 2:
				$animal_type = 4;
				$breed = 1;
				break;
			case 3:
				$animal_type = 5;
				$breed = 1;
				break;
			case 4:
				$animal_type = 6;
				$breed = 1;
				break;
		}

		if ($breed > 5) {
			$animal_type = 7;
			if ($breed == 6)  { $breed = 1; }
			if ($breed == 7)  { $breed = 2; }
			if ($breed == 8)  { $breed = 3; }
			if ($breed == 9)  { $breed = 4; }
			if ($breed == 10) { $breed = 5; }
			if ($breed == 11) { $breed = 6; }
		}

	}

	$code_apporteur = filter_var($_POST["code_apporteur"], FILTER_SANITIZE_STRING);
	$pet_gender = ($_POST['pet_gender'] == "male") ? 1 : 2;
	$pet_name = filter_var($_POST['pet_name'], FILTER_SANITIZE_STRING);
	$pet_birthday = get_date("pbday");
	$pet_tag = filter_var($_POST['pet_tag'], FILTER_SANITIZE_NUMBER_INT);
	$owner_gender = filter_var($_POST['owner_gender'], FILTER_SANITIZE_NUMBER_INT);
	$owner_surname = filter_var($_POST['owner_surname'], FILTER_SANITIZE_STRING);
	$owner_name = filter_var($_POST['owner_name'], FILTER_SANITIZE_STRING);
	$owner_address = filter_var($_POST['owner_address'], FILTER_SANITIZE_STRING);
	$zip_code = filter_var($_POST['zip_code'], FILTER_SANITIZE_NUMBER_INT);	
	$insee = filter_var($_POST['insee'], FILTER_SANITIZE_NUMBER_INT);
	$owner_birthday = get_date("bday");
	$owner_phone = filter_var($_POST['owner_phone'], FILTER_SANITIZE_NUMBER_INT);
	$mobile_phone = (check_mobile($owner_phone)) ? $owner_phone : '';
	$landline = (!check_mobile($owner_phone)) ? $owner_phone : '';
	$owner_email = filter_var($_POST['owner_email'], FILTER_SANITIZE_EMAIL);
	$optin = filter_var($_POST['optin'], FILTER_SANITIZE_NUMBER_INT);
	$pet_insured = filter_var($_POST['pet_insured'], FILTER_SANITIZE_NUMBER_INT);
	$contract_cancelled = filter_var($_POST['contract_cancelled'], FILTER_SANITIZE_NUMBER_INT);
	$contract_start_date = get_date("csd");
	$contract_type = filter_var($_POST['contract_type'], FILTER_SANITIZE_NUMBER_INT);

	try{
		$client = new SoapClient(null, array("uri" => WS_URL, "location" => WS_URL, "trace" => 1, "exceptions" => 1, "wsdl_cache" => 0));

		$data = array(
			"code" => $code_apporteur, 
			"animal_couvert" => $pet_insured,
			"resiliation" => $contract_cancelled, 
			"date_effet" => $contract_start_date, 
			"formule_souhaitee" => $contract_type, 
			"ani_1_type_espece" => $animal_type,
			"ani_1_nom" => $pet_name, 
			"ani_1_date_naissance" => $pet_birthday, 
			"ani_1_sexe_animal" => $pet_gender, 
			"ani_1_race" => $breed,
			"ani_1_couleur_animal" => '',
			"ani_1_animal_tatoue" => $pet_tag,
			"ani_1_numero_tatouage" => '',
			"civilite" => $owner_gender, 
			"nom" => $owner_name, 
			"prenom" => $owner_surname, 
			"date_naissance" => $owner_birthday, 
			"adresse" => $owner_address, 
			"cp" => $zip_code, 
			"insee" => $insee, 
			"email" => $owner_email, 
			"tel_mobile" => $mobile_phone, 
			"tel_bureau" => '', 
			"tel_domicile" => $landline, 
			"situation_familiale" => '', 
			"profession" => '', 
			"emailing" => $optin
			);

		$return = $client->setDatasFromForm("misterassur", "misterassur", SERVICE, $data);

	} catch (SoapFault $e){
		$error_var = $e->faultstring;
		$the_match = $client->__getLastResponse();
		preg_match_all('#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#', $the_match, $matches);
	}