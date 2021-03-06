<?php require_once("_top.php"); ?>
		<div class="container">
			<div class="row-fluid">			
				<!-- text outer container -->
				<div class="span5">
					
					<div class="hook">
						<h1 class="hidden-desktop text-center">www.monssurancechien.com</h1>
						<p class="lead-alt">Les <strong>meilleurs tarifs</strong> accessibles en moins de <strong>deux minutes</strong> avec une gamme de formules sur-mesure.</p>
						<img src="img/arrow-big.png" alt="" class="big-arrow hidden-phone">
					</div>

					<ul class="form-steps unstyled">
						<li class="form-step"><h4><span class="step">1</span>Je remplis ce formulaire <span class="text-info">en moins de deux minutes</span></h4></li>
						<li class="form-step"><h4><span class="step">2</span>J'affiche les tarifs et je compare les offres</h4></li>
					</ul>

					<div class="thumbnail hidden-phone">
						<img src="img/animaux_alt.jpg" alt="Une femme et ses animaux de companie">
						<div class="caption">							
							<h3 class="text-info">Frais vétérinaires, vaccins, maladies, accidents...</h3>
							<h3 class="muted">Quelques euros/mois pour leur mutuelle, ça simplifie la vie !</h3>
							<p>Les frais vétérinaires ont un coût important, d’une centaine d’euros par an pour un chien en bonne santé à plusieurs milliers d’euros lorsqu’un accident&hellip;<br><br><a href="comprendre-assurance-chien.php">Comprendre l'assurance chien &raquo;</a></p>	
						</div>
					</div>

				</div>

				<!-- form outer container -->
				<div class="span7">
					<div class="form-container">
						<h2 class="hidden-phone">Calculez votre tarif gratuitement <br>et comparez !</h2>
						<form action="synthese.php" method="post" novalidate>
							<fieldset class="step step1">
								<legend>Votre petit compagnon</legend>

								<div id="erreur-animal">
									<div class="alert alert-error">
										<strong>Matou, toutou ou caribou ?</strong> Choisissez un animal pour continuer&hellip;
									</div>
								</div>
								
								<div class="control-group">
									<p class="text-center animal-picker">Cliquez sur l'image correspondant à votre compagnon</p>
									<div class="row-fluid">
										<div class="span5">
											<div class="animal-holder animated chien" data-selector-id="#chien">		
												<h4>Chien</h4>
												<p><small><em>&ldquo;Woof !&rdquo;</em></small></p>
											</div>
										</div>
										<div class="span4">
											<div class="animal-holder animated chat" data-selector-id="#chat">					
												<h4>Chat</h4>
												<p><small><em>&ldquo;Miaou !&rdquo;</em></small></p>
											</div>
										</div>
										<div class="span3">
											<div class="animal-holder animated nac" data-selector-id="#nac">					
												<h4>Autres</h4>
												<p><small><em>&ldquo;Crr-Crr !&rdquo;</em></small></p>
											</div>
										</div>
									</div>
								</div>

								<div id="breed-selector" class="row-fluid"></div>

								<?php 
									if (isset($_GET["code"])) {
										$code_apporteur = filter_var($_GET["code"], FILTER_SANITIZE_STRING);
									} else {
										$code_apporteur = "IG9DGC";
									}
								?>

								<input type="hidden" name="animal_refill" id="animal-refill">
								<input type="hidden" name="animal_option_value" id="animal-option-value">
								<input type="hidden" name="code_apporteur" value="<?=$code_apporteur?>">

								<div class="row-fluid zebra zebra-margin">
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
											<label class="control-label">Sa date de naissance :</label>
											<div class="controls">
												<div class="row-fluid">
													<input type="text" name="pbirthday_day" id="pbirthday-day" class="span4 date-input" maxlength="2" minlength="2" size="2" data-range="[1, 31]" placeholder="Jour" required>
													<input type="text" name="pbirthday_month" id="pbirthday-month" class="span4 date-input" size="2" minlength="2" maxlength="2" data-range="[1, 12]" placeholder="Mois" required>
													<input type="text" name="pbirthday_year" id="pbirthday-year" class="span4 date-input" size="4" minlength="4" maxlength="4" data-max="2013" placeholder="Année" required>
												</div>	
											</div>
										</div>
									</div>
								</div>
								
								<div class="form-horizontal">
									<div class="control-group">
										<label class="control-label">Sexe de votre animal :</label>
										<div class="controls">
											<label class="radio inline">
												<input type="radio" id="pet-gender-1" name="pet_gender" value="male" required checked> Mâle
											</label>
											<label class="radio inline">
												<input type="radio" id="pet-gender-2" name="pet_gender" value="femelle" required> Femelle
											</label>
										</div>
									</div>										
								</div>

								<div class="form-horizontal zebra">
									<div class="control-group">
										<label class="control-label">Votre animal est-il déjà couvert ?</label>
										<div class="controls">
											<label class="radio inline">
												<input type="radio" id="pet-insured-1" name="pet_insured" value="0" required checked> Non
											</label>
											<label class="radio inline">
												<input type="radio" id="pet-insured-2" name="pet_insured" value="1" required> Oui
											</label>
										</div>
									</div>										
								</div>

								<div class="form-horizontal">
									<div class="control-group">
										<label class="control-label">Au cours des 36 derniers mois, avez-vous fait l'objet de résiliation par un assureur ?</label>
										<div class="controls">
											<label class="radio inline">
												<input type="radio" id="contract-cancelled-1" name="contract_cancelled" value="0" checked required> Non
											</label>
											<label class="radio inline">
												<input type="radio" id="contract-cancelled-2" name="contract_cancelled" value="1" required> Oui
											</label>
										</div>
									</div>										
								</div>

								<div class="form-horizontal zebra">
									<div class="control-group">
										<label class="control-label">Est-il tatoué ou pucé ?</label>
										<div class="controls">
											<label class="radio inline">
												<input type="radio" id="pet-tag-1" name="pet_tag" value="0" required> Non
											</label>
											<label class="radio inline">
												<input type="radio" id="pet-tag-2" name="pet_tag" value="1" checked required> Oui
											</label>
										</div>
									</div>										
								</div>
								
								<hr>
							
								<p class="muted"><small>Ces informations sont nécessaires pour vous proposer un devis personnalisé.</small></p>
								<button type="button" class="btn btn-info pull-right" id="continue-btn">Continuer &raquo;</button>
							</fieldset>

							<fieldset class="step step2">
								<legend>Vous</legend>
																
								<div class="row-fluid zebra zebra-margin">
									<div class="span2">
										<div class="control-group">
											<label class="control-label" for="owner-gender">Civilité :</label>
											<div class="controls">
												<select name="owner_gender" id="owner-gender" class="input-block-level">
													<option value="1">M.</option>
													<option value="2" selected>Mme</option>
												</select>
											</div>
										</div>
									</div>
									<div class="span5">
										<div class="control-group">
											<label class="control-label" for="owner-surname">Votre prénom :</label>
											<div class="controls">
												<input type="text" name="owner_surname" class="input-block-level" id="owner-surname" required>
											</div>
										</div>
									</div>
									<div class="span5">
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

								<div class="row-fluid zebra zebra-margin">
									<div class="span3">										
										<div class="control-group">
											<label class="control-label" for="zip-code">Code postal :</label>
											<div class="controls">
												<input type="text" name="zip_code" class="input-block-level span6" id="zip-code" data-minlength="5" maxlength="5" required>
											</div>
										</div>
									</div>
									<div class="span9">										
										<div class="control-group">
											<label class="control-label" for="insee">Ville :</label>
											<div class="controls">
												<select type="text" name="insee" class="input-block-level" id="insee" required></select>
											</div>
										</div>										
									</div>
								</div>
								<div class="form-horizontal">
									<div class="control-group">
										<label class="control-label" for="owner-birthday">Date de naissance :</label>
										<div class="controls">
											<div class="row-fluid">
												<input type="text" name="obirthday_day" id="obirthday-day" class="span2 date-input" maxlength="2" minlength="2" data-range="[1, 31]" placeholder="Jour" required>
												<input type="text" name="obirthday_month" id="obirthday-month" class="span2 date-input" maxlength="2" minlength="2" data-range="[1, 12]" placeholder="Mois" required>
												<input type="text" name="obirthday_year" id="obirthday-year" class="span3 date-input" maxlength="4" minlength="4" placeholder="Année" required>
											</div>	
										</div>
									</div>
									<div class="control-group zebra">
										<label class="control-label" for="owner-phone">Votre n° de téléphone :</label>
										<div class="controls">
											<input type="tel" name="owner_phone" id="owner-phone" class="span5" pattern="[0-9]{10}" maxlength="10" required>
										</div>
									</div>	
								</div>

								<div class="row-fluid">
									<div class="span6">
										<div class="control-group">
											<label class="control-label" for="owner-email">Votre e-mail :</label>
											<div class="controls">
												<input type="email" name="owner_email" id="owner-email" class="input-block-level" placeholder="votre-email@example.fr" required>
											</div>
										</div>										
									</div>
									<div class="span6">
										<div class="control-group">
											<label class="control-label" for="contract-start-date">Date d'effet du contrat souhaitée :</label>
											<div class="controls">
												<div class="row-fluid">
													<input type="text" name="csd_day" id="csd-day" class="span2 date-input" maxlength="2" data-range="[1, 31]" placeholder="Jour" value="<?=date("d", strtotime("+1 day"));?>"  required>
													<input type="text" name="csd_month" id="csd-month" class="span2 date-input" maxlength="2" data-range="[1, 12]" placeholder="Mois" value="<?=date("m", strtotime("+1 day"));?>" required>
													<input type="text" name="csd_year" id="csd-year" class="span3 date-input" maxlength="4" data-range="[2013, 2020]" placeholder="Année" value="<?=date("Y", strtotime("+1 day"));?>" required>
												</div>	
											</div>
										</div>										
									</div>
								</div>

								<div class="control-group zebra">
									<label for="contract-type" class="control-label">Type de formule souhaitée :</label>
									<div class="controls">
										<label class="radio inline"><input type="radio" name="contract_type" checked> Basique</label>
										<label class="radio inline"><input type="radio" name="contract_type"> Sérénité</label>
										<label class="radio inline"><input type="radio" name="contract_type"> Premium</label>
									</div>
								</div>					

								<div class="form-horizontal">
									<div class="control-group margin-cindy">
										<label class="control-label optin-label">Souhaitez-vous bénéficier des meilleures offres de nos partenaires ?</label>
										<div class="controls">
											<label class="radio inline">
												<input type="radio" id="optin-1" name="optin" value="0" checked required> Non
											</label>
											<label class="radio inline">
												<input type="radio" id="optin-2" name="optin" value="1" required> Oui
											</label>
										</div>
									</div>										
								</div>
								
								<hr>

								<p class="muted"><small>Ces informations sont nécessaires pour vous proposer un devis personnalisé.</small></p>

								<button type="button" class="btn btn-info btn-mini" id="back-btn">Retour</button>
								<button type="submit" class="btn btn-large btn-primary pull-right">Afficher les tarifs &raquo;</button>

							</fieldset>
						</form>
					</div>
				</div>
			</div>	
		</div>
<?php require_once("_bottom.php"); ?>