$(document).ready(function() {

	var validFields, animalChosen = false;
	$('.step1').siblings().hide(); // hide all except step 1

	$(".date-input").each(function() {
		var theId = $(this).attr("id");

		if (Modernizr.touch && Modernizr.inputtypes.date) {
	        document.getElementById(theId).type = 'date';
	    } else {
	        $("#"+theId).datepicker({ dateFormat: 'dd/mm/yy' });
	    }
	});

	$(".animal-holder").on("click", function() {

		animalChosen = true;
		if($("#erreur-animal").is(":visible")) {
			$("#erreur-animal").fadeOut(300);
		}

		var $this = $(this),
			$breedSelector = $("#breed-selector"),
			$gif = $("#loading-gif");
		
		$this.toggleClass('highlight');
		$(".animal-holder").not(this).removeClass('highlight');

		if ($(".animal-holder.highlight").length>0) {
			$("#nac-selector").hide();
		} else {
			$("#nac-selector").show();
		}

		if ($this.hasClass("chien")) {
			$gif.show(300);
			$breedSelector.load("breed-selector.html #chiens", function() {
				$gif.hide(300);
			});
		} else {
			$gif.show(300);
			$breedSelector.load("breed-selector.html #chats", function() {
				$gif.hide(300);
			});

		}
	});

	$("#nac-selector").on("change", function() {

		animalChosen = true;
		if($("#erreur-animal").is(":visible")) {
			$("#erreur-animal").fadeOut(300);
		}

		var selectedOption = $(this).find("option:selected");

		$(".animal-holder").removeClass('highlight');

		if (selectedOption.val() == 5) {
			$("#loading-gif").show(300);
			$("#breed-selector").load("breed-selector.html #perroquets", function() {
				$("#loading-gif").hide(300);
			});
		}
	});

	$('#continue-btn').click(function(){

		$(".step1").find("input[type=text]").each(function() {		
			$(this).parsley('validate');
			if (!$(this).parsley('isValid')) {
				validFields = false;
			} else {
				validFields = true;
			}
		});

		if (!animalChosen) {
			$("#erreur-animal").fadeIn(300);
		}

		if (validFields && animalChosen) {
			$(this).closest('.step').hide(300).next('.step').show(300);
		}
	});

	$('#back-btn').click(function(){
		$(this).closest('.step').hide(300).prev('.step').show(300);
		return false;
	});

	$("form").parsley({
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

});