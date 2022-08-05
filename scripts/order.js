var loadingCss = $("<div>", {
    "class": "overlayLoadingCss"
});

function showOverlay(selector) {

    if (selector === undefined || selector == null) {
        $.LoadingOverlay("show", {
            image: "",
            custom: loadingCss,
            backgroundClass: "overlayLoadingBg"
        });
    } else {
        $(selector).LoadingOverlay("show", {
            image: "",
            custom: loadingCss,
            backgroundClass: "overlayLoadingBg"
        });
    }
}


function hideOverlay(selector) {

    if (selector === undefined || selector == null) {
        $.LoadingOverlay("hide");
    } else {
        $(selector).LoadingOverlay("hide");
    }
}


function paystack(invoiceRef, amount, email, fname) {
    
    var pskey = $('#PSKey').val();

    var handler = PaystackPop.setup({
        key: pskey,
        email: email,
        amount: amount + '00',
        ref: invoiceRef,
        metadata: {
            custom_fields: [
                {
                    fullName: fname,
                    product: "subscription",
                    invoice: invoiceRef //this is needed at the server.
                }
            ]
        },
        callback: function (response) {
            $.get("/subscription/ActivatePayment/" + response.reference,
                function (data) {
                    $.notify("Payment is being verified. Redirecting you to order status page...", "success");
                    window.location.href = "/subscription/orderStatus/" + response.reference;
                });
        },
        onClose: function () {

        }
    });
    handler.openIframe();
}


function calculateBoostOrder() {
    var dom = $('#NoOfCredits option:selected');
    var noCredit = $(dom).val();
    var discount = $(dom).attr('data');
    var unitPrice = $('#BoostUnitPrice').val();

    $("#BoostNoCredit").text(noCredit);
    var subTotal = parseInt(noCredit) * parseInt(unitPrice);

    if (isNaN(discount) === true) {
        discount = 0;
        $("#BoostDiscount").text('--');
        $('#BoostDiscountPc').text()
    } else {
        var totalDisc = discount * subTotal / 100;
        $("#BoostDiscount").text('₦' + totalDisc.toLocaleString());
        $('#BoostDiscountPc').text('of ' + discount + '%')
    }

    var grandTotal = subTotal * (100 - parseInt(discount)) / 100;
    $('#BoostGrandTotal').val(grandTotal);
    $("#BoostSubTotal").text('₦' + subTotal.toLocaleString());
    $('#BoostTotal').text('₦' + grandTotal.toLocaleString());
}


function calculateBuySubscription() {
    var btn = $("#boostAlert .payForSubOnline");
    var btnText = $(".payForSubOnline span");
    btnText.text("Calculating...");

    var productId = $('#boostAlert #ProductId option:selected').val();
    var quantity = $('#boostAlert #Quantity option:selected').val();
    var order = {"productId": productId, "quantity": quantity}

    $.post("/subscription/CalculateSubscriptionCart", order)
        .done(function (response) {

            btnText.text("Place Order");

            if (response.success === false) {

            } else {

                $("#boostAlert #PlanName").text(response.dataObject.planName + " Plan")
                $("#boostAlert #NoOfMonths").text(response.dataObject.noOfMonths)

                var discount = response.dataObject.unitPrice * response.dataObject.noOfMonths - response.dataObject.total;
                $("#DiscountAmount").text('- ₦' + discount.toLocaleString())

                $("#boostAlert #Discount").text(response.dataObject.discount + "%")

                $("#boostAlert #Featured").text(response.dataObject.featured + " per month")
                $("#boostAlert #Boost").text(response.dataObject.boost + " per month")

                $("#boostAlert #UnitPrice").text('₦' + response.dataObject.unitPrice.toLocaleString())
                $("#boostAlert #GrantTotal").text('₦' + response.dataObject.total.toLocaleString())
                $("#boostAlert #SubTotal").text('₦' + (response.dataObject.unitPrice * response.dataObject.noOfMonths).toLocaleString())

                //this is hidden value
                $("#TotalAmount").val(response.dataObject.total)
            }

        })
        .fail(function () {
            $(btn).prop('disabled', false);
            $('.payForSubOnline .fa-spinner').css('display', 'none');
            btnText.text("Place Order");
        });

}


