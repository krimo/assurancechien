$(document).ready(function() {

	var validFields, animalChosen = false;
	$('.step1').siblings().hide(); // hide all except step 1

	$(".date-input").each(function() {
		var theDateField = $(this);
		theDateField.on('keyup', function() {
			if (theDateField.val().length == theDateField[0].maxLength && theDateField.parsley('isValid')) {
				theDateField.next('.date-input').focus();
			}
		});
	});

	$("#zip-code").on("blur", function() {

		var codePostal = $(this).val();

		$.ajax({
			url: 'liste-insee.php',
			type: 'POST',
			data: "cp="+codePostal,
			success: function (data) {
				d = eval(data);
				$("#insee").html("<option value="+d[0]+">"+d[1]+"</option>");
			},
			error: function (d, r, obj) {
				console.log(r);
			}
		});
		
	});

	$(".animal-holder").on({
		click: function() {
			animalChosen = true;

			if($("#erreur-animal").is(":visible")) {
				$("#erreur-animal").fadeOut(300);
			}

			var $this = $(this), $breedSelector = $("#breed-selector");
			
			$this.toggleClass('highlight');
			$(".animal-holder").not(this).removeClass('highlight');

			if ($this.hasClass("chien")) {
				$breedSelector.load("breed-selector.html #chiens");
			} else if ($this.hasClass("chat")) {
				$breedSelector.load("breed-selector.html #chats");
			} else if ($this.hasClass("nac")) {
				$breedSelector.load("breed-selector.html #nacs");
			}
		},
		mouseenter: function(){
			$(this).addClass("bouncy-castle");
		},
		mouseleave: function() {
			$(this).removeClass("bouncy-castle");
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

	(function(d, s) {
		var js, fjs = d.getElementsByTagName(s)[0], load = function(url, id) {
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.src = url; js.id = id;
			fjs.parentNode.insertBefore(js, fjs);
		};
		load('//connect.facebook.net/fr_FR/all.js#xfbml=1', 'fbjssdk');
		load('https://apis.google.com/js/plusone.js', 'gplus1js');
		load('//platform.twitter.com/widgets.js', 'tweetjs');
	}(document, 'script'));

});