$(document).ready(function() {
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

	$('.step1').siblings().hide(); // hide all except step 1

	$('#continue-btn').click(function(){

		var petBday = $('#pet-birthday'), petName = $('#pet-name'), animalPicked = false;

		petBday.parsley('validate');
		petName.parsley('validate');

		$(".animal-holder").each(function() {
			if ($(this).hasClass("highlight")) {
				animalPicked = true;
			}
		});

		if (!animalPicked) {
			$(".animal-picker").addClass("text-error").text("Merci de choisir un type d'animal !");
		}

		if (petBday.parsley('isValid') && petName.parsley('isValid') && animalPicked) {
			$(this).closest('.step').hide(300).next('.step').show(300);
		}
		return false;
	});

	$('#back-btn').click(function(){
		$(this).closest('.step').hide(300).prev('.step').show(300);
		return false;
	})

	$(".animal-holder").on("click", function() {

		$this = $(this),
		$breedSelector = $("#breed-selector");
		$gif = $("#loading-gif");

		$(".animal-picker").removeClass("text-warning");
		
		$this.addClass('highlight');
		$(".animal-holder").not(this).removeClass('highlight');

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
});