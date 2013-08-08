function get_insee(zipCode, zipCodeId, inseeId) {
    $.ajax({
        url: 'curl_misterassur.php',
        type: 'POST',
        cache: false,
        data: "service=insee&zip_code="+zipCode,
        success: function (data) {

            var optionArray = [],
                theJsonData = $.parseJSON(data).item,
                key,
                count = 0;

            for (key in theJsonData) {
                if(theJsonData.hasOwnProperty(key)) {
                    count++;
                }
            }

            if ($.isEmptyObject(theJsonData)) {
                $("#"+zipCodeId+", #"+inseeId).parents(".control-group").removeClass("success").addClass("error");
                optionArray.push('<option value="">Code postal erroné</option>');
            } else {

                if (count > 2) {
                    $.each(theJsonData, function(k,v) {
                        optionArray.push("<option value="+v.insee+">"+v.ville+"</option>");
                    });
                } else {
                    optionArray.push("<option value="+theJsonData.insee+">"+theJsonData.ville+"</option>");
                }

            }
            $("#"+inseeId).html(optionArray.join(" "));
            $(".insee-holder").css("opacity", 1);
        },
        error: function (d, r, obj) {
            console.log(d);
        }
    });
}

function scroll_to_top() {
	$("html, body").animate({ scrollTop: 0 }, "fast");
}

function formatDateString(theDate) {
	var arr = theDate.split("/"),
		d = arr[0],
		m = arr[1]-1,
		y = arr[2];

	return new Date(y,m,d);
}

function daysDiff(d1,d2) {
	if (d1 < d2) {
		return (d2-d1)/(1000*60*60*24);
	} else {
		return (d1-d2)/(1000*60*60*24);
	}
}

var theFormCookie = $.cookie('form'),
	theForm = $("form"),
	inseeHolder = $(".insee-holder");

$(document).ready(function() {

    $(".header-container").backstretch('img/header-1.jpg');

	$('.form-step1').siblings().hide(); // hide all except step 1

	$("#zip-code").on('blur', function() {
        get_insee($(this).val(), $(this).attr("id"), "insee");
	});

	$(".date-input").each(function() {
		var theDateField = $(this);
		theDateField.on({
			keyup: function() {
				if (theDateField.val().length == theDateField[0].size) {
					if (theDateField.val().length == 4) {
						theDateField.blur();
					} else {
						theDateField.next('.date-input').focus();
					}
				}
			}
		});
	});

	$(".datemask").mask("99/99/9999");

	$("input[name=pbday]").attr("data-threemonths", $("input[name=csd]").val());

	$("button[class$=-btn]").click(function(){

		var validFields = [],
			currentFieldset = $(this).parent("fieldset"),
			clickedButton = $(this);

		if ($("#zip-code").val().length == 5 && $("#insee").val()) {
			get_insee($("#zip-code").val());
		}

		if (clickedButton.is($(".continue-btn"))) {

			currentFieldset.find("input:visible, select:visible").each(function(k,v) {
				$(this).parsley('validate');
				if ($(this).parsley('isValid') === true || $(this).parsley('isValid') === null) {
					validFields.push(true);
				} else {
					validFields.push(false);
				}

			});

			if ($(".animal-holder.highlight").length < 1) {
				validFields.push(false);
				$(".animal-holder.chien").addClass("bounce");
			} else {
				validFields.push(true);
			}

			if (validFields.indexOf(false) == -1) {
				clickedButton.closest('.form-step').hide(0).next('.form-step').show(0, scroll_to_top());
				validFields = [];
			}

		} else {
			clickedButton.closest('.form-step').hide(0).prev('.form-step').show(0, scroll_to_top());
		}
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
		},
		validators: {
			exactly: function(val, exactly) {
				return val.length === exactly;
			},
			threemonths: function(val, threemonths) {
				return daysDiff(formatDateString(val),formatDateString(threemonths)) > 93;
			},
			upperdate: function(val, upperdate) {
				var valDate = formatDateString(val),
					testDate = formatDateString(upperdate);

				return testDate > valDate;
			},
			lowerdate: function(val, lowerdate) {
				var valDate = formatDateString(val),
					testDate = formatDateString(lowerdate);

				return testDate < valDate;
			}
		},
		messages: {
			exactly: "%s chiffres à saisir !",
			upperdate: "Cette date doit être inférieure au %s",
			lowerdate: "Cette date doit être supérieure au %s",
			threemonths: "Votre animal doit avoir au moins 3 mois à compter de la date d'effet (%s)"
		},
		listeners: {
			onFormSubmit: function ( isFormValid, event, ParsleyForm ) {
				if (isFormValid) {
					$("button[type=submit]").prop("disabled", true);
				}
			},
			onFieldError: function (elem, constraints, ParsleyField) {
				console.log(elem);
			}
		}
	});

	theForm.on("submit", function() {
		$.cookie('form', $(this).formParams());
	});

	if (theFormCookie) {
		theForm.formParams(theFormCookie);
        if (theFormCookie.zip_code.length === 5) {
            get_insee(theFormCookie.zip_code, "zip-code", "insee");
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
