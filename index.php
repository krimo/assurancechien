<?php require_once("_top.php"); ?>
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

					<section>
						<p class="lead">Les frais vétérinaires ont un coût important, d’une centaine d’euros par an pour un chien en bonne santé à plusieurs milliers d’euros lorsqu’un accident ou une maladie survient. Pour les maîtres, les soins peuvent devenir un gouffre financier, au bout duquel il faudra choisir entre la santé de son fidèle compagnon et celle de ses finances.</p>

						<p>Pour éviter d’en arriver à une telle extrémité, le soutien <strong>d’une assurance chien</strong> peut être le bienvenu. Avec des prestations adaptées, un contrat peut prendre en charge tout ou partie des frais vétérinaires. Les risques listés par le contrat sont couverts (accident, maladie, prévention, décès…), les prestations indiquées sont également couvertes (consultation, médicaments, radio…) et il est possible d’être remboursé au taux défini par la formule pour les frais engagés, de 50 à 100 %. Voilà de quoi soulager le maître dans le paiement de la facture du vétérinaire et envisager un bel avenir santé pour son chien. </p>

						<h4>Comment choisir son assurance ?</h4>
						<p>Maître prudent, vous souhaitez protéger la santé de votre chien avec une assurance pour animaux de compagnie mais vous ne savez pas comment choisir. Il est vrai qu'il est difficile de s'y retrouver, tant les offres sont nombreuses et variées. Pourquoi de tels écarts de prix ? <strong>Quelle couverture choisir pour une protection efficace ?</strong> Pour trouver les réponses, rendez-vous sur ce site ! Il vous aidera à comprendre les contrats et à réaliser un choix éclairé.</p>

						<h4>Les garanties de l’assurance Chien</h4>
						<p>Le site vous accompagne dans la compréhension des contrats d'assurance santé pour chien présents sur le marché. <strong>Décryptez les garanties</strong> et sélectionnez celles dont votre animal de compagnie a besoin : accident, maladie, prévention, décès&hellip; Apprenez à identifier les limitations de garantie : exclusions, délais de carence, franchises, plafonds d'indemnisation&hellip; Ainsi armé, vous pourrez comparer habilement les prestations et les tarifs de différents contrats.</p>

						<h4>Un outil de comparaison d’assurance</h4>
						<p>L'outil de simulation assurance vous aidera alors à sélectionner <strong>l'offre la plus en phase avec vos attentes</strong>, les caractéristiques de votre animal (âge, race...) et enfin votre budget. Pour cela, il vous suffit de remplir un simple formulaire. Avez-vous besoin d'une couverture à 50 ou à 100 % ? Souhaitez-vous que les vaccinations soient prises en charge ? Quel budget définissez-vous pour votre assurance chien ? En quelques clics et sans engagement, vous obtenez des devis répondant à vos attentes.</p>
					</section>
				</div>

				<!-- form outer container -->
				<div class="span6 offset1">
					<div class="form-container">
						<h2>Calculez votre tarif gratuitement et comparez !</h2>
						<form action="synthese.php" method="post" novalidate>
							<fieldset class="step step1">
								<legend>Votre petit compagnon</legend>
								
								<p class="text-center">Cliquez sur l'image correspondant à votre compagnon</p>

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
<?php require_once("_bottom.php"); ?>