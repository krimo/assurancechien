function get_insee(zipCode) {
	$.ajax({
		url: '/liste-insee.php',
		type: 'POST',
		cache: false,
		data: "cp="+zipCode,
		success: function (data) {
			optionArray = [];
			$.each($.parseJSON(data), function(k,v) {
				if (k == null) {
					$("#insee").html("<option value=>Code postal érroné</option>");
					$("#zip-code").parents(".control-group").removeClass("success").addClass("error");
				} else {
					optionArray.push("<option value="+k+">"+v+"</option>");
				}
			});
			$("#insee").html(optionArray.join(" "));		
		},
		error: function (d, r, obj) {
			console.log(r);
		}
	});	
}

$(document).ready(function() {

	var animalChosen = false, 
		theFormCookie = $.cookie('form'), 
		theForm = $("form"), 
		animalRefill = $("#animal-refill"),
		animalOptionValue = $("#animal-option-value"),
		animalHolderArray = [];

	$('.step1').siblings().hide(); // hide all except step 1

	$(".date-input").each(function() {
		var theDateField = $(this);
		theDateField.on('keyup', function() {
			if (theDateField.val().length == theDateField[0].maxLength) {
				if (theDateField.val().length == 4) {
					theDateField.blur();
				} else {
					theDateField.next('.date-input').focus();
				}
			}
		});
	});

	$("#zip-code").on("blur", function() {
		get_insee($(this).val());
	});

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

	$('#continue-btn').click(function(){

		var validFields = [];

		$(".step1").find("input, select").not("[type=hidden]").each(function() {		
			$(this).parsley('validate');
			if (!$(this).parsley('isValid')) {
				validFields.push(false);
			} else {
				validFields.push(true);
			}

		});

		if (!animalChosen) {
			$("#erreur-animal").fadeIn(300);
		}

		if (validFields.indexOf(false) == -1 && animalChosen) {
			$(this).closest('.step').hide(0).next('.step').show(0);
			$("html, body").animate({ scrollTop: 0 }, "fast");
			validFields = [];
		}

		if ($("#zip-code").val().length == 5) {

			get_insee($("#zip-code").val());
		}
	});

	$('#back-btn').click(function(){
		$(this).closest('.step').hide(0).prev('.step').show(0);
		$("html, body").animate({ scrollTop: 0 }, "fast");
		return false;
	});

	theForm.parsley({
		trigger: 'blur',
		successClass: 'success',
		errorClass: 'error',
		errors: {
			classHandler: function(elem,isRadioOrCheckbox) {
				return $(elem).parents(".control-group");
			},
			errorsWrapper: '<div></div>',
			errorElem: '<p class="help-block"></p>'
		}
	});

	theForm.on("submit", function() {
		$.cookie('form', $(this).formParams());
	});

	if (theFormCookie) {
		theForm.formParams(theFormCookie);

		if (animalRefill.val()) {
			$(".animal-holder."+animalRefill.val()).click();
		}
	}

	$('#twitter').sharrre({
		share: {
			twitter: true
		},
		enableHover: false,
		enableTracking: true,
		click: function(api, options){
			api.simulateClick();
			api.openPopup('twitter');
		}
	});
	$('#facebook').sharrre({
		share: {
			facebook: true
		},
		enableHover: false,
		enableTracking: true,
		click: function(api, options){
			api.simulateClick();
			api.openPopup('facebook');
		}
	});
	$('#googleplus').sharrre({
		share: {
			googlePlus: true
		},		
		enableHover: false,
		enableTracking: true,
		click: function(api, options){
			api.simulateClick();
			api.openPopup('googlePlus');
		}
	});

});
// <!--[if lte IE8]>
// 	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js"></script>

// 	<style>
// 		.chromeFrameInstallDefaultStyle {
// 		width: 100%; /* default is 800px */
// 		border: 5px solid blue;
// 		}
// 	</style>

// 	<div id="prompt">
// 		<p class="chromeframe">Vous utilisez un navigateur <strong>obsolète</strong>. Merci <a href="http://www.google.com/chromeframe/?redirect=true">d'activer Google Chrome Frame</a> pour le mettre à jour le plus facilement possible.</p>
// 	</div>

// 	<script>
// 		// The conditional ensures that this code will only execute in IE,
// 		// Therefore we can use the IE-specific attachEvent without worry
// 		window.attachEvent("onload", function() {
// 			CFInstall.check({
// 				mode: "overlay", // the default
// 				node: "prompt"
// 			});
// 		});
// 	</script>
// <![endif]-->