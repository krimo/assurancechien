<?php
$tab_mois = array("1" => "Janvier", "2" => "F&eacute;vrier", "3" => "Mars", "4" => "Avril", "5" => "Mai", "6" => "Juin", "7" => "Juillet", "8" => "Ao&ucirc;t", "9" => "Septembre", "10" => "Octobre", "11" => "Novembre", "12" => "D&eacute;cembre");
$annee = date('Y');
$debut_animaux = $annee - 25;
$debut_humains = $annee - 110;
$fin_contrats = $annee + 1;
$demain = time() + 86400;//Calcul du lendemain (pour date du contrat par défaut)
$jour_demain = date('j', $demain);
$mois_demain = date('n', $demain);
$annee_demain = date('Y', $demain);
$selected = '';

$url = "http://dev.misterassur.com/moteur/moteur_import.php";
$client = new SoapClient(null, array("uri" => $url, "location" => $url, "trace" => 1, "exceptions" => 1));
$civilites = $client->getReferentiel('form_civilite');
$chiens = $client->getReferentiel('form_animaux_race_chien');
$chats = $client->getReferentiel('form_animaux_race_chat');
$contrats = $client->getReferentiel('produit_formule_animaux');
unset($client);
?>
<!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#">
        <head>
		<title>Assurance chien - Comparez gratuitement les meilleurs tarifs des mutuelles pour votre animal</title>
		<link rel='stylesheet' href="../css/common.css" type='text/css' />
		<link rel='stylesheet' href="../css/animaux.css" type='text/css' />
		<link rel='stylesheet' href="../css/form.css" type='text/css' />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<script src="../js/mootools-core-1.4.5-full-compat.js"></script>
		<script src="../js/custom-form-elements.js"></script>
		<script src="../js/common.js"></script>
		<script src="../js/animaux.js"></script>
		<meta name="keywords" content="assurance santé, assurance chien" />
		<meta name="description" content="Une assurance santé pour votre chien" />
	</head>
	<body>
                <script>(function(d,w,c){(w[c]=w[c]||[]).push(function(){try {w.yaCounter20460571=new Ya.Metrika({id:20460571,webvisor:true,clickmap:true,trackLinks:true,accurateTrackBounce:true});}catch(e){}});var n = d.getElementsByTagName("script")[0],s=d.createElement("script"),f=function(){n.parentNode.insertBefore(s,n);};s.type="text/javascript";s.async=true;s.src=(d.location.protocol=="https:"?"https:":"http:")+"//mc.yandex.ru/metrika/watch.js";if(w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded",f,false);}else{f();}})(document,window,"yandex_metrika_callbacks");</script>
                <noscript><div><img src="//mc.yandex.ru/watch/20460571" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
                <div id="fb-root"></div>
                <script>(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)) return;js=d.createElement(s);js.id=id;js.src="//connect.facebook.net/fr_FR/all.js#xfbml=1";fjs.parentNode.insertBefore(js, fjs);}(document,'script','facebook-jssdk'));</script>
		<div id="conteneur">
			<div class="left">
				<div id="descriptif">
					<h1>Mon Assurance Chien</h1>
					<h3>Le Comparateur de mutuelles Chien et Chat</h3>
					<h3 class="grey">Les Meilleurs Tarifs accessibles en 1 mn</h3>
					<h3 class="grey">Une Gamme de Formules sur-mesure</h3>
                                        <div id="fleche">GRATUIT, RAPIDE<br />&amp; SANS ENGAGEMENT</div>
					<h3><span class="grey">1/</span> je remplis ce formulaire en - 1 mn</h3>
					<h3><span class="grey">2/</span> j'affiche les tarifs et je compare les offres</h3>
					<img src="../img/animaux.jpg" alt="Assurez vos chiens et chats" class="imagetexte" />
					<h2>Frais v&eacute;t&eacute;rinaires, vaccins, maladies, accidents&hellip;</h2>
					<h2 class="grey">Quelques euros /mois pour leur mutuelle, &ccedil;a simplifie la vie&nbsp;!</h2>
                                        <div class="partages">
                                            <fb:like href="http://www.assurancechiensante.com/" send="true" layout="button_count" width="400" show_faces="true" style="top: -4px; margin-right: 40px;"></fb:like>
                                            <a href="https://twitter.com/share" class="twitter-share-button" data-text="Les meilleurs tarifs #assurances #chien et #chat ! Accessibles en moins de 30 secondes via www.monassurancechien.com" data-lang="fr">Tweeter</a>
                                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                                            <div class="g-plusone" data-size="medium" data-annotation="inline" data-width="120" style="margin-left: 40px;"></div>
                                            <script>window.___gcfg={lang: 'fr'};(function(){var po = document.createElement('script');po.type='text/javascript';po.async=true;po.src='https://apis.google.com/js/plusone.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(po,s);})();</script>
                                        </div>
					<p class="grey" id="texte_accueil">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget laoreet ante. Curabitur eleifend dictum arcu, id consequat sem pulvinar eu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam bibendum, turpis non viverra hendrerit, eros sapien sodales velit, nec ullamcorper velit felis ac nunc. Curabitur ullamcorper lobortis arcu, sed accumsan metus ultrices nec. Nulla eget dui sem, quis semper purus. Donec ultricies nisi ut tortor rutrum convallis. Vestibulum ultrices elit id arcu volutpat eu auctor eros bibendum. In commodo luctus ante, vel pharetra orci ultrices in. Morbi augue est, lacinia id tincidunt vitae, eleifend at lacus.
						<br /><br />Donec sed lectus eget nisl luctus ultrices eu eu leo. Quisque felis urna, molestie sit amet ornare quis, sollicitudin vel metus. Fusce vitae justo euismod erat sollicitudin ultrices. Donec at magna a orci aliquam luctus id ut velit. Donec eu diam nec nisi elementum hendrerit et ac purus. Quisque gravida augue ultrices nisl imperdiet vel convallis tellus molestie. Integer at bibendum urna. Morbi eget lacus non libero posuere facilisis. Quisque mollis eleifend arcu id placerat. Donec accumsan orci et nunc convallis a aliquet diam commodo. Donec ac interdum sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum iaculis volutpat urna id rhoncus.
						<br /><br />Donec vitae nisi ipsum, sit amet tempus velit. Sed ut mi sit amet orci volutpat vestibulum et at risus. Nulla rutrum nulla in lacus tristique egestas. Fusce vitae diam nisi. Phasellus porta elementum tellus in lobortis. Nullam facilisis enim accumsan risus mollis viverra placerat quam cursus. Nam venenatis odio in leo hendrerit euismod. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam neque nisi, imperdiet ac lobortis eget, eleifend ac nisl. Pellentesque eu purus libero, id dictum erat. Nam lacinia dui non dui mattis quis ultricies metus ultricies. Sed feugiat, leo non tincidunt eleifend, sapien ante facilisis orci, tempor cursus nunc eros a ante. Donec metus est, elementum ac laoreet vel, rhoncus ac purus. Praesent venenatis sagittis eros non commodo.
						<br /><br />Nam venenatis, mauris ut faucibus condimentum, diam enim aliquet ipsum, eget commodo eros leo quis ligula. Suspendisse viverra faucibus elit, ac porttitor velit euismod vel. Duis et adipiscing quam. Curabitur sit amet risus quis mi vehicula eleifend. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean varius sem at magna lacinia gravida. Cras pulvinar dictum ligula, in consequat nisi blandit sed.
						<br /><br />Donec ac enim leo, ac dapibus lacus. Proin pretium massa a magna convallis hendrerit consequat odio dignissim. Nam rutrum metus non velit dictum ac tempus urna dignissim. Duis nec est ante, quis rhoncus dui. Phasellus faucibus, sapien ac bibendum vehicula, lectus orci porta mi, et suscipit magna massa eget mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla placerat lacinia nunc, et ultricies risus accumsan eget. Nunc ipsum nibh, tempor at elementum vel, adipiscing sagittis purus. 
					</p>
                                        <div id="merci" class="hidden">
                                            <h1>MERCI&nbsp;!</h1>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget laoreet ante. Curabitur eleifend dictum arcu, id consequat sem pulvinar eu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam bibendum, turpis non viverra hendrerit, eros sapien sodales velit, nec ullamcorper velit felis ac nunc. Curabitur ullamcorper lobortis arcu, sed accumsan metus ultrices nec. Nulla eget dui sem, quis semper purus. Donec ultricies nisi ut tortor rutrum convallis. Vestibulum ultrices elit id arcu volutpat eu auctor eros bibendum. In commodo luctus ante, vel pharetra orci ultrices in. Morbi augue est, lacinia id tincidunt vitae, eleifend at lacus.
                                            </p>
                                        </div>
				</div>
			</div>
			<div class="right" id="div_formulaire">
				<div id="header_form">
					<img src="../img/chien.png" alt="Chien" class="animal" />
					<div class="protection">
						<h2>Protection CHIENS</h2>
					</div>
					<div class="protection">
						<h2>Protection CHATS</h2>
					</div>
					<img src="../img/chat.png" alt="Chat" class="animal" />
					<div class="clear"></div>
					<div class="calcul">
						<h2>CALCULEZ VOTRE TARIF</h2>
					</div>
				</div>
                                <div id="erreur" class="hidden">Merci de corriger les champs surlignés pour pouvoir soumettre le formulaire.</div>
				<form method="post" action="./submit.php" id="formulaire">
					<fieldset>
						<h2>Votre petit compagnon</h2>
                                                <input type="hidden" value="1" name="espece" id="espece" />
                                                <span>Choisissez votre animal</span> <img src="../img/chien.png" alt="chien" id="chien" class="animalchoisi" />
                                                <img src="../img/chat.png" alt="chat" id="chat" />
						<br />Sa race*
                                                    <select id="racechien" name="racechien" class="selectrace">
                                                    <option value="0"></option>
<?php 
        foreach($chiens as &$chien){
?>
                                                    <option value="<?php echo $chien['valeur']; ?>"><?php echo $chien['libelle']; ?></option>
<?php
        }
        unset($chiens);
?>
						</select>
						<select id="racechat" name="racechat" class="invisible selectrace">
                                                    <option value="0"></option>
<?php 
        foreach($chats as &$chat){
?>
                                                    <option value="<?php echo $chat['valeur']; ?>"><?php echo $chat['libelle']; ?></option>
<?php
        }
        unset($chats);
?>
						</select>
						<br /><label for="male" style="margin-right: 7px;">M&acirc;le</label> <input type="radio" class="styled" name="sexe" value="1" id="male" checked="checked">
						<label for="femelle" class="coldroite">Femelle</label> <input type="radio" class="styled" name="sexe" value="2" id="femelle">
						<br /><label for="nom_animal" id="labelnom_animal">Son nom*</label> <img src="../img/warning.png" alt="/!\\" id="warningnom_animal" class="hidden warning" /><input type="text" id="nom_animal" name="nom_animal" class="inputtext rightinput" />
						<br /><span id="labeldate_animal">Sa date de naissance*</span>
						<select name="jour_animal" id="jour_animal" class="validate['required']">
							<option value="0">jj</option>
<?php 
        for($i = 1; $i <= 31; $i++){
?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
        }
?>
						</select>
						<select name="mois_animal" id="mois_animal" class="validate['required']">
							<option value="0">mm</option>
<?php 
        foreach($tab_mois as $key => &$value){
?>
							<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
<?php
        }
?>
						</select>
						<select name="annee_animal" id="annee_animal" class="validate['required']">
							<option value="0">aaaa</option>
<?php 
        for($i = $annee; $i >= $debut_animaux; $i--){
?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
        }
?>
						</select>
                                                <img src="../img/warning.png" alt="/!\\" id="warningdate_animal" class="hidden warning" />
						<br /><label for="tatoo">Est-il tatou&eacute; ou puc&eacute;&nbsp;?</label>
						<input type="checkbox" class="styled" id="tatoo" name="tatoo" />
						<h2>Vous</h2>
						<label for="civilite">Votre civilit&eacute;</label> <select id="civilite" name="civilite">
<?php 
        foreach($civilites as &$civilite){
?>
                                                    <option value="<?php echo $civilite['valeur']; ?>"><?php echo $civilite['libelle']; ?></option>
<?php
        }
        unset($civilites);
?>
						</select>
						<br /><label for="prenom" id="labelprenom">Votre pr&eacute;nom*</label> <img src="../img/warning.png" alt="/!\\" id="warningprenom" class="hidden warning" /><input type="text" id="prenom" name="prenom" class="inputtext rightinput validate['required']" />
						<br /><label for="nom" id="labelnom">Votre nom*</label> <img src="../img/warning.png" alt="/!\\" id="warningnom" class="hidden warning" /><input type="text" id="nom" name="nom" class="inputtext rightinput validate['required']" />
						<br /><label for="adresse" id="labeladresse">Votre adresse*</label> <img src="../img/warning.png" alt="/!\\" id="warningadresse" class="hidden warning" /><input type="text" id="adresse" name="adresse" class="inputtext rightinput validate['required']" />
						<br /><label for="cp" id="labelcp">Votre code postal*</label> <img src="../img/warning.png" alt="/!\\" id="warningcp" class="hidden warning" /><input type="text" id="cp" name="cp" size="5" class="inputtext validate['required','digit','length[4,5]']" maxlength="5" />
						<select id="ville" class="hidden"></select>
						<br /><span id="labeldate">Votre date de naissance*</span>
						<select name="jour" id="jour">
							<option value="0">jj</option>
<?php 
        for($i = 1; $i <= 31; $i++){
?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
        }
?>
						</select>
						<select name="mois" id="mois">
							<option value="0">mm</option>
<?php 
        foreach($tab_mois as $key => &$value){
?>
							<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
<?php
        }
?>
						</select>
						<select name="annee" id="annee">
							<option value="0">aaaa</option>
<?php 
        for($i = $annee; $i >= $debut_humains; $i--){
?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
        }
?>
						</select>
                                                <img src="../img/warning.png" alt="/!\\" id="warningdate" class="hidden warning" />
						<br /><label for="tel" id="labeltel">Votre n&deg; de t&eacute;l&eacute;phone*</label> <img src="../img/warning.png" alt="/!\\" id="warningtel" class="hidden warning" /><input type="text" id="tel" name="tel" class="inputtext rightinput validate['required','phone']" size="12" maxlength="12" />
						<br /><label for="mail" id="labelmail">Votre email*</label> <img src="../img/warning.png" alt="/!\\" id="warningmail" class="hidden warning" /><input type="text" id="mail" name="mail" class="inputtext rightinput validate['required','email']" />
                                                <br /><h3>* : champs obligatoires</h3>
					</fieldset>
					<fieldset id="complement" class="hidden">
						<span class="longtext">Vos animaux sont-ils actuellement couverts&nbsp;?</span>
						<label for="couvertoui">OUI</label> <input type="radio" class="styled" name="couvert" value="1" id="couvertoui">
						<label for="couvertnon">NON</label> <input type="radio" class="styled" name="couvert" value="0" id="couvertnon" checked="checked">
						<div class="clear"></div>
                                                <br /><span class="longtext">Au cours des 36 derniers mois, avez-vous fait l'objet de r&eacute;siliation par un assureur&nbsp;?</span>
						<label for="resiloui">OUI</label> <input type="radio" class="styled" name="resil" value="1" id="resiloui">
						<label for="resilnon">NON</label> <input type="radio" class="styled" name="resil" value="0" id="resilnon" checked="checked">
                                                <div class="clear"></div>
                                                <br />Date d'effet du contrat souhait&eacute;
						<select name="jour_contrat" id="jour_contrat">
<?php 
        for($i = 1; $i <= 31; $i++){
                if($i == $jour_demain){
                        $selected = ' selected="selected"';
                }else{
                        $selected = '';
                }
?>
							<option value="<?php echo $i; ?>"<?php echo $selected; ?>><?php echo $i; ?></option>
<?php
        }
?>
						</select>
						<select name="mois_contrat" id="mois_contrat">
<?php 
        foreach($tab_mois as $key => &$value){
                if($key == $mois_demain){
                        $selected = ' selected="selected"';
                }else{
                        $selected = '';
                }
?>
							<option value="<?php echo $key; ?>"<?php echo $selected; ?>><?php echo $value; ?></option>
<?php
        }
?>
						</select>
						<select name="annee_contrat" id="annee_contrat">
<?php 
        for($i = $annee; $i <= $fin_contrats; $i++){
                if($i == $annee_demain){
                        $selected = ' selected="selected"';
                }else{
                        $selected = '';
                }
?>
							<option value="<?php echo $i; ?>"<?php echo $selected; ?>><?php echo $i; ?></option>
<?php
        }
?>
						</select>
						<br />Type de contrat souhait&eacute;
                                                <select id="typecontrat" name="typecontrat">
<?php 
        foreach($contrats as &$contrat){
?>
                                                    <option value="<?php echo $contrat['valeur']; ?>"><?php echo $contrat['libelle']; ?></option>
<?php
        }
        unset($contrats);
?>
						</select>
						<br /><label for="newsletter" class="longtext">Je souhaite &ecirc;tre inform&eacute;(e) des propositions commerciales de monassurancechien.com et/ou de ses partenaires.</label>
						<input type="checkbox" class="styled" id="newsletter" name="newsletter" />
                                                <div class="clear"></div>
                                                <div id="comparer">COMPARER LES TARIFS&nbsp;!</div>
					</fieldset>
				</form>
			</div>
                        <iframe src="http://dev.misterassur.com/assurance-animaux/synthese-RZ1QX7062.html" id="iframe" style="display: none;"></iframe>
			<div class="clear"></div>
			<div id="footer" class="grey">monassurancechien.com &copy; 2013 | Mentions l&eacute;gales</div>
		</div>
	</body>
</html>