function boostListingPaystack(invoiceRef, total, email, name) {

    window.disableBoostBtn();
    var pskey = $('#PSKey').val();

    var handler = PaystackPop.setup({
        key: pskey,
        email: email,
        amount: total + '00',
        ref: invoiceRef,
        metadata: {
            custom_fields: [
                {
                    fullName: name,
                    product: "Boost Credit",
                    invoice: invoiceRef //this is needed at the server.
                }
            ]
        },
        callback: function (response) {
            window.enableBoostBtn("Pay Now");
            $.get("/api/BoostCredits/ActivateBoostCredit/" + response.reference, function (response) {
                if (response.success === true) {
                    //dismiss the modal
                    $('#boostAlert').modal('hide');

                    //show the success
                    $.notify(response.message, "success");

                    $('#ModalSuccessMessage').text('Your payment is received and transaction processed')
                    $('#ModalSuccess').modal('show');

                } else {
                    $.notify(response.message, "error");
                }
            });
        },
        onClose: function () {
            window.enableBoostBtn("Pay Now");
        }
    });
    handler.openIframe();
}

$(document).ready(function () {

    //initialize the order details
    calculateSubscriptionOrder();


    function calculateSubscriptionOrder() {
        var btn = $("#orderDetails .payForSubOnline");
        var btnText = $(".payForSubOnline span");
        btnText.text("Calculating...");

        $(btn).prop('disabled', true);
        $('.payForSubOnline .fa-spinner').css('display', 'inline-block');

        var order = $('#orderDetails').serialize();
        $.post("/subscription/CalculateSubscriptionCart", order)
            .done(function (response) {

                window.enableBtn(btn);
                btnText.text("Place Order");

                if (response.success === false) {

                } else {

                    var total = response.dataObject.unitPrice * response.dataObject.noOfMonths;
                    $("#TotalWithoutDiscount").text(total)

                    $("#PlanName").text(response.dataObject.planName + " Plan")
                    $("#NoOfMonths").text(response.dataObject.noOfMonths)

                    var discount = response.dataObject.unitPrice * response.dataObject.noOfMonths - response.dataObject.total;
                    $("#DiscountAmount").text('- ₦' + discount.toLocaleString())

                    $("#Discount").text(response.dataObject.discount + "%")

                    $("#Featured").text(response.dataObject.featured + " per month")
                    $("#Boost").text(response.dataObject.boost + " per month")

                    $("#DateRange").text(response.dataObject.dateRange)
                    $("#UnitPrice").text('₦' + response.dataObject.unitPrice.toLocaleString())
                    $("#Total").text('₦' + response.dataObject.total.toLocaleString())
                    $("#TotalWithoutDiscount").text('₦' + (response.dataObject.unitPrice * response.dataObject.noOfMonths).toLocaleString())

                    //this is hidden value
                    $("#TotalAmount").val(response.dataObject.total)
                }

            })
            .fail(function () {
                $(btn).prop('disabled', false);
                $('.payForSubOnline .fa-spinner').css('display', 'none');
                btnText.text("Place Order");
            });
    }

    $("#PaymentMedium").on("change", function (e) {
        var self = $(this).value;
        if (self === "0") {
            $('.bankDetails').hide();
            $('.payWithCard').show();
        } else {
            $('.bankDetails').show();
            $('.payWithCard').hide();
        }
    });


    $('#orderDetails input, select').on('change', function (e) {
        e.preventDefault(e);
        calculateSubscriptionOrder();
    });


    if ($(".payForSubOnline").length > 0) {
        
        $(".payForSubOnline").on("click", function (e) {
            e.preventDefault(e);

            if (!$('#TotalAmount').val()) {
                alert("Complete your cart details before placing an order");
                return;
            }

            var btn = $(this);
            var btnText = $(".payForSubOnline span");

            $(btn).prop('disabled', true);
            btnText.text("Processing...");
            $('.payForSubOnline .fa-spinner').css('display', 'inline-block');

            $('.serverMessage').hide();
            $('.serverMessage').empty();

            var url = $(this).attr("url");
            var order = $('#orderDetails').serialize();

            $.post(url, order)
                .done(function (response) {

                    window.enableBtn(btn);
                    btnText.text("Place Order");

                    if (response.success === false) {
                        window.addErrorClass('.serverMessage');
                        if (response.errors === null || response.errors === undefined) {
                            $('.serverMessage').show().html(response.message);
                            $.notify(response.message, "error");
                        } else {
                            $.each(response.errors, function (index, element) {
                                $('.serverMessage').append($('<span>', {
                                    text: element.field + ": " + element.message
                                }))

                                $.notify(element.field + ": " + element.message, "error");
                            })
                            $('.serverMessage').show();
                        }

                        $(btn).prop('disabled', false);
                        $('.payForSubOnline .fa-spinner').css('display', 'none');
                        window.scrollTo('html', 10, false);
                    } else {
                        //disable AreYouSure event
                        $('form').areYouSure({'silent': true});
                        $.notify(response.message, "success");

                        var invoiceRef = response.data;

                        $(btn).prop('disabled', false);

                        $('.payForSubOnline .fa-spinner').css('display', 'none');

                        var amount = $("#TotalAmount").val();
                        var email = $('#EmailAddress').val();
                        var fname = $('#FullName').val();
                        
                        paystack(invoiceRef, amount, email, fname);
                    }

                })
                .fail(function () {
                    window.addErrorClass('.serverMessage');
                    var errorMsg = "Error processing this request. Check your internet connection or reload the page to try again";
                    $('.serverMessage').show().text(errorMsg);
                    window.scrollTo('html', 10, false);

                    $.notify(errorMsg, "error");

                    window.enableBtn(btn);
                    btnText.text("Place Order");
                });
        })
        
    }

});

