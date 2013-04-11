<?php

	error_reporting(0);

	// Constantes
	define("WS_URL", "http://dev.misterassur.com/moteur/moteur_import.php");
	define("SERVICE", "animaux");
	
	/**
	 * Formatage de la date pour entrée dans la base de donnée
	 * @param  string $date La date sous le format JJ/MM/AAAA
	 * @return string       La date au format AAAA-MM-JJ
	 */
	function format_date($date) {
		$date_arr = explode("/", filter_var($date, FILTER_SANITIZE_STRING));
		$a = $date_arr[0];
		$date_arr[0] = $date_arr[1];
		$date_arr[1] = $a;
		return date('Y-m-d',strtotime(implode("/",$date_arr)));
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

	/**
	 * dump() : a function to nicely format some not so nicely formatted variables
	 * @param  [array, object, scalar] $data The data to be formatted
	 * @return  void      Returns nicely formatted data
	 */
	function dump($data) {
	    if(is_array($data)) { //If the given variable is an array, print using the print_r function.
	        print "<pre>-----------------------\n";
	        print_r($data);
	        print "-----------------------</pre>";
	    } elseif (is_object($data)) {
	        print "<pre>==========================\n";
	        var_dump($data);
	        print "===========================</pre>";
	    } else {
	        print "=========&gt; ";
	        var_dump($data);
	        print " &lt;=========";
	    }
	}

	// Traitement variables
	// (sanitanisation && renommage)
	$animal_type = (isset($_POST['dog_breed'])) ? 1 : 2;

	if (isset($_POST['dog_breed'])) {
		$breed = filter_var($_POST['dog_breed'], FILTER_SANITIZE_NUMBER_INT);
	} elseif (isset($_POST['cat_breed'])) {
		$breed = filter_var($_POST['cat_breed'], FILTER_SANITIZE_NUMBER_INT);
	} else {
		$breed = 0;
	}

	$pet_gender = ($_POST['pet_gender'] == "male") ? 1 : 2;
	$pet_name = filter_var($_POST['pet_name'], FILTER_SANITIZE_STRING);
	$pet_birthday = format_date($_POST['pet_birthday']);
	$pet_tag = (isset($_POST['pet_tag'])) ? 1 : 0;
	$owner_gender = filter_var($_POST['owner_gender'], FILTER_SANITIZE_NUMBER_INT);
	$owner_surname = filter_var($_POST['owner_surname'], FILTER_SANITIZE_STRING);
	$owner_name = filter_var($_POST['owner_name'], FILTER_SANITIZE_STRING);
	$owner_address = filter_var($_POST['owner_address'], FILTER_SANITIZE_STRING);
	$zip_code = filter_var($_POST['zip_code'], FILTER_SANITIZE_NUMBER_INT);
	$owner_birthday = format_date($_POST['owner_birthday']);
	$owner_phone = filter_var($_POST['owner_phone'], FILTER_SANITIZE_NUMBER_INT);
	$mobile_phone = (check_mobile($owner_phone)) ? $owner_phone : '';
	$landline = (!check_mobile($owner_phone)) ? $owner_phone : '';
	$owner_email = filter_var($_POST['owner_email'], FILTER_SANITIZE_EMAIL);
	$optin = ($_POST['optin'] == "on") ? 1 : 0;
	$pet_insured = filter_var($_POST['pet_insured'], FILTER_SANITIZE_NUMBER_INT);
	$contract_cancelled = filter_var($_POST['contract_cancelled'], FILTER_SANITIZE_NUMBER_INT);
	$contract_start_date = format_date($_POST['contract_start_date']);
	$contract_type = filter_var($_POST['contract_type'], FILTER_SANITIZE_NUMBER_INT);

	try{
		$client = new SoapClient(null, array("uri" => WS_URL, "location" => WS_URL, "trace" => 1, "exceptions" => 1));

		$data = array(
			"code" => "IG9DGC", 
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
			"insee" => '', 
			"email" => $owner_email, 
			"tel_mobile" => $mobile_phone, 
			"tel_bureau" => '', 
			"tel_domicile" => $landline, 
			"situation_familiale" => '', 
			"profession" => '', 
			"emailing" => $optin
			);

		$return = $client->setDatasFromForm("misterassur", "misterassur", SERVICE, $data);

	} catch (SoapFault $exception){
		print_r($exception);
	}