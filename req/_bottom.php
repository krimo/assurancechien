		<hr>

		<div class="row-fluid">
			<div class="span12">
				<article class="seo-article">
					<p class="lead">Normalement, votre animal est couvert pour les dommages qu’il pourrait causer par votre assurance multirisques-habitation. En revanche, il ne l’est pas pour ceux qu’il pourrait subir. Les frais vétérinaires restent donc à votre charge. De quelques dizaines à plusieurs milliers d’euros par an selon la santé de votre compagnon, ils peuvent devenir un poids pour votre budget. Heureusement, il existe des assurances santé pour vous aider. Voici quelques conseils destinés à vous épauler dans vos recherches.</p>

					<h3>Comment choisir son assurance ?</h3>
					<p>Pour bien choisir votre <strong>assurance chien, chat ou nouveaux animaux de compagnie</strong>, vous devez vous pencher sur les modalités de remboursement et les garanties.</p>
					<p>Concernant les modalités de <strong>remboursement</strong>, sachez qu’elles diffèrent selon la formule choisie. En effet, certaines vous proposent de rembourser vos frais vétérinaires à hauteur de 50 % seulement, d’autres à hauteur de 100 %. A vous de voir si vous souhaitez une meilleure couverture, moyennant le paiement d’une prime plus élevée. Dans tous les cas, attention aux franchises et aux plafonds de remboursement, sources de mauvaises surprises.</p>
					<p>Concernant les garanties, sachez que votre animal n’est couvert que pour les risques listés dans son contrat d’assurance. En souscrivant, vous pouvez choisir une ou plusieurs de ces garanties.</p>

					<h3>Les garanties de l’assurance Chien</h3>
					<p>Les chiens ou chats peuvent être assurés contre quatre types de risques.</p>
					<p>La garantie accident est généralement la base de l’assurance « animal de compagnie ». Elle le protège contre tous les dommages accidentels qu’il pourrait subir. Par exemple, il sera pris en charge pour une patte cassée.</p>
					<p>La garantie décès vous promet le versement d’un capital si votre chien ou chat venait à mourir. Cette somme d’argent vous permettra notamment de couvrir les frais d’obsèques.</p>
					<p>La garantie maladie couvre votre animal de compagnie pour tous ses problèmes de santé, du petit rhume au cancer. Attention, il existe des exclusions de garantie pour les maladies préexistantes à la signature du contrat ou les maladies génétiques.</p>
					<p>Pour finir, les contrats les plus haut-de-gamme incluent une garantie prévention. Celle-ci vous permet de prendre soin de votre compagnon au mieux. Vous verrez vos dépenses de vaccination, stérilisation, vermifugations, etc. prises en charge. La prévention, c’est la protection de votre animal au quotidien.</p>

					<h3>Un outil de comparaison d’assurance</h3>
					<p>Comment choisir le contrat le plus adapté à vos attentes, aux caractéristiques de votre animal et à votre budget ? Pour cela, rien de tel qu’un <strong>outil de simulation assurance</strong>. Celui qui est gratuitement mis à votre disposition sur le site vous proposera des contrats répondant à vos exigences. Quelques clics suffisent pour sélectionner l’offre au meilleur rapport qualité – prix.</p>
				</article>
			</div>
		</div>

</div>
<!-- END main container -->

	<div class="footer-container">
		<div class="container">
			<footer class="row-fluid">
				<p>&copy; <?=date("Y");?> assurancedesanimaux.fr &mdash; <a href="#mentions-legales" data-toggle="modal">Mentions légales</a></p>
			</footer>
		</div>
	</div>

	<div class="modal hide fade" id="mentions-legales">
		<div class="modal-body">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<p><img src="img/ml.png" alt="mentions legales"></p>
		</div>
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="js/plugins.min.js"></script>
	<script src="js/template.js"></script>
	<script>
		$(document).ready(function() {
			// Specific page code here
			var animalChosen = false,
				animalRefill = $("#animal-refill"),
				animalOptionValue = $("#animal-option-value"),
				animalHolderArray = [];

			$(".animal-holder").on({
				click: function() {

					var $this = $(this),
						$breedSelector = $("#breed-selector"),
						loadUrl = "breed-selector.html "+$this.attr("data-selector-id"),
						otherAnimals = $(".animal-holder").not(this);

					animalRefill.val($this.attr("data-selector-id").replace("#",""));
					animalChosen = true;
					if (animalHolderArray.indexOf(loadUrl) == -1) {
						animalHolderArray.push(loadUrl);
					}

					if($("#erreur-animal").is(":visible")) {
						$("#erreur-animal").fadeOut(300);
					}

					$this.toggleClass('highlight bounce');
					otherAnimals.removeClass('highlight bounce');

					$breedSelector.load(loadUrl, function() {

						var animalSelect = $(".animal-select");

                        $('.animal-breed-well').addClass('shown');

						animalSelect.parsley({
							successClass: 'success',
							errorClass: 'error',
							errors: {
								classHandler: function(elem) {
									return $(elem).parents(".control-group");
								},
								errorsWrapper: '<div></div>',
								errorElem: '<p class="help-block"></p>'
							}
						});

						if (animalHolderArray.length > 1) {
							animalSelect.val(null);
						} else {
							animalSelect.val(animalOptionValue.val())
						}

						animalSelect.on("change", function() {
							animalOptionValue.val($(this).val());
						});
					});
				}
			});

			$(".continue-btn").on("click", function() {
				if (!animalChosen) {
					$("#erreur-animal").fadeIn(300);
				}
			});

			if(theFormCookie) {
				$(".animal-holder."+theFormCookie.animal_refill).click();
			}

			if ($("#zip-code").is(":visible") && $("#zip-code").val().length === 5) {
				get_insee($("#zip-code").val(), $("#zip-code").attr("id"), "insee");
			}
		});
	</script>
</body>
</html>
