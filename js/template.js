// Fix index of array in <=IE8
if(!Array.prototype.indexOf) {
	Array.prototype.indexOf = function(needle) {
		for(var i = 0; i < this.length; i++) {
			if(this[i] === needle) {
				return i;
			}
		}
		return -1;
	};
}

function getInsee(zipCode, zipCodeId, inseeId) {
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
		}
	});
}

function scrollToTop() {
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

function strip(html) {
   var tmp = document.createElement("DIV");
   tmp.innerHTML = html;
   return tmp.textContent || tmp.innerText || "";
}

var theFormCookie = $.cookie('form'),
	theForm = $("form"),
	inseeHolder = $(".insee-holder");

$(document).ready(function() {

	$(".header-container").backstretch('img/header-1.jpg');

	$('.form-step1').siblings().hide(); // hide all except step 1

	$("#zip-code").on('blur', function() {
		getInsee($(this).val(), $(this).attr("id"), "insee");
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
			getInsee($("#zip-code").val());
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
				clickedButton.closest('.form-step').hide(0).next('.form-step').show(0, scrollToTop());
				validFields = [];
			}

		} else {
			clickedButton.closest('.form-step').hide(0).prev('.form-step').show(0, scrollToTop());
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
                    // event.preventDefault();

					$("button[type=submit]").prop("disabled", true);

                    // $.post('process.php', theForm.formParams(), function(data) {
                    //     console.log(data);
                    //     $($.parseHTML(data)).find("#misterassur_synthese .misterassur_synthese_produits_row").each(function() {
                    //         var formule = $(this).find(".misterassur_synthese_produits_col3").text(),
                    //             tarif = $(this).find(".misterassur_synthese_produits_prime1").text(),
                    //             resume = $(this).find(".misterassur_synthese_produits_col5").text(),
                    //             imgStyle = $(this).find(".misterassur_synthese_produits_logo").attr("style"),
                    //             imgUrl = imgStyle.match(/url\(([^\)]+)\)/)[1].replace('../', 'http://www.misterassur.com/');

                    //         $("#response-table tbody").append("<tr><td><img src="+imgUrl+"></td><td>"+formule+"</td><td>"+tarif+"</td><td>"+resume+"</td></tr>");
                    //     });

                    //     scrollToTop();
                    //     $("#response-table").addClass('shown');
                    // });

				}
			}
		}
	});

	theForm.on("submit", function() {
		$.cookie('form', $(this).formParams());
	});

	if (theFormCookie) {
		theForm.formParams(theFormCookie);
		if (theFormCookie.zip_code.length === 5) {
			getInsee(theFormCookie.zip_code, "zip-code", "insee");
		}
	}

});
