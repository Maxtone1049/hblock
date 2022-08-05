

$(document).ready(function () {

    var loadPreview = function (url, template) {
        var image = new Image();
        image.src = url;
        $(image).on("load", function () {
            //template.find(".imageCont img").replaceWith($(image));
            template.find(".imageCont img").attr("src", url);
            template.find(".imageContLoading").hide();
        });

        $(image).on("error", function () {
            //we are recursing, so control its pace!
            setTimeout(function () {
                loadPreview(url, template);
                console.clear();
            }, 3000);
        });
    }


    $('#addViaUrl').on('click', '#uploadFromUrl', function() {

        var btn = $(this);
        window.disableBtn(btn);

        btn.closest('#addViaUrl').find('.serverMessage').hide();

        $.post($(this).attr('url'), { photoUrl: $('#photoUrl').val(), listingRef: $(this).attr('data') })
            .done(function(response) {
                if (response.success === true) {
                    $.notify("Photo has been uploaded", "success");
                    $.each(response.files, function(key, value) {
                        var sr = $("#photoTemplate").html().replace(/{filename}/g, value);
                        var photoTemplate = $($.parseHTML(sr));
                        var refr = photoTemplate.prependTo($("div#photoContent")).fadeIn();

                        var url = "https://hutbay.blob.core.windows.net/listing-preview/" + value;
                        $('#photoUrl').val('')
                        loadPreview(url, refr);
                        parent.jQuery.fancybox.getInstance().close();
                    })
                    

                } else {
                    btn.closest('#addViaUrl').find('.serverMessage').text(response.message).show();
                    $.notify(response.message, "error");
                }

                window.enableBtn(btn);
            })
            .fail(function () {
                window.addErrorClass('.serverMessage');
                btn.closest('#addViaUrl').find('.serverMessage').text("Error uploading from URL. Check if URL is valid", "error").show();
                $.notify("Error uploading from URL. Check if URL is valid", "error");
                window.enableBtn(btn);
            });
    });



    if ($("#publish").length > 0) {
        $('#publish').on("change",
            function() {
                var self = $(this);
                var listingRef = self.attr("data");
                //self.closest('.photoBox2').find('.loading').show()

                $.post("/api/posts/publish", { ListingRef: listingRef, IsPublished: self.prop("checked") ? true : false },
                    function(response) {

                        if (response.success === true) {
                            $('#ModalSuccessMessage').text(response.message)
                            $('#ModalSuccess').modal('show');
                        } else {
                            $.notify(response.message, "warn");
                        }

                        //self.closest('.photoBox2').find('.loading').hide()
                    })
            });
    }
    
    

    let checkParent = $('.form-holder');
    checkParent.on("change", "#boost",
        function() {
            var self = $(this);
            var listingRef = self.attr("data");

            $.post("/api/dashboards/BoostListing", { id: listingRef},
                function(response) {

                    if (response.success === true) {
                        $('#ModalSuccessMessage').text(response.message)
                        $('#ModalSuccess').modal('show');
                        $("#boost").prop("checked", true);
                    } else {
                        $.notify(response.message, "error");
                        $("#boost").prop("checked", false);
                    }
             })
        });

    checkParent.on("change", "#featured",
        function() {
            var self = $(this);
            var listingRef = self.attr("data");

            $.post("/api/dashboards/FeatureListing", { id: listingRef},
                function(response) {

                    if (response.success === true) {
                        $('#ModalSuccessMessage').text(response.message)
                        $('#ModalSuccess').modal('show');
                        $("#featured").prop("checked", true);
                    } else {
                        $.notify(response.message, "error");
                        $("#featured").prop("checked", false);
                    }
                })
        });
        

    if ($(".delete-listing").length > 0) {
        $('.delete-listing').on("click change",
            function (e) {
                e.preventDefault();
                var self = $(this);
                var listingRef = self.attr("data");
                //self.closest('.photoBox2').find('.loading').show()

                $.post("/api/posts/delete",
                    { id: listingRef},
                    function (response) {
                        if (response.success === true) {
                            $.notify(response.message, "success");
                            setTimeout(function() {
                                window.location.href = "/dashboard";
                            }, 3000)

                        } else {
                            $.notify("Error deleting listing. Try later", "error");
                        }

                        //self.closest('.photoBox2').find('.loading').hide()
                    })
            });
    }


    $("#postListing .app-button").on("click",
        async function (e) {
            e.preventDefault();
            
            $('.gentleAlert').hide();
            $('.serverMessage').css({ "margin-bottom": "20px" });

            var btn = $(this);
            window.disableBtn(btn);

            $('.serverMessage').hide();
            $('.serverMessage').empty();
            window.removeErrorClass('.serverMessage');
            
            var url = $(this).attr("url");
            var nextAction = $(this).attr("nextAction");
            $(".dashLoader").show();

            var data = $('#postListing').serialize();
            data = data + "&GoogleReCaptchaResponse=" + await window.getCaptchaValue();

            $.post(url, data)
                .done(function (response) {
                    if (response.success === false) {
                        window.addErrorClass('.serverMessage');
                        window.jsValidate();
                        if (response.errors === null || response.errors === undefined) {
                            $('.serverMessage').show().html(response.message);
                        }
                        else {
                            $.each(response.errors, function (index, element) {
                                $('.serverMessage').append($('<span>', {
                                    text: element.message
                                }))
                            })
                            $('.serverMessage').show();
                        }
                        window.enableBtn(btn);
                        window.scrollTo('html', 10, false);
                    } else {
                        //disable AreYouSure event
                        $('form').areYouSure({ 'silent': true });
                        window.location.href = nextAction + "/" + response.message;
                    }

                })
                .fail(function () {
                    window.addErrorClass('.serverMessage');
                    $('.serverMessage').show().text("Error processing this request. Check your internet connection or reload the page to try again");
                    window.scrollTo('html', 10, false);
                    window.enableBtn(btn);
                });
        });

    $("#postRequest .app-button").on("click", async function (e) {
            e.preventDefault();

            $('.gentleAlert').hide();
            $('.serverMessage').css({ "margin-bottom": "20px" });

            var btn = $(this);
            window.disableBtn(btn);

            $('.serverMessage').hide();
            $('.serverMessage').empty();
            window.removeErrorClass('.serverMessage');

            var url = $(this).attr("url");
            var nextAction = $(this).attr("nextAction");
            $(".dashLoader").show();

            var data = $('#postRequest').serialize();
            data = data + "&GoogleReCaptchaResponse=" + await window.getCaptchaValue();

            $.post(url, data)
                .done(function (response) {
                    if (response.success === false) {
                        window.addErrorClass('.serverMessage');
                        window.jsValidate();
                        if (response.errors === null || response.errors === undefined) {
                            $('.serverMessage').show().text(response.message);
                            $.notify(response.message, "error");
                        }
                        else {
                            $.each(response.errors, function (index, element) {
                                $('.serverMessage').append($('<span>', {
                                    text: element.field + ": " + element.message
                                }))

                                $.notify(element.field + ": " + element.message, "error");
                            })
                            $('.serverMessage').show();
                        }
                        window.enableBtn(btn);
                        window.scrollTo('html', 10, false);
                    } else {
                        //disable AreYouSure event
                        $('form').areYouSure({ 'silent': true });
                        $.notify(response.message, "success");

                        setTimeout(function() {
                            location.reload();
                        }, 3000);

                        alert(response.message)
                    }

                })
                .fail(function () {
                    window.addErrorClass('.serverMessage');
                    $('.serverMessage').show().text("Error processing this request. Check your internet connection or reload the page to try again");
                    window.scrollTo('html', 10, false);
                    window.enableBtn(btn);
                });
        });


    if ($("div#dropzonePhoto").length > 0) {

        $().fancybox({
            selector: '#photoContent .imageCont img'
        });

        var dropZone = new Dropzone(".photo-dropzone",
            {
                url: "/api/posts/image",
                paramName: "files", // The name that will be used to transfer the file
                maxFilesize: 10, // MB
                addRemoveLinks: true,
                maxFiles: 60,
                parallelUploads: 1,
                acceptedFiles: 'image/*',
                createImageThumbnails: false,
                timeout: 2000000,
                maxfilesreached: function () {
                    alert("Maximum number of photos reached");
                },
                maxfilesexceeded: function (file) {
                    alert("Upload image that is not more than 10MB.")
                },
                success: function (file, response) {
                    if (response.success === false) {
                        window.addErrorClass('.serverMessage');
                        if (response.errors === null || response.errors === undefined) {
                            $('.serverMessage').show().text(response.message);
                        }
                        else {
                            $.each(response.errors, function (index, element) {
                                $('.serverMessage').append($('<span>', {
                                    text: element.message
                                }))
                            })
                            $('.serverMessage').show();
                        }
                    } else {
                        $.each(response.message, function (index, fileName) {
                            var sr = $("#photoTemplate").html().replace(/{filename}/g, fileName);
                            var photoTemplate = $($.parseHTML(sr));
                            var refr = photoTemplate.prependTo($("div#photoContent")).fadeIn();

                            var url = "https://hutbay.blob.core.windows.net/listing-preview/" + fileName;
                            loadPreview(url, refr);
                        });
                    }
                },
                uploadprogress: function (file, progress, bytesSent) {
                    $('#progress').show();
                    $('#progressBar').css('width', progress + '%');
                    $('#progressBar span').text(Math.round(progress * 100) / 100 + '%');
                },
                queuecomplete: function (file) {
                    $('.serverMessage').show().text("Photos successfuly uploaded");

                },
                addedfile: function (file) {

                },
                sending: function (file, xhr, formData) {
                    var listingRef = $('input[name=ListingRef]').val();
                    formData.append("ListingRef", listingRef);
                },
                complete: function(file) {
                    $('#progress').fadeOut();
                }
            });


        $("#photoContent").on("click", ".deletePhoto", function () {
            var self = $(this);
            var photoName = self.attr("data");
            self.closest('.photoBox2').find('.loading').show()
            var parent = $(this).parents('.photoBox');
            $.post("/api/posts/DeletePhoto?photoName=" + photoName, function (response) {
                $('.serverMessage').show().text(response.message);

                if (response.success === true) {
                    $(parent).fadeOut().remove();
                    $.notify("Photo has been deleted.", "success");
                } else {
                    $.notify("Error deleting photo", "warn");
                }

                self.closest('.photoBox2').find('.loading').hide()
            });
        })

        $('#photoContent').on('click', ".show", function () {
            $(this).closest('.photoBox2').find('.captionBox').fadeIn()
        })
        

        $('#photoContent').on('click', ".cancel", function () {
            $(this).closest('.photoBox2').find('.captionBox').fadeOut()
        })

        $('#photoContent').on('click', ".save", function () {
            var self = $(this);
            self.closest('.photoBox2').find('.loading').show()

            var file = self.attr("data");
            var caption = self.closest('.captionBox').find('textarea').val();

            $.post("/api/posts/UpdatePhotoCaption", { photoName: file, caption: caption}, function (response) {
                if (response.success === true) {
                    $('.serverMessage').show().text(response.message);
                    self.closest('.photoBox2').find('.captionBox').fadeOut()
                    $.notify("Caption saved!", "success");
                } else {
                    $('.serverMessage').show().text(response.message);
                    $.notify("Error saving caption.", "error");
                }

                self.closest('.photoBox2').find('.loading').hide()
            });
        })

        
    }
    
    
//The Text edito
    if ($("#editor").length > 0) {
        CKEDITOR.replace('editor', {height: 300});
        CKEDITOR.on('instanceReady', function (event) {
            event.editor.on("change", function () {
                $("#editor").html(event.editor.getData());
                $('form').trigger('checkform.areYouSure');
            });

            $("#isLoading").hide();
        });

        $('#editor').show();
    }
});
