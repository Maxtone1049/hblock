$(document).ready(function () {

    if ($("select").length > 0) {
        $('select').selectric();
    }

    if ($('#gSignInBtn').length > 0) {

        let gClientId = $("#gClientId").val();

        function startApp() {
            gapi.load('auth2', function () {
                auth2 = gapi.auth2.init({
                    client_id: gClientId,
                    cookiepolicy: 'single_host_origin',
                    scope: 'profile email'
                });

                //sign out user from Google first
                signOut();
                attachSignin(document.getElementById('gSignInBtn'));
            });
        };

        function attachSignin(element) {
            auth2.attachClickHandler(element, {},
                function (profile) {
                    let returnUrl = $('input[name=returnUrl]').val();
                    if (returnUrl === "") {
                        returnUrl = "/dashboard"
                    }

                    $.post("/account/GOAuthLogin",
                        {
                            token: profile.getAuthResponse().id_token,
                            returnUrl: returnUrl
                        },

                        function (response) {
                            if (response.success === false) {
                                $.notify(response.message, "error");
                            }
                            else {
                                if (response.returnUrl !== null) {
                                    window.location.href = response.returnUrl;
                                }
                                else {
                                    window.location.href = "/dashboard";
                                }
                            }
                        });

                }, function (error) {
                    $.notify(JSON.stringify(error, undefined, 2), "error");
                });
        }

        function signOut() {            
            try {
                let auth2 = gapi.auth2.getAuthInstance();
                auth2.signOut().then(function () {
                });
            }
            catch(err) {
            }
        }

        startApp();
    }
});


$(document).ready(function () {

    //ref: https://developers.facebook.com/docs/facebook-login/web/
    if ($('#faceSignInBtn').length > 0) {

        let fbAppId = $("#fbAppId").val();

        document.getElementById('faceSignInBtn').addEventListener('click',
            function () {
                FB.login(statusChangeCallback, { scope: 'email,public_profile', return_scopes: true });
            }, { auth_type: 'reauthenticate' });


        function statusChangeCallback(response) {
            console.log(response);
            if (response.status === 'connected') {
                let returnUrl = $('input[name=returnUrl]').val();
                if (returnUrl === "") {
                    returnUrl = "/dashboard"
                }

                $.post("/account/FacebookOAuthLogin",
                    {
                        token: response.authResponse.accessToken,
                        returnUrl: returnUrl
                    },

                    function (response) {
                        if (response.success === false) {
                            $.notify("Failure logging in via Facebook. Try again or use another login method", "error");
                            FB.api('/me/permissions', 'delete');

                            FB.api('/me', 'get', { fields: 'first_name,last_name' }, function (response) {
                                //if this is sign up form, auto populate fields
                                if ($('.signUpForm').length > 0) {
                                    $('input[name=FirstName]').val(response.first_name);
                                    $('input[name=LastName]').val(response.last_name);
                                }
                            });
                        }
                        else {
                            if (response.returnUrl !== null) {
                                window.location.href = response.returnUrl;
                            }
                            else {
                                window.location.href = "/dashboard";
                            }
                        }
                    });

            } else {
                $.notify("Failure logging in via Facebook. Try again or use another login method", "error");
                FB.api('/me/permissions', 'delete');
            }
        }


        window.fbAsyncInit = function () {
            FB.init({
                appId: fbAppId,
                cookie: true,
                xfbml: true,
                version: 'v3.2'
            });
        };

        // Load the SDK asynchronously
        (function (d, s, id) {
            let js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    }
});

$(document).ready(function() {
    $("button.btnAccount").on("click", async function (e) {

        e.preventDefault();
        let btn = this;
        window.disableBtn(btn);
        window.trimFormValues();

        let url = $(this).attr("url");
        let data = $('#accountForm').serialize();
        data = data + "&GoogleReCaptchaResponse=" + await window.getCaptchaValue();

        $.post(url, data)
            .done(function (response) {
                if (response.success === false) {
                    if (response.errors === null || response.errors === undefined) {
                        $.notify(response.message, "error");
                    }
                    else {
                        $.each(response.errors, function (index, element) {
                            $.notify(element.field + ": " + element.message, "error");
                        })
                    }
                }
                else {
                    if (response.returnUrl !== null) {
                        window.location.href = response.returnUrl;
                    }
                    else {
                        $.notify(response.message, "error");
                        $(":input:not([type=hidden])").val('');
                    }
                }

                window.enableBtn(btn);
            })
            .fail(function() {
                $.notify("Error submitting form. Please reload the page and try again.", "error");
                window.enableBtn(btn);
            })
    });
})