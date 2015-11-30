$(document).ready(function(){
    $("#survey1").validate({
        errorLabelContainer: $("#survey1 div.error"),
        rules: {
            clientkey: {
              required: true
            },
            age: {
                selectage: true
            },
            gender: {
                required: true,
                
            }
        },
        messages: {
            gender: {
                required: "Gender is Required"
            }
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

    // $("#survey2").validate({
    //     errorLabelContainer: $("#survey2 div.error"),
    //     rules: {
    //         q1: {
    //             required: true,
    //         }
    //     },
    //     messages: {
    //         q1: {
    //             required: "Question 1 is re"
    //         }
    //     }
    // });


jQuery.validator.addMethod('selectage', function (value) {
    return (value != '0');}, "Age is required");

});

// $("#finish").click(function (event) {
//     event.preventDefault();
//     $(location).attr('href','http://litesprite.com/survey/email.php');
// });

function doRadioClick(vTable, vObj) {
    ajaxSetSurveyValue(vTable, vObj.name, vObj.value);
}

function doCheckboxClick(vTable, vObj) {
    if (vObj.checked == true) {
        vVal = 1;
    } else {
        vVal = 0;
    }
    ajaxSetSurveyValue(vTable, vObj.name, vVal);
}


function doTextChange(vTable, vObj) {
    ajaxSetSurveyValue(vTable, vObj.name, vObj.value);
}

function doSelectChange(vTable, vObj) {
    ajaxSetSurveyValue(vTable, vObj.name, vObj.value);
}

function reqListener () {
  console.log("Hello: " + this.responseText);
}

function ajaxSetSurveyValue(vTable, vQuestion, vValue) {

  var xmlHttp;
  var params = '';

try {
    // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest();
    }
catch (e) {
    // Internet Explorer
        try {
            xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
            }
        catch (e) {
            try {
                xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
        catch (e) {
            alert("Your browser does not support AJAX!");
            return false;
            }
        }
    }
    xmlHttp.onreadystatechange=function() {
    if(xmlHttp.readyState==4) {
        //document.getElementById("emailalertscontainer").innerHTML=xmlHttp.responseText;
        // alert("readyState:  " + xmlHttp.status + " " + xmlHttp.responseText);
        }
    }
    params = "table=" + encodeURI(vTable)+
                "&question=" + encodeURI(vQuestion)+
                "&value=" + encodeURI(vValue);  

    // xmlHttp.onload = reqListener;

    //document.getElementById("emailalertscontainer").innerHTML="";
    xmlHttp.open("POST","./include/srv_survey_radio.php",true);

    //Send the proper header information along with the request
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlHttp.send(params);
};  
