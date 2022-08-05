
$(document).ready(function () {

    if ($('#HighChart').length > 0) {
        var ctx = $('#chart');
        var chartObject = new Chart(ctx);
        var month_names_short = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']

        var dimension = [];
        var metrics = [];
        var min = 0;
        var max = 1; 

        function populateChart(start, end, paramsCsv) {

            var overlayBg = $("#contently");
            overlayBg.LoadingOverlay("show", {
                image       : "",
                custom      : loadingCss,
                backgroundClass: "overlayLoadingBg"
            });
            
            dimension = [];
            metrics = [];

            $.ajax({
                type: "POST",
                url: "/api/analytics/GetViewsStat",
                data: {
                    start: start,
                    end: end,
                    id: paramsCsv
                },
                dataType: 'json',
                success: function (response) {

                    if (response.reports !== null) {
                        var report = response.reports[0];

                        if (report.data.rows !== null) {
                            min = report.data.minimums[0].values;
                            max = report.data.maximums[0].values;

                            var total = 0;

                            for (var j = 0; j < report.data.rows.length; j++) {
                                var row = report.data.rows[j];

                                dimension.push(row.dimensions[0]);

                                var mValue = row.metrics[0].values[0];
                                metrics.push(mValue)

                                total = total + parseInt(mValue)
                            }

                            $("span#total").html(" | " + total.toLocaleString() + " Visits")

                        } else {
                            $("span#total").html("")
                        }
                    }

                    execChart(start, end);

                    $("tbody").empty()
                    for (var i = 0; i < dimension.length; i++) {
                        var entry = moment(dimension[i], 'YYYYMMDD')
                        var s = "<tr scope='row'><td>" + entry.format('MMM D, YYYY') + "</td>";
                        s = s + "<td>" + metrics[i] + "</td></tr>";
                        $("tbody").append(s)
                    }
                },
                complete: function () {
                    overlayBg.LoadingOverlay("hide");
                },
                error: function (xhr, status, error) {
                    console.log(error)
                    return undefined;
                }
            });
        }

        function execChart(start, end) {
            var startDate = moment(start);
            ;
            var endDate = moment(end);

            var dateRange = [];

            //get the date range
            for (var d = startDate; d <= endDate; d.add(1, 'days')) {
                var _tDate = d.format("YYYYMMDD");
                dateRange.push(_tDate);
            }

            //initialize and give default value
            var newMetric = Array(dateRange.length).fill(0);

            if (dimension.length > 0) {
                for (var i = 0; i <= dateRange.length; i++) {

                    var check = (dimension).indexOf(dateRange[i]);
                    if (check !== -1) {
                        var th = metrics[check]
                        if (th !== undefined) {
                            newMetric[i] = parseInt(metrics[check]);
                        } else {
                            console.log(check);
                        }
                    }
                }
            }

            var formatDate = [];
            dateRange.forEach(function (entry) {
                formatDate.push(month_names_short[parseInt(entry.substr(4, 2) - 1)] + " " + parseInt(entry.substr(6, 2)))
            });

            chartObject.destroy();
            chartObject = new Chart(ctx, {
                // The type of chart we want to create
                type: 'line',

                // The data for our dataset
                data: {
                    labels: formatDate,
                    datasets: [
                        {
                            label: 'No of Visits',
                            backgroundColor: '#a8e3b0',
                            borderColor: '#0088cc',
                            data: newMetric
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        xAxes: [{
                            ticks: {
                                source: 'auto'
                            },
                            gridLines: {
                                display: false
                            },
                            distribution: 'linear'
                        }],
                        yAxes: [{
                            ticks: {
                                min: parseInt(min),
                                max: parseInt(max),
                                beginAtZero: true,
                            }
                        }]
                    }
                }
            });

        }

        if ($("#dateRange").length > 0) {

            var self = $('#dateRange')
            var startDate = $('#start').val();
            var _start = moment(startDate);

            var endDate = $('#end').val();
            var _end = moment(endDate);

            var params = $("#paramsCsv").val();

            populateChart(startDate, endDate, params);

            self.daterangepicker({
                startDate: _start,
                endDate: _end,
                showDropdowns: true,
                minDate: "01/01/2015",
                maxYear: moment().year(),

                ranges: {
                    'Past 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Past 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Past Month': [
                        moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')
                    ],
                    'This Year': [moment().startOf('year'), moment().endOf('year')]
                },
                "showCustomRangeLabel": false,
                "alwaysShowCalendars": true,
                "applyClass": "btn-success",
                "cancelClass": "btn-light",
                "opens": "left"
            }, function cb(start, end, label) {

                startDate = start.format("YYYY-MM-DD");
                endDate = end.format("YYYY-MM-DD");

                self.find('span').html(start.format('MMM D, YYYY') + ' &nbsp;-&nbsp; ' + end.format('MMM D, YYYY'));

                //update the start and end date values
                $('#start').val(start.format('YYYY-MM-DD'));
                $('#end').val(end.format('YYYY-MM-DD'));
            });


            self.on('apply.daterangepicker', function (ev, picker) {
                populateChart(startDate, endDate, params);
            });
        }
    }
})


$('#modalContent').on('click', '.boostNowBtn', function (e) {

    let self = $(this)
    let url = self.attr("url");
    let data = self.attr("data")

    let json = {id: data}

    $.post(url, json)
        .done(function (response) {
            disableBoostBtn();
            if (response.success === false) {
                if (response.errors === null || response.errors === undefined) {
                    $.notify(response.message, "error");
                } else {
                    $.each(response.errors, function (index, element) {
                        $.notify(element.field + ": " + element.message, "error");
                    })
                } 

                $('#boostAlert').modal('hide');

            } else {
                //dismiss the modal
                $('#boostAlert').modal('hide');

                //show the success
                $.notify(response.message, "success");

                $('#ModalSuccessMessage').text(response.message)
                $('#ModalSuccess').modal('show');
            }
        })
        .fail(function () {
            $.notify("Error processing this request. Check your internet connection or reload the page to try again", "error");
            enableBoostBtn("Boost Now")
        });
})


$(document).ready(function () {

    let blogRss = function () {
        $('#blogRss .loader').show();
        $.get("/api/feeds/_PartialBlogFeed", {id: 2}, function (data) {
            if (data != null) {
                $('#blogRss .blogRss').html(data);
                $('#blogRss .loader').hide();
            }
        })
    }

    let forumRss = function () {
        $('#forumRss .loader').show();
        $.get("/api/feeds/_PartialHelpFeed", {id: 2}, function (data) {
            if (data !== undefined) {
                $('#forumRss .forumRss').html(data);
                $('#forumRss .loader').hide();
            }
        })
    };

    if ($("#blogRss").length > 0) {
        blogRss();
    }

    if ($("#forumRss").length > 0) {
        forumRss();
    }


    if ($(".upload-profile-img").length > 0) {

        $(".delete-profile-img").on('click', function (e) {
            e.preventDefault();
            let url = $('.profile-img-one').attr('src');
            let photoName = url.substring(url.lastIndexOf('/') + 1);

            $.post("/api/dashboards/deletePhoto", {photoName: photoName, type: 'profile-photo'},
                function (response) {

                    if (response.success === true) {
                        $.notify(response.message, "success");
                        $('.profile-img-one, .profilePhoto').attr('src', '/images/user-200.jpg')
                    } else {
                        $.notify("Error deleting photo", "warn");
                    }
                })
        })

        $(".delete-logo-img").on('click', function (e) {
            e.preventDefault();
            let url = $('.logo-img-one').attr('src');
            let photoName = url.substring(url.lastIndexOf('/') + 1);

            $.post("/api/dashboards/deletePhoto", {photoName: photoName, type: 'company-logo'},
                function (response) {

                    if (response.success === true) {
                        $.notify(response.message, "success");
                        $('.logo-img-one').attr('src', '/images/generic-default-100.jpg')
                    } else {
                        $.notify("Error deleting photo", "warn");
                    }
                })
        })

        let loadImage = function (selectString, url) {
            let image = new Image();
            image.src = url;

            $(image).on("load", function () {
                $(selectString).attr("src", url);
                $.notify("photo has been updated", "success");
            });

            $(image).on("error", function () {
                //we are recursing, so control its pace!
                setTimeout(function () {
                    loadImage(selectString, url);
                    console.clear();
                }, 3000);
            });
        }


        let dropZone = new Dropzone(".upload-profile-img",
            {
                url: "/api/dashboards/UploadPhoto",
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 10, // MB
                parallelUploads: 1,
                acceptedFiles: 'image/*',
                createImageThumbnails: false,
                timeout: 2000000,
                maxfilesexceeded: function (file) {
                    alert("Upload image that is NOT more than 10MB.")
                },
                success: function (file, response) {
                    if (response.success === false) {
                        if (response.errors === null || response.errors === undefined) {
                            $.notify(response.message, "success");
                        } else {
                            $.each(response.errors, function (index, element) {
                                $.notify(element.field + ": " + element.message, "error");
                            })
                        }
                    } else {
                        loadImage(".profile-img-one, .profilePhoto", response.message)
                    }
                },
                uploadprogress: function (file, progress, bytesSent) {
                    $('.upload-profile-img i').css('display', 'inline-block');
                },
                queuecomplete: function (file) {
                    $.notify("Photo upload successful", "success");
                },
                sending: function (file, xhr, formData) {
                    let type = "profile-photo";
                    formData.append("type", type);
                },
                complete: function (file) {
                    $('.upload-profile-img i').hide();
                },
                addedfile: function (file) {
                    //https://github.com/enyo/dropzone/issues/175#issuecomment-176653890
                }
            });


        //Logo Upload
        let dropZone2 = new Dropzone(".upload-logo-img",
            {
                url: "/api/dashboards/UploadPhoto",
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 10, // MB
                parallelUploads: 1,
                acceptedFiles: 'image/*',
                createImageThumbnails: false,
                timeout: 2000000,
                maxfilesexceeded: function (file) {
                    alert("Upload image that is NOT more than 10MB.")
                },
                success: function (file, response) {
                    if (response.success === false) {
                        if (response.errors === null || response.errors === undefined) {
                            $.notify(response.message, "success");
                        } else {
                            $.each(response.errors, function (index, element) {
                                $.notify(element.field + ": " + element.message, "error");
                            })
                        }
                    } else {
                        loadImage(".logo-img-one", response.message)
                    }
                },
                uploadprogress: function (file, progress, bytesSent) {
                    $('.upload-logo-img i').css('display', 'inline-block');
                },
                queuecomplete: function (file) {
                    $.notify("Company logo upload successful", "success");
                },
                sending: function (file, xhr, formData) {
                    let type = "company-logo";
                    formData.append("type", type);
                },
                complete: function (file) {
                    $('.upload-logo-img i').hide();
                },
                addedfile: function (file) {
                    //https://github.com/enyo/dropzone/issues/175#issuecomment-176653890
                }
            });
    }


    if ($('.uploadWebsiteMedia').length > 0) {

        Dropzone.autoDiscover = false;

        $('.uploadWebsiteMedia').each(function () {
            let btn;
            let thumbImg;
            let type = $(this).attr('data');

            $(this).dropzone({

                url: "/api/dashboards/UploadWebsitePhoto",
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 10, // MB
                parallelUploads: 1,
                acceptedFiles: 'image/*',
                createImageThumbnails: true,
                timeout: 2000000,
                maxfilesexceeded: function (file) {
                    alert("Upload image that is NOT more than 10MB.")
                },
                success: function (file, response) {
                    if (response.success === false) {
                        if (response.errors === null || response.errors === undefined) {
                            $.notify(response.message, "success");
                        } else {
                            $.each(response.errors, function (index, element) {
                                $.notify(element.field + ": " + element.message, "error");
                            })
                        }
                    } else {
                        let preview = btn.closest('.form-box').find('.preview--img img');
                        preview.attr('src', thumbImg);
                        $.notify(response.message, "success");
                    }
                },
                thumbnail: function (file, dataUrl) {
                    console.log(dataUrl);
                    thumbImg = dataUrl;
                },
                uploadprogress: function (file, progress, bytesSent) {
                },
                queuecomplete: function (file) {
                    //
                },
                sending: function (file, xhr, formData) {
                    btn.children('i').css('display', 'inline-block');

                    let id = $('#SubDomainConstantUniqueId').val();
                    formData.append("type", type);
                    formData.append("id", id);
                },
                complete: function (file) {
                    btn.children('i').hide();
                },
                addedfile: function (file) {
                    //https://github.com/enyo/dropzone/issues/175#issuecomment-176653890
                    btn = $('a[data="' + type + '"]');
                }
            });
        });


        $(".deleteWebsiteMedia").on('click', function (e) {
            e.preventDefault();
            let type = $(this).attr('data');

            $.post("/api/dashboards/DeleteWebsiteMedia", {type: type, id: $('#SubDomainConstantUniqueId').val()},
                function (response) {

                    if (response.success === true) {
                        $.notify(response.message, "success");
                        $(this).closest('.form-box').find('.output--img').attr('src', '/images/generic-default-100.jpg')
                    } else {
                        $.notify("Error deleting photo", "warn");
                    }
                })
        })
    }


    if ($(".publishBtn").length > 0) {
        $('.publishBtn').on("change",
            function () {
                let self = $(this);
                let listingRef = self.attr("data");
                //self.closest('.photoBox2').find('.loading').show()

                $.post("/api/posts/publish",
                    {ListingRef: listingRef, IsPublished: self.prop("checked") ? true : false},
                    function (response) {

                        if (response.success === true) {
                            $.notify(response.message, "success");
                            //if (self.prop("checked")) {
                            //    self.closest('.custom-control').find('label').html("<i class='fa fa-check'></i> Publish")
                            //} else {
                            //    self.closest('.custom-control').find('label').html("<i class='fa fa-times'></i> Publish")
                            //}
                        } else {
                            $.notify("Error publishing listing", "warn");
                        }

                        //self.closest('.photoBox2').find('.loading').hide()
                    })
            });
    }


    if ($(".changeStatusBtn").length > 0) {
        $('.changeStatusBtn').on("change",
            function () {
                let self = $(this);
                let listingRef = self.attr("data");

                $.post("/api/posts/ChangeMarketStatus",
                    {ListingRef: listingRef, IsAvailable: self.prop("checked") ? true : false},
                    function (response) {

                        if (response.success === true) {
                            $.notify(response.message, "success");
                            //if (self.prop("checked")) {
                            //    self.closest('.custom-control').find('label').html("<i class='fa fa-check'></i> Available")
                            //} else {
                            //    self.closest('.custom-control').find('label').html("<i class='fa fa-times'></i> Available")
                            //}
                        } else {
                            $.notify(response.message, "warn");
                        }
                    })
            });
    }


    if ($('.deleteFav').length > 0) {
        $('.deleteFav').on('click', function (e) {

            let btn = $(this);
            e.preventDefault();

            let ref = btn.attr("hut-ref");
            let url = btn.attr("url");

            $.post(url, {id: ref}, function (response) {
                if (response.success === true) {
                    btn.removeClass('activeBtn');
                } else {
                    let parent = btn.closest('.favParent');
                    parent.fadeOut("normal", function () {
                        parent.remove();
                    });
                }
            });
        })
    }


    if ($('.refreshListing').length > 0) {
        $('.refreshListing').on('click', function (e) {

            let btn = $(this);
            e.preventDefault();

            let ref = btn.attr("data");

            $.post("/api/posts/Refresh", {id: ref}, function (response) {
                if (response.success === true) {
                    $.notify(response.message, "success");
                } else {
                    $.notify("Error refreshing listing", "warn");
                }
            });
        })
    }
});


$(document).ready(function () {

    if ($(".publishSite").length > 0) {
        $('.publishSite').on("change",
            function () {
                let self = $(this);
                let data = self.attr("data");

                $.post("/api/dashboards/publishWebsite",
                    {id: data, IsPublished: self.prop("checked") ? true : false},
                    function (response) {

                        if (response.success === true) {
                            $.notify(response.message, "success");
                        } else {
                            self.notify(response.message, "warn");
                        }
                    })
            });
    }


    if ($("#verifyCname").length > 0) {
        $('#verifyCname').on("click",
            function () {
                let self = $(this);
                let domain = $("#MappedDomain").val();

                $.post("/api/dashboards/VerifyCname",
                    {url: domain},
                    function (response) {

                        if (response.success === true) {
                            self.notify(response.message, "success");
                        } else {
                            self.notify(response.message, "warn");
                        }
                    })
            });
    }

});


$(document).ready(function () {

    if ($("#SubDomainName").length > 0) {

        $("#SubDomainName").on("change keyup paste click", function () {
            let self = $(this);
            $('#fullURL').val('http://' + self.val() + '.realtywebng.com');
        })
    }


    if ($("#isPro").length > 0) {
        $('#isPro').on("click", function () {
            if ($('#isPro').is(":checked")) {
                $('.isPro').show();
            } else {
                $('.isPro').hide();
            }
        });
    }


    $(".submitForm").on("click",
        function (e) {

            let self = $(this);
            e.preventDefault();
            window.disableBtn(self);

            self.closest('form').find('.serverMessage').hide();
            self.closest('form').find('.serverMessage').empty();

            let url = self.attr("url");
            let data = self.closest('form').serialize();

            $.post(url, data)
                .done(function (response) {
                    if (response.success === false) {
                        //window.addErrorClass(formId + ' .serverMessage');
                        if (response.errors === null || response.errors === undefined) {
                            $.notify(response.message, "warn");
                        } else {
                            $.each(response.errors, function (index, element) {
                                self.closest('form').find('.serverMessage').append($('<span>', {
                                    text: element.message
                                }))

                                $.notify(element.message, "warn");
                            })
                            self.closest('form').find('.serverMessage').show();
                        }
                        window.scrollTo(self.closest('form'), 10, false);
                    } else {
                        //disable AreYouSure event
                        $('form').areYouSure({'silent': true});
                        $.notify(response.message, "success");

                        if ($("#SubDomainName").length > 0) {
                            //specific for website publishing only
                            let isDisabled = $('#SubDomainName').prop('disabled');

                            setTimeout(function () {
                                if (isDisabled) {
                                    window.location = "/dashboard/websiteSettings/" + response.data;
                                } else {
                                    window.location = "/dashboard/website/" + response.data;
                                }
                            }, 7000);
                        }
                    }

                    window.enableBtn(self);
                })
                .fail(function () {
                    window.addErrorClass('.serverMessage');
                    self.closest('form').find('.serverMessage').show().text("Error processing this request. Check your internet connection or reload the page to try again");
                    window.scrollTo(self.closest('form'), 10, false);
                    window.enableBtn(self);
                });
        });


    if ($("#accountSettings").length > 0) {
        $('#accountSettings .settings').on("change",
            function () {
                let self = $(this);
                let settingName = self.attr("name");

                $.post("/api/dashboards/accountSettings",
                    {Id: settingName, isOn: self.prop("checked") ? true : false},
                    function (response) {

                        if (response.success === true) {
                            $.notify(response.message, "success");
                        } else {
                            $.notify(response.message, "warn");
                        }
                    })
            });
    }
});
