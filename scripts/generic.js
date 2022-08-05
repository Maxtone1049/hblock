$(document).ready(function() {

    $('#body').show();
    $('#loading').hide();

    // get current URL path and assign 'active' class
    let pathname = window.location.pathname.toLocaleLowerCase();
    $('nav li > a[href="' + pathname + '"]').parent().addClass('active');

    window.trimFormValues = function() {
        $('form input, form textarea').each(function() {
            this.value = $.trim($(this).val());
        });
    }
    ;

    window.regenerateRecaptcha = async()=>{
        const key = $('meta[name=captchaKey]').attr('content');
        let value = $("meta[name='reCaptcha']");

        let action = $("#ReCaptchaActionName").val();
        if (action === undefined || action === '') {
            action = 'action'
        }

        try {
            await grecaptcha.execute(key, {
                action: action
            }).then(function(token) {
                value.attr('content', token);
            });
        } catch (error) {
            $.notify("It seems your internet connection is lost. Try again.", "error")

            $("button .fa-spinner").css("display", "none");
            $("button").prop("disabled", false);
        }

        return value.attr('content');
    }

    window.getCaptchaValue = async()=>{
        return await window.regenerateRecaptcha();
    }

    window.removeCommaFromInputs = function() {
        $('form input.csv').each(function() {
            this.value = $(this).val().replace(/,/g, "");
        });
    }
    ;

    window.formatNumbersToCsv = function() {
        $('.digits').on('input', function() {
            let temp = $(this).val().replace(/,/g, '');
            if (isNaN(temp))
                return false;

            $(this).val(Number(temp).toLocaleString('en'));
        });
    }
    ;

    window.resetNumbersToCsv = function() {
        $('.digits').each(function() {
            let temp = $(this).val().replace(/,/g, '');
            if (isNaN(temp))
                return false;

            $(this).val(Number(temp).toLocaleString('en'));
        });
    }
    ;

    //remove Zeros from Textfield where int-based models outputted zero
    window.removeZeroValuedTextInput = function() {
        $('form input').each(function() {
            let temp = $(this).val();
            if (temp === '0' | temp === 0)
                $(this).val('');
        });
    }
    ;

    window.enableBtn = function(btn) {
        $(btn).find('.fa-spinner').css('display', 'none');
        $(btn).prop('disabled', false);
    }
    ;

    window.disableBtn = function(btn) {
        $(btn).find('.fa-spinner').css('display', 'inline-block');
        $(btn).prop('disabled', true);
    }
    ;

    //ref:https://stackoverflow.com/questions/30287531/input-number-validation-restrict-to-enter-only-numbers-or-digits-int-float
    window.allowOnlyNumeric = function() {
        $(".numeric").keydown(function(e) {
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || (e.keiCode === 65 && e.ctrlKey === true) || (e.keyCode >= 35 && e.keyCode <= 39)) {
                return;
            }

            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });

        $('.intFloat').keyup(function(e) {
            if (this.value !== '-')
                while (isNaN(this.value))
                    this.value = this.value.split('').reverse().join('').replace(/[\D]/i, '').split('').reverse().join('');
        }).on("cut copy paste", function(e) {
            e.preventDefault();
        });
    }
    ;

    window.allowOnlyAlphaNumeric = function() {
        $('.alphanumeric').keydown(function(e) {
            let regex = new RegExp("^[a-zA-Z0-9]+$");
            let str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(str)) {
                return true;
            }

            e.preventDefault();
            return false;
        });
    }

    window.disableBoostBtn = function() {
        var btn = $("#boostAlert .boostBtn");
        var btnText = $(".payForBoost span");
        btnText.text("Processing...");

        $(btn).prop('disabled', true);
        $('.fa-spinner', btn).css('display', 'inline-block');
    }

    window.enableBoostBtn = function(label) {
        var btn = $("#boostAlert .boostBtn");
        var btnText = $(".payForBoost span");
        btnText.text(label);

        $(btn).prop('disabled', false);
        $('.fa-spinner', btn).css('display', 'none');
    }

    if ($('form').length > 0) {
        window.removeZeroValuedTextInput();
        window.allowOnlyNumeric();
        window.resetNumbersToCsv();
        window.formatNumbersToCsv();

        $('form').on('submit', function() {
            window.removeCommaFromInputs();
            window.trimFormValues();
        })
    }

    window.emptyFormValues = function() {
        $("form input[type=text], form input[type=password], form textarea").each(function() {
            this.value = '';
        });

        $('select').val('');
    }
    ;

    window.getCurrentDate = function() {
        let today = new Date();
        let dd = today.getDate();
        let mm = today.getMonth() + 1;
        let yyyy = today.getFullYear();

        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }

        today = mm + '/' + dd + '/' + yyyy;
        return today;
    }
    ;

    window.addErrorClass = function(className) {
        $(className).css({
            backgroundColor: "#FFEBE8",
            borderColor: "#DD3C10"
        });
    }
    ;

    window.removeErrorClass = function(className) {
        $(className).css({
            backgroundColor: "",
            borderColor: ""
        });
    }
    ;

    window.scrollToElement = function(targetId) {
        scrollTo(target, 30, true);
        return false;
    }
    ;

    //target ---- add # to the ID
    window.scrollTo = function(target, topOffset, updateLocatn) {
        let topoffset = topOffset;
        let speed = 800;
        let destination = $(target).offset().top - topoffset;
        jQuery('html:not(:animated),body:not(:animated)').animate({
            scrollTop: destination
        }, speed, function() {
            if (updateLocatn)
                window.location.hash = target;
        });
        return false;
    }
    ;

    window.jsValidate = function() {
        $('input, select').each(function() {
            let self = $(this);
            let error = $(this).attr("data-val");
            if (error !== undefined) {//if (error === "true" & self.val() === "") {
            //    self.css({ borderColor: "#DD3C10", borderWidth: "2px" });
            //}
            }
        });
    }
    ;

    if ($('form').length > 0) {
        $('form.areYouSure').areYouSure({
            message: 'It looks like you have been editing something. ' + 'If you leave before saving, your changes will be lost.'
        });
    }
});

