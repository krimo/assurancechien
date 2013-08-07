<form action="synthese.php" method="post" novalidate>
	<?php
		if (isset($_GET["code"])) {
			$code_apporteur = filter_var($_GET["code"], FILTER_SANITIZE_STRING);
		} else {
			$code_apporteur = "5N0KXY";
		}
	?>

	<input type="hidden" name="animal_refill" id="animal-refill">
	<input type="hidden" name="animal_option_value" id="animal-option-value">
	<input type="hidden" name="code_apporteur" value="<?=$code_apporteur?>">

	<fieldset class="form-step form-step1">
		<legend><span class="step">1</span> Votre petit compagnon</legend>

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

        <hr>

        <div class="well animal-breed-well">
            <div class="row-fluid">
                <div class="span10 offset1">
                    <div class="control-group">
                        <label for="breed-selector" class="control-label">Sa race</label>
                        <div class="controls" id="breed-selector"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span6">
                <div class="control-group">
                    <label class="control-label" for="pet-name">Son nom :</label>
                    <div class="controls">
                        <input type="text" name="pet_name" class="input-block-level" id="pet-name" pattern="^[a-zA-Z0-9]+[a-zA-Z0-9 -]+[a-zA-Z0-9]+$" required>
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="control-group">
                    <label class="control-label">Sa date de naissance :</label>
                    <div class="controls">
                        <div class="row-fluid">
                            <input type="text" name="pbday" id="pbday" class="datemask input-medium text-center" data-threemonths data-upperdate="<?=date("d/m/Y", strtotime("today"))?>" data-lowerdate="<?=date("d/m/Y", strtotime("-20 years"))?>" placeholder="JJ/MM/AAAA" pattern="^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-horizontal gray-bg">
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

		<div class="form-horizontal normal-bg">
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

		<div class="form-horizontal gray-bg">
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

		<div class="form-horizontal normal-bg">
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
		<button type="button" class="btn btn-info btn-large pull-right continue-btn">Continuer &raquo;</button>
	</fieldset>

	<fieldset class="form-step form-step2">
		<legend><span class="step">2</span> Vous</legend>

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

        <div class="gray-bg">
            <div class="row-fluid">
                <div class="span9">
                    <div class="control-group">
                        <label class="control-label" for="owner-address">Votre adresse :</label>
                        <div class="controls">
                            <input type="text" name="owner_address" class="input-block-level" id="owner-address" required>
                        </div>
                    </div>
                </div>
                <div class="span3">
                  <div class="control-group">
                        <label class="control-label" for="owner-birthday">Date de naissance :</label>
                        <div class="controls">
                            <div class="row-fluid">
                                <input type="text" name="bday" id="bday" class="datemask input-block-level text-center" data-upperdate="<?=date("d/m/Y", strtotime("-18 years"))?>" data-lowerdate="<?=date("d/m/Y", strtotime("-80 years"))?>" placeholder="JJ/MM/AAAA" pattern="^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="normal-bg">
            <div class="row-fluid">
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label" for="zip-code">Code postal :</label>
                        <div class="controls">
                            <input type="text" name="zip_code" class="input-block-level text-center" id="zip-code" data-exactly="5" data-type="digits" required>
                        </div>
                    </div>
                </div>
                <div class="span9">
                    <div class="control-group insee-holder">
                        <label class="control-label" for="insee">Ville :</label>
                        <div class="controls">
                            <select type="text" name="insee" class="input-block-level" id="insee" required></select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="gray-bg">
            <div class="row-fluid">
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label" for="owner-phone">Votre n° de téléphone :</label>
                        <div class="controls">
                            <input type="tel" name="owner_phone" id="owner-phone" class="input-block-level" pattern="[0-9]{10}" maxlength="10" required>
                        </div>
                    </div>
                </div>
                <div class="span5">
                    <div class="control-group">
                        <label class="control-label" for="owner-email">Votre e-mail :</label>
                        <div class="controls">
                            <input type="email" name="owner_email" id="owner-email" class="input-block-level" placeholder="votre-email@example.fr" required>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="control-group">
                        <label class="control-label" for="contract-start-date">Date d'effet du contrat souhaitée :</label>
                        <div class="controls">
                            <div class="row-fluid">
                                <input type="text" name="csd" id="csd" class="datemask input-block-level text-center" value="<?=date("d/m/Y", strtotime("+3 days"))?>" data-lowerdate="<?=date("d/m/Y", strtotime("today"))?>" data-upperdate="<?=date("d/m/Y", strtotime("+1 year"))?>" pattern="^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-horizontal normal-bg">
            <div class="control-group zebra">
                <label for="contract-type" class="control-label">Type de formule souhaitée :</label>
                <div class="controls">
                    <select name="contract_type" id="contract-type">
                        <option value="1">Basique</option>
                        <option value="2">Sérénité</option>
                        <option value="3">Premium</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-horizontal gray-bg">
            <div class="control-group">
                <label class="control-label optin-label">Souhaitez-vous bénéficier des meilleures offres de nos partenaires ?</label>
                <div class="controls">
                    <label class="radio inline">
                        <input type="radio" id="optin-1" name="optin" value="0" required> Non
                    </label>
                    <label class="radio inline">
                        <input type="radio" id="optin-2" name="optin" value="1" required> Oui
                    </label>
                </div>
            </div>
        </div>

		<hr>

		<p class="muted"><small>Ces informations sont nécessaires pour vous proposer un devis personnalisé.</small></p>

		<button type="button" class="btn btn-info btn-mini back-btn">Retour</button>
		<button type="submit" class="btn btn-large btn-primary btn-large pull-right">Afficher les tarifs &raquo;</button>

	</fieldset>
</form>
