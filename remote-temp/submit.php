<?php
    if(!empty($_POST)
        && isset($_POST['espece']) 
        && (trim($_POST['espece']) == 1 && !empty($_POST['racechien'])
            || trim($_POST['espece']) == 2 && !empty($_POST['racechat']))
        && !empty($_POST['sexe']) && (trim($_POST['sexe']) == 1 || trim($_POST['sexe']) == 2)
        && !empty($_POST['jour_animal']) && is_numeric(trim($_POST['jour_animal']))
        && !empty($_POST['mois_animal']) && is_numeric(trim($_POST['mois_animal']))
        && !empty($_POST['annee_animal']) && is_numeric(trim($_POST['annee_animal']))
        && checkdate($_POST['mois_animal'], $_POST['jour_animal'], $_POST['annee_animal']) === true
        && !empty($_POST['civilite']) && $_POST['civilite'] > 0 && $_POST['civilite'] < 4
        && !empty($_POST['nom_animal'])
        && !empty($_POST['prenom'])
        && !empty($_POST['nom'])
        && !empty($_POST['adresse'])
        && !empty($_POST['cp']) && preg_match('/^\d{4,5}$/', trim($_POST['cp']))
        && !empty($_POST['insee']) && preg_match('/^\d{4,5}$/', trim($_POST['insee']))
        && !empty($_POST['jour']) && is_numeric(trim($_POST['jour']))
        && !empty($_POST['mois']) && is_numeric(trim($_POST['mois']))
        && !empty($_POST['annee']) && is_numeric(trim($_POST['annee']))
        && checkdate($_POST['mois'], $_POST['jour'], $_POST['annee']) === true
        && !empty($_POST['tel']) && preg_match('/^(0|\+33)[1-9]\d{8}$/', trim($_POST['tel']))
        && !empty($_POST['mail']) && preg_match('/^[A-Za-z0-9._-]+@[A-Za-z0-9.-]{2,}[.][A-Za-z]{2,3}$/i', trim($_POST['mail']))
        && isset($_POST['couvert']) && (trim($_POST['couvert']) == 0 || trim($_POST['couvert']) == 1)
        && isset($_POST['resil']) && (trim($_POST['resil']) == 0 || trim($_POST['resil']) == 1)
        && !empty($_POST['jour_contrat']) && is_numeric(trim($_POST['jour_contrat']))
        && !empty($_POST['mois_contrat']) && is_numeric(trim($_POST['mois_contrat']))
        && !empty($_POST['annee_contrat']) && is_numeric(trim($_POST['annee_contrat']))
        && checkdate($_POST['mois_contrat'], $_POST['jour_contrat'], $_POST['annee_contrat']) === true
        && !empty($_POST['typecontrat']) && $_POST['typecontrat'] > 0 && $_POST['typecontrat'] < 4
    ){
        $url = "http://dev.misterassur.com/moteur/moteur_import.php";
        
        $tatoo = $_POST['tatoo'] != 'false' ? 1 : 0;
        $emailing = !empty($_POST['newsletter']) ? 1 : 0;
        
        $espece = trim($_POST['espece']);
        $race = $espece == 1 ? trim($_POST['racechien']) : trim($_POST['racechat']) ;
        $sexe = trim($_POST['sexe']);
        
        //Ajout des 0 initiaux pour les dates
        $timestamp_animal = mktime(0, 0, 0, trim($_POST['mois_animal']), trim($_POST['jour_animal']), trim($_POST['annee_animal']));
        $date_animal = date('Y-m-d', $timestamp_animal);
        unset($timestamp_animal);
        
        $nom_animal = trim($_POST['nom_animal']);
        $civilite = trim($_POST['civilite']);
        $prenom = strtolower(trim($_POST['prenom']));
        $nom = strtoupper(trim($_POST['nom']));
        $adresse = trim($_POST['adresse']);
        $cp = trim($_POST['cp']);
        $insee = trim($_POST['insee']);
        $timestamp = mktime(0, 0, 0, trim($_POST['mois']), trim($_POST['jour']), trim($_POST['annee']));
        $date = date('Y-m-d', $timestamp);
        unset($timestamp);
        
        //Reformatage du n° de tel international
        $tel = preg_replace('/^\+33/', '0', trim($_POST['tel']));
        
        //Check si tel portable
        if(preg_match('/^0(6|7)/', $tel)){
            $portable = $tel;
            $domicile = '';
        }else{
            $domicile = $tel;
            $portable = '';
        }
        
        $mail = strtolower(trim($_POST['mail']));
        $couvert = trim($_POST['couvert']);
        $resil = trim($_POST['resil']);
        $timestamp_contrat = mktime(0, 0, 0, trim($_POST['mois_contrat']), trim($_POST['jour_contrat']), trim($_POST['annee_contrat']));
        $date_contrat = date('Y-m-d', $timestamp_contrat);
        unset($timestamp_contrat);
        $typecontrat = trim($_POST['typecontrat']);
        
        unset($_POST);
        
        $service = "animaux";
        try{
            $client = new SoapClient(null, array("uri" => $url, "location" => $url, "trace" => 1, "exceptions" => 1));
            unset($url);
            
            $datas = array(
                "code" => "IG9DGC", 
                "animal_couvert" => $couvert,
                "resiliation" => $resil, 
                "date_effet" => $date_contrat, 
                "formule_souhaitee" => $typecontrat, 
                "ref_apporteur" => '', 
                "ani_1_type_espece" => $espece,
                "ani_1_nom" => $nom_animal, 
                "ani_1_date_naissance" => $date_animal, 
                "ani_1_sexe_animal" => $sexe, 
                "ani_1_race" => $race,
                "ani_1_couleur_animal" => '',
                "ani_1_animal_tatoue" => $tatoo,
                "ani_1_numero_tatouage" => '',
                "civilite" => $civilite, 
                "nom" => $nom, 
                "prenom" => $prenom, 
                "date_naissance" => $date, 
                "adresse" => $adresse, 
                "cp" => $cp, 
                "insee" => $insee, 
                "email" => $mail, 
                "tel_mobile" => $portable, 
                "tel_bureau" => '', 
                "tel_domicile" => $domicile, 
                "situation_familiale" => '', 
                "profession" => '', 
                "emailing" => $emailing
            );
            
            unset($couvert, $resil, $date_contrat, $typecontrat, $espece, $nom_animal, $date_animal, $sexe, $race, $tatoo, $civilite, $nom, $prenom, $date, $adresse, $cp, $mail, $portable, $domicile, $emailing);
        
            $return = $client->setDatasFromForm("misterassur", "misterassur", $service, $datas);
            unset($client, $datas, $service);
            
            echo $return->synthese;
        } catch (SoapFault $exception){
	    print $exception;
	}
    }else{
        
    }
?>