$(document).ready(function() {

    if ($("form.selectpicker").length > 0) {
        $('select').selectpicker({
            noneSelectedText: '-- select --'
        });
    }

    if ($(".noticeAlert").length > 0) {
        $('.noticeAlert a').on('click', function() {
            $('.noticeAlert').fadeOut()
        })
    }

    if ($(".datepicker-here").length > 0) {
        $('.datepicker-here').datepicker({
            language: 'en',
            minDate: new Date(),
            dateFormat: 'dd-mm-yyyy'
        })
    }

    if ($('#searchbox').length > 0) {
        $('.search-location').autocomplete({
            paramName: 'id',
            minChars: 2,
            serviceUrl: '/api/datas/searchLocation',
            onSelect: function(suggestion) {
                $('input[name="query"]').val(suggestion.value);
                //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
            },
            transformResult: function(response) {
                response = JSON.parse(response);
                return {
                    suggestions: $.map(response, function(item) {
                        return {
                            value: item.cityName,
                            data: item.cityId,
                            id: item.cityId
                        };

                    })
                };
            }
        })
    }

    if ($('.saveListing').length > 0) {
        $('.saveListing').on('click', function(e) {

            let btn = $(this);
            e.preventDefault();

            let ref = btn.attr("hut-ref");
            let url = btn.attr("url");

            $.post(url, {
                id: ref
            }, function(response) {
                if (response.success === false) {
                    btn.removeClass('activeBtn');
                    $.notify(response.message, "error");
                } else {
                    btn.addClass('activeBtn');
                    $.notify(response.message, "success");
                }
            });
        })
    }

    if ($('.getPhoneNo').length > 0) {
        $('.getPhoneNo').on('click', function(e) {

            let btn = $(this);
            e.preventDefault();

            let ref = btn.attr("hut-ref");
            let url = "/api/datas/getPhoneNo";

            $.post(url, {
                id: ref
            }, function(response) {
                if (response.success === false) {
                    btn.removeClass('activeBtn');
                } else {
                    btn.addClass('activeBtn');
                }
            });

        })
    }

    if ($('#StateId').length > 0) {
        $("#StateId").on("change", function() {
            let temp = $(this);

            let cityId = $('#CityId');

            if (temp.val() > 0) {
                cityId.empty();
                cityId.append("<option value='-1'>loading cities...</option>");
                $('#CityId').selectpicker('refresh');

                $.getJSON("/api/datas/cities", {
                    stateId: temp.val()
                }, function(cities) {
                    cityId.empty();

                    $.each(cities, function(i, city) {
                        cityId.append("<option value =" + city.id + ">" + city.name + "</option>");
                    });
                    if (cities === null) {
                        cityId.empty();
                    }

                    if ($(".selectpicker").length > 0) {
                        $('#CityId').selectpicker('refresh');
                    }
                });
            } else {
                cityId.empty();
            }
        });
    }

    if ($('#CountryId').length > 0) {
        $("#CountryId").on("change", function() {
            let temp = $(this);

            if (temp.val() > 0) {
                let stateId = $('#StateId');
                stateId.empty();
                stateId.append("<option value='-1'>loading states...</option>");
                $('#StateId').selectpicker('refresh');

                $.getJSON("/api/datas/states", {
                    countryId: temp.val()
                }, function(states) {
                    stateId.empty();
                    //stateId.append("<option value ='-1'>-- select city --</option>");

                    $.each(states, function(i, state) {
                        stateId.append("<option value =" + state.id + ">" + state.name + "</option>");
                    });
                    if (cities === null) {
                        stateId.empty();
                    }

                    if ($(".selectpicker").length > 0) {
                        $('#StateId').selectpicker('refresh');
                    }

                });
            } else {
                stateId.empty();
            }
        });
    }
});

$(document).ready(function() {
    if (jQuery().tooltip) {
        $('[data-toggle="tooltip"]').tooltip();
    }
})

window.submitFormWithRecaptcha = async function(form, url, btn) {

    window.disableBtn(btn);

    let data = form.serialize();
    data = data + "&GoogleReCaptchaResponse=" + await window.getCaptchaValue();

    $.post(url, data).done(function(response) {
        if (response.success === false) {
            if (response.errors === null || response.errors === undefined) {
                $.notify(response.message, "error");
            } else {
                $.each(response.errors, function(index, element) {
                    $.notify(element.field + ": " + element.message, "error");
                })
            }
        } else {
            //disable AreYouSure event
            $('form').areYouSure({
                'silent': true
            });
            $.notify(response.message, "success");
            form[0].reset();
        }

        window.enableBtn(btn);
    }).fail(function() {
        $.notify("Error sending this request. Check your internet connection or reload the page to try again", "error");
        window.enableBtn(btn);
    });
}

$(document).ready(function() {
    if ($('.dynamicForm').length > 0) {

        $("form.dynamicForm .app-button").on("click", async function(e) {
            e.preventDefault();

            let btn = $(this);
            window.disableBtn(btn);
            let url = btn.attr("url");

            let thisForm = btn.parents('form:first');
            await submitFormWithRecaptcha(thisForm, url, btn);
        });
    }
})
