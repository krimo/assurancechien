$(document).ready(function() {
	$("form").parsley({
		trigger: 'keyup',
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
		$(this).closest('.step').hide(300).next('.step').show(300);
		return false;
	});

	$('#back-btn').click(function(){
		$(this).closest('.step').hide(300).prev('.step').show(300);
		return false;
	})

	$(".img-radio").on("click", function() {

		$this = $(this),
		$breedSelector = $("#breed-selector");
		$gif = $("#loading-gif");

		$this.addClass('well').siblings('.img-radio').removeClass('well');

		if ($this.attr('data-select') === "chien") {
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