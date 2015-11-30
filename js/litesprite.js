jQuery(document).ready(function($) {

    //$('.collapse').collapse()

    /* affix the navbar after scroll below header */
    $('#nav').affix({
        offset: {
            top: $('header').height()-$('#nav').height()
        }
    }); 

    /* highlight the top nav as scrolling occurs */
    $('body').scrollspy({ target: '#nav' });

    /* smooth scrolling for scroll to top */
    $('.scroll-top').click(function(){
        $('body,html').animate({scrollTop:0},1000);
    });

    /* smooth scrolling for nav sections */
    $('#nav .navbar-nav li>a').click(function(){
        var link = $(this).attr('href');
        var posi = $(link).offset().top+20;
        $('body,html').animate({scrollTop:posi},700);
    });
    //validate email
     $('#btnValidate').click(function() {
        var sEmail = $('#txtEmail').val().trim();
        if ($.trim(sEmail).length === 0) {
            alert('Please enter valid email address');
            e.preventDefault();
        }
        if (validateEmail(sEmail)) {
            $("#loading").prop('hidden',false);
            ajaxDoEmail(sEmail);
            $('#txtEmail').innerHTML="";
        }
        else {
            alert('Invalid Email Address');
            e.preventDefault();
        }
    });
});

function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}

function ajaxDoEmail(vEmail) {
    var xmlHttp;
    var params = '';

    document.getElementById("emailjoin").innerHTML = "";

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
        if(xmlHttp.readyState === 4) {
            if(xmlHttp.responseText === "email added") {
                //alert("email added");
                window.location.replace("https://litesprite.com/signup/intro.php");
            } else {
                document.getElementById("emailjoin").innerHTML = xmlHttp.responseText; //"Email Added!";
                document.getElementById("txtEmail").value = "";
            }
            $("#loading").prop('hidden',true);
        }
    };

    if (vEmail.length < 1) {
        alert("Please add an email address.");
        return;
    }

    params = "emailaddress=" + encodeURIComponent(vEmail);

    xmlHttp.open("POST","./include/ls_emailjoin.php",true);
    //Send the proper header information along with the request
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlHttp.send(params);
            
}

 $(function(){
    $(window).scroll(function(){
        // make sure you change 52 to your headers height plus your padding
        if ($(window).scrollTop() >= ($('.intro').outerHeight()) * 0.5) {
            $("#navlogo").addClass("stuck");
            $("#navlogo").removeClass("unstuck");
        } else {
            $("#navlogo").addClass("unstuck");
            $("#navlogo").removeClass("stuck");
        }
    });


    /* copy loaded thumbnails into carousel */
    $('.row .thumbnail').on('load', function() {}).each(function(i) {
      if(this.complete) {
        var item = $('<div class="item"></div>');
        var itemDiv = $(this).parents('div');
        var title = $(this).parent('a').attr("title");
        
        item.attr("title",title);
        $(itemDiv.html()).appendTo(item);
        item.appendTo('.carousel-inner'); 
        if (i===0){ // set first item active
         item.addClass('active');
        }
      }
    });

    /* activate the carousel */
    $('#modalCarousel').carousel({interval:false});

    /* change modal title when slide changes */
    $('#modalCarousel').on('slid.bs.carousel', function () {
      $('.modal-title').html($(this).find('.active').attr("title"));
    });

    /* when clicking a thumbnail */
    $('.row .thumbnail').click(function(){
        var idx = $(this).parents('div').index();
        var id = parseInt(idx);
        $('#myModal').modal('show'); // show the modal
        $('#modalCarousel').carousel(id); // slide carousel to selected
        
    });

    $('.logopix').popover({
       animation: 'true',
       trigger: 'hover',
       html: true,
       placement: 'bottom'
    });

});
