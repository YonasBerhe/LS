$().ready(function(){
    // main validator
    $("#nda").validate({
        //errorLabelContainer: $("#nda div.error"),
        //custom placement for radio buttons
        errorPlacement: function(error, element) {
            if(element.attr("name") == 'device') {
                console.log("device error");
                error.appendTo("#device_td");
            } else if (element.attr("name") == 'checkshare') {
                console.log("checkshare");
                error.appendTo("#checkshare_td");
            } else {
                error.insertAfter(element);
            }
        },
        rules: {
            device: {
                required: true
            },
            deviceemail: {
                required: true,
                email: true
            },
            devicefirstname: {
                required: true
            },
            devicelastname: {
                required: true
            },
            emailaddress: {
                required: true,
                email: true
            },
            firstname: {
                required: true
            },
            lastname: {
                required: true         
            },
            checkshare: {
                required: true  
            }
        },
        messages: {
            device: {
                required: " Please select the type of mobile device you're using<br>"
            },
            deviceemail: {
                required: " Please enter a device email<br>",
                email: " Please enter a valid email<br>"
            },
            devicefirstname: {
                required: " Please enter the first name associated with your device<br>"
            },
            devicelastname: {
                required: " Please enter the last name associated with your device<br>"
            },
            emailaddress: {
                required: " Please enter an email<br>",
                email: " Please enter a valid email<br>"
            },
            firstname: {
                required: " Please enter you're first name<br>"
            },
            lastname: {
                required: " Please enter you're last name<br>"         
            },
            checkshare: {
                required: " Please select Yes or No to having you're provider access this information<br>"
            }

        }
    });
    
    var termsBtn = $('#terms_btn');
    termsBtn.click( function (event){
        var terms = $('#terms');
        if(terms.prop('hidden')) {
            terms.prop('hidden', false);
            termsBtn.text('Terms & Conditions');
        } else {
            terms.prop('hidden', true);
            termsBtn.text('Click to Show Terms & Conditions');
        }
    });

    $(".link").click ( function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        var win = window.open(link, '_blank');
        if(win){
            //Browser has allowed it to be opened
            win.focus();
        }else{
            window.open(link, '_parent');
        }
    });
    $(".link-same").click ( function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        var win = window.open(link, '_parent');
        if(win){
            //Browser has allowed it to be opened
            win.focus();
        }
    });

    // $("#checkshareno").click(function (e) {
    //     $("#provider_tr").prop("hidden", true);
    // });

    // $("#checkshareyes").click(function (e) {
    //     $("#provider_tr").prop("hidden", false);
    // });


});

