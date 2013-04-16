<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Assurance chien - Comparez gratuitement les meilleurs tarifs des mutuelles pour votre animal</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta name="keywords" content="assurance santé, assurance chien" />
	<meta name="description" content="Une assurance santé pour votre chien" />
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<link rel="stylesheet" href="css/app.css">

	<!-- Google font -->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,900,400italic' rel='stylesheet' type='text/css'>
	
	<!-- Google Analytics -->
	<script>var _gaq=[['_setAccount','UA-34879513-7'],['_trackPageview']];(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src='//www.google-analytics.com/ga.js';s.parentNode.insertBefore(g,s)}(document,'script'))</script>
</head>
<body>
	<!--[if lt IE8]>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js"></script>

		<style>
			.chromeFrameInstallDefaultStyle {
			width: 100%; /* default is 800px */
			border: 5px solid blue;
			}
		</style>

		<div id="prompt">
			<p class="chromeframe">Vous utilisez un navigateur <strong>obsolète</strong>. Merci <a href="http://www.google.com/chromeframe/?redirect=true">d'activer Google Chrome Frame</a> pour le mettre à jour le plus facilement possible.</p>
		</div>

		<script>
			// The conditional ensures that this code will only execute in IE,
			// Therefore we can use the IE-specific attachEvent without worry
			window.attachEvent("onload", function() {
				CFInstall.check({
					mode: "overlay", // the default
					node: "prompt"
				});
			});
		</script>
		<![endif]-->
		<div class="header-container">
			<div class="container">
				<div class="row-fluid">
					<div class="span7">
						<div class="hgroup">
							<h1 class="header">Mon Assurance Chien <br> <small>Le comparateur de mutuelles chien et chat</small></h1>

							<span class="label label-warning">Gratuit, rapide &amp; sans engagement</span>
						</div>		
					</div>
					<div class="span5">
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row-fluid">			
				<!-- text outer container -->
				<div class="span5">
					
					<div class="media">
						<a class="pull-left" href="#">
							<img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="img/stopwatch.png">
						</a>
						<div class="media-body">
							<p class="lead">Les <strong>meilleurs tarifs</strong> accessibles en moins de <strong>deux minutes</strong> avec une gamme de formules sur-mesure.
							</p>
						</div>
					</div>

					<ol class="steps hidden-phone">
						<li><p>Je remplis ce formulaire <em>en moins de deux minutes</em></p></li>
						<li><p>J'affiche les tarifs et je compare les offres</p></li>
					</ol>

					<img src="img/animaux.jpg" alt="Une femme et ses animaux de companie" class="img-polaroid hidden-phone">

					<hr>

					<blockquote class="hidden-phone">			  	
						<p><strong>Frais vétérinaires, vaccins, maladies, accidents&hellip;</strong> Quelques euros par mois pour leur mutuelle, ça simplifie la vie !</p>
					</blockquote>
				</div>

				<!-- form outer container -->
				<div class="span6 offset1">
					<div class="form-container">
						<h2>Calculez votre tarif gratuitement et comparez !</h2>
						<form action="synthese.php" method="post" novalidate>
							<fieldset class="step step1">
								<legend>Votre petit compagnon</legend>

								Cliquez sur l'image correspondant à votre compagnon<br>
								<img src="img/chien.png" alt="chien" class="img-radio" data-select="chien">
								<img src="img/chat.png" alt="chat" class="img-radio" data-select="chat">

								<img src="img/ajax-loader.gif" alt="En cours de chargement..." id="loading-gif">

								<div id="breed-selector"></div>

								<label class="radio inline">
									<input type="radio" id="pet-gender-1" name="pet_gender" value="male" required> Mâle
								</label>
								<label class="radio inline">
									<input type="radio" id="pet-gender-2" name="pet_gender" value="femelle" required> Femelle
								</label>

								<div class="row-fluid">
									<div class="span6">
										<div class="control-group">
											<label class="control-label" for="pet-name">Son nom :</label>
											<div class="controls">
												<input type="text" name="pet_name" class="input-block-level" id="pet-name" required>
											</div>
										</div>
									</div>
									<div class="span6">
										<div class="control-group">
											<label class="control-label" for="pet-birthday">Sa date de naissance :</label>
											<div class="controls">
												<input type="text" name="pet_birthday" class="input-block-level" id="pet-birthday" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" placeholder="au format JJ/MM/AAAA" required>	
											</div>
										</div>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Votre animal est-il déjà couvert ?</label>
									<div class="controls">
										<label class="radio inline">
											<input type="radio" id="pet-insured-1" name="pet_insured" value="0" checked> Non
										</label>
										<label class="radio inline">
											<input type="radio" id="pet-insured-2" name="pet_insured" value="1"> Oui
										</label>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Au cours des 36 derniers mois, avez-vous fait l'objet de résiliation par un assureur ?</label>
									<div class="controls">		    						
										<label class="radio inline">
											<input type="radio" id="contract-cancelled-1" name="contract_cancelled" value="0" checked> Non
										</label>
										<label class="radio inline">
											<input type="radio" id="contract-cancelled-2" name="contract_cancelled" value="1"> Oui
										</label>
									</div>
								</div>

								<label class="checkbox" for="pet-tag">
									<input type="checkbox" name="pet_tag" id="pet-tag" checked> Cochez s'il est tatoué / pucé
								</label>

								<p class="muted"><small>Ces informations sont nécessaires pour vous proposer un devis personnalisé.</small></p>
								<button type="button" class="btn" id="continue-btn">Continuer &raquo;</button>
							</fieldset>

							<fieldset class="step step2">
								<legend>Vous</legend>
								<label for="owner-gender">Civilité :</label>
								<select name="owner_gender" id="owner-gender" class="input-block-level">
									<option value="1">Madame</option>
									<option value="2">Monsieur</option>
									<option value="3">Mademoiselle</option>
								</select>
								
								<div class="row-fluid">
									<div class="span6">
										<div class="control-group">
											<label for="owner-surname">Votre prénom :</label>
											<div class="controls">
												<input type="text" name="owner_surname" class="input-block-level" id="owner-surname" required>
											</div>
										</div>
									</div>
									<div class="span6">
										<div class="control-group">
											<label class="control-label" for="owner-name">Votre nom :</label>
											<div class="controls">			
												<input type="text" name="owner_name" class="input-block-level" id="owner-name" required>
											</div>
										</div>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="owner-address">Votre adresse :</label>
									<div class="controls">
										<input type="text" name="owner_address" class="input-block-level" id="owner-address" required>
									</div>
								</div>

								<div class="row-fluid">
									<div class="span3">
										<div class="control-group">
											<label class="control-label" for="zip-code">Votre code postal :</label>
											<div class="controls">
												<input type="text" name="zip_code" class="input-block-level" id="zip-code" maxlength="5" required>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label" for="owner-birthday">Votre date de naissance :</label>
											<div class="controls">
												<input type="text" name="owner_birthday" class="input-block-level" id="owner-birthday" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" placeholder="JJ/MM/AAAA" required>
											</div>
										</div>
									</div>
									<div class="span5">
										<div class="control-group">
											<label class="control-label" for="owner-phone">Votre numéro de téléphone :</label>
											<div class="controls">
												<input type="tel" name="owner_phone" id="owner-phone" class="input-block-level" pattern="[0-9]{10}" required>
											</div>
										</div>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="owner-email">Votre e-mail :</label>
									<div class="controls">
										<input type="email" name="owner_email" id="owner-email" class="input-block-level" placeholder="votre-email@example.fr" required>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="contract-start-date">Date d'effet du contrat souhaitée :</label>
									<div class="controls">
										<input type="text" name="contract_start_date" class="input-block-level" id="contract-start-date" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" placeholder="au format JJ/MM/AAAA" value="<?=date('d/m/Y', strtotime('+ 3 days'));?>" required>
									</div>
								</div>

								<div class="control-group">
									<label for="contract-type" class="control-label">Type de formule souhaitée :</label>
									<div class="controls">
										<select name="contract_type" id="contract-type" class="input-block-level">
											<option value="1">Basique</option>
											<option value="2">Sérénité</option>
											<option value="3">Premium</option>
										</select>
									</div>
								</div>


								<label class="checkbox inline">
									<input type="checkbox" id="optin" name="optin"> Je souhaite être informé(e) des propositions commerciales de monassurancechien.com et/ou de ses partenaires.
								</label>	

								<p class="muted"><small>Ces informations sont nécessaires pour vous proposer un devis personnalisé.</small></p>

								<hr>

								<button type="button" class="btn btn-large" id="back-btn">Retour</button>
								<button type="submit" class="btn btn-large btn-primary pull-right">Envoyer &raquo;</button>

							</fieldset>
						</form>
					</div>
				</div>
			</div>	
		</div>

		<div class="footer-container">
			<div class="container">
				<footer class="row-fluid">
					<p>&copy; <?=date("Y");?> Monassurancechien.com </p>
					<p class="muted"><small>
						Monassurancechien.com est un comparateur indépendant d'assurances pour votre chien ou votre chat. N'hésitez pas à réaliser un devis gratuit et sans engagement sur notre site.
					</small></p>
				</footer>
			</div>
		</div>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/app.min.js"></script>
	</body>
	</html>