$(document).ready(function () {
    $('.boostLs').on("click", function () {

        showOverlay();

        var url = '/api/datas/GetModal?id=boostListing&lsRef=' + $(this).attr("data");
        $.ajax({
            url: url,
            success: function (res) {
                $('#modalContent').html(res);
                $('#boostAlert select').selectpicker();

                $('#boostAlert').modal('show');
            },
            complete: function () {
                hideOverlay()
            },
            error: function (request, status, error) {
                $.notify("error processing event", "error");
            }
        });
    });

    $('.buyCredit').on("click", function () {

        showOverlay();

        var url = '/api/datas/GetModal?id=buyBoostCredit';
        $.ajax({
            url: url,
            success: function (res) {
                $('#modalContent').html(res);
                $('#boostAlert select').selectpicker();

                $('#boostAlert').modal('show');
            },
            complete: function () {
                hideOverlay()
            },
            error: function (request, status, error) {
                $.notify("error processing event", "error");
            }
        });
    });


    $('.featuredLs').on("click", function () {

        return;

        showOverlay();

        var url = '/api/datas/GetModal?id=featuredListing&lsRef=' + $(this).attr("data");
        $.ajax({
            url: url,
            success: function (res) {
                $('#modalContent').html(res);
                $('#boostAlert').modal('show');
            },
            complete: function () {
                hideOverlay()
            },
            error: function (request, status, error) {
                $.notify("error processing event", "error");
            }
        });
    });

    var modal = $('#modalContent');
    $(modal).on('change', '#boostAlert input, #boostAlert select', function (e) {
        e.preventDefault(e);
        calculateBoostOrder();
    });

    $(modal).on('change', '.buySubscription input, .buySubscription select', function (e) {
        e.preventDefault(e);
        calculateBuySubscription();
    });

    $(modal).on('click', '.payForBoost', function (e) {

        var name = $('#BoostOrderName').val();
        var email = $('#BoostOrderEmail').val();
        var paymentMethod = $('#BoostPaymentMethod').val();

        var boostTotal = $('#BoostGrandTotal').val();
        var dom = $('#NoOfCredits option:selected');
        var noCredit = $(dom).val();

        //create the Order
        var url = $(this).attr("url");
        var order = {ProductId: 5, PaymentMedium: paymentMethod, Quantity: parseInt(noCredit)}

        $.post(url, order)
            .done(function (response) {
                window.disableBoostBtn();
                if (response.success === false) {
                    if (response.errors === null || response.errors === undefined) {
                        $.notify(response.message, "error");
                    } else {
                        $.each(response.errors, function (index, element) {
                            $.notify(element.field + ": " + element.message, "error");
                        })
                    }

                    window.enableBoostBtn("Pay Now");
                } else {
                    $.notify(response.message, "success");
                    var invoiceRef = response.data;
                    window.enableBoostBtn("Pay Now")

                    if (paymentMethod === "0") {
                        boostListingPaystack(invoiceRef, boostTotal, email, name);
                    } else {
                        $('#boostAlert').modal('hide');
                        
                        var mba = $('#ModalBankAcct');
                        $('#ModalBankAcct .mbaAmount').text('₦' + parseInt(boostTotal).toLocaleString())
                        $('#ModalBankAcct .mbaReference').text(invoiceRef)
                        
                        mba.modal('show');
                    }
                }
            })
            .fail(function () {
                $.notify("Error processing this request. Check your internet connection or reload the page to try again", "error");
                window.enableBoostBtn("Pay Now")
            });
    })

    $(modal).on("click", '.buySubOnline', function (e) {
        e.preventDefault(e);

        if (!$('#TotalAmount').val()) {
            alert("Complete your cart details before placing an order");
            return;
        }

        var btn = $(this);
        var btnText = $(".buySubOnline span");

        $(btn).prop('disabled', true);
        btnText.text("Processing...");
        $('.buySubOnline .fa-spinner').css('display', 'inline-block');

        var url = $(this).attr("url");
        var productId = $('#boostAlert #ProductId option:selected').val();
        var quantity = $('#boostAlert #Quantity option:selected').val();
        var order = {"productId": productId, "quantity": quantity}

        $.post(url, order)
            .done(function (response) {

                window.enableBtn(btn);
                btnText.text("Place Order");

                if (response.success === false) {
                    if (response.errors === null || response.errors === undefined) {
                        $.notify(response.message, "error");
                    } else {
                        $.each(response.errors, function (index, element) {
                            $.notify(element.field + ": " + element.message, "error");
                        })
                    }

                    $(btn).prop('disabled', false);
                    $('.buySubOnline .fa-spinner').css('display', 'none');
                } else {
                    //disable AreYouSure event
                    $('form').areYouSure({'silent': true});
                    $.notify(response.message, "success");

                    var invoiceRef = response.data;
                    $(btn).prop('disabled', false);

                    $('.buySubOnline .fa-spinner').css('display', 'none');
                    var amount = $("#TotalAmount").val();
                    var payMedium = $("#PaymentMedium").val();

                    if(payMedium !== "0"){
                        $('#boostAlert').modal('hide');
                        var mba = $('#ModalBankAcct');
                        $('#ModalBankAcct .mbaAmount').text('₦' + parseInt(amount).toLocaleString())
                        $('#ModalBankAcct .mbaReference').text(invoiceRef)

                        mba.modal('show');
                    }
                    else{
                        var email = $('#OrderEmail').val();
                        var fname = $('#OrderName').val();
                        paystack(invoiceRef, amount, email, fname);
                    }
                }

            })
            .fail(function () {
                var errorMsg = "Error processing this request. Check your internet connection or reload the page to try again";
                $.notify(errorMsg, "error");

                window.enableBtn(btn);
                btnText.text("Place Order");
            });
    })


})
