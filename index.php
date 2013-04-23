<?php require_once("_top.php"); ?>
		<div class="container">
			<div class="row-fluid">			
				<!-- text outer container -->
				<div class="span5">
					
					<p class="lead-alt">Les <strong>meilleurs tarifs</strong> accessibles en moins de <strong>deux minutes</strong> avec une gamme de formules sur-mesure.</p>

					<img src="img/arrow-big.png" alt="" class="big-arrow hidden-phone">

					<ul class="form-steps">
						<li class="form-step"><h4>1/ Je remplis ce formulaire <span class="text-info">en moins de deux minutes</span></h4></li>
						<li class="form-step"><h4>2/ J'affiche les tarifs et je compare les offres</h4></li>
					</ul>

					<div class="thumbnail hidden-phone">
						<img src="img/animaux.jpg" alt="Une femme et ses animaux de companie">
						<h3>Assurez votre chien</h3>
						<p><span class="text-info">Frais vétérinaires, vaccins, maladies, accidents&hellip;</span> Quelques euros/mois pour leur mutuelle, ça simplifie la vie ! Les frais vétérinaires ont un coût important, d’une centaine d’euros par an pour un chien en bonne santé à plusieurs milliers d’euros lorsqu’un accident&hellip; <a href="comprendre-assurance-chien.php">Comprendre l'assurance chien &raquo;</a></p>	
					</div>

				</div>

				<!-- form outer container -->
				<div class="span6 offset1">
					<div class="form-container">
						<h2>Calculez votre tarif gratuitement <br>et comparez !</h2>
						<form action="synthese.php" method="post" novalidate>
							<fieldset class="step step1">
								<legend>Votre petit compagnon</legend>
								
								<p class="text-center animal-picker">Cliquez sur l'image correspondant à votre compagnon</p>

								<div class="row-fluid">
									<div class="span6">
										<div class="animal-holder chien">										
											<h4>Chien</h4>
											<p><em>&ldquo;Woof !&rdquo;</em></p>
										</div>
									</div>
									<div class="span6">
										<div class="animal-holder chat">					
											<h4>Chat</h4>
											<p><em>&ldquo;Miaou !&rdquo;</em></p>
										</div>
									</div>
								</div>

								<img src="img/ajax-loader.gif" alt="En cours de chargement..." id="loading-gif">

								<div id="breed-selector"></div>

								<label class="radio inline">
									<input type="radio" id="pet-gender-1" name="pet_gender" value="male" required checked> Mâle
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
																
								<div class="row-fluid">
									<div class="span2">
										<div class="control-group">
											<label class="control-label" for="owner-gender">Civilité :</label>
											<div class="controls">
												<select name="owner_gender" id="owner-gender" class="input-block-level">
													<option value="1">Mme</option>
													<option value="2">M.</option>
													<option value="3">Mlle</option>
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

								<div class="form-horizontal">
									<div class="control-group">
										<label class="control-label" for="zip-code">Votre code postal :</label>
										<div class="controls">
											<input type="text" name="zip_code" class="span5" id="zip-code" maxlength="5" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="owner-birthday">Votre date de naissance :</label>
										<div class="controls">
											<input type="text" name="owner_birthday" class="span5" id="owner-birthday" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" placeholder="JJ/MM/AAAA" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="owner-phone">Votre numéro de téléphone :</label>
										<div class="controls">
											<input type="tel" name="owner_phone" id="owner-phone" class="span5" pattern="[0-9]{10}" required>
										</div>
									</div>	
								</div>
								<!--  
								<div class="row-fluid">
									<div class="span3">
									</div>
									<div class="span4">
									</div>
									<div class="span5">
									</div>
								</div>

								-->

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
												<input type="text" name="contract_start_date" class="input-block-level" id="contract-start-date" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" placeholder="au format JJ/MM/AAAA" value="<?=date('d/m/Y', strtotime('+ 3 days'));?>" required>
											</div>
										</div>										
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

								<hr>

								<p class="muted"><small>Ces informations sont nécessaires pour vous proposer un devis personnalisé.</small></p>

								<button type="button" class="btn btn-large" id="back-btn">Retour</button>
								<button type="submit" class="btn btn-large btn-primary pull-right">Envoyer &raquo;</button>

							</fieldset>
						</form>
					</div>
				</div>
			</div>	
		</div>
<?php require_once("_bottom.php"); ?>