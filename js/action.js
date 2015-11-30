
    
var minimum = 8; 
var fair = 8; 
var strength_label = Array( 'Min. 8 Chars', 'Incomplete', 'Incomplete', 'Incomplete', 'Good' ); 
var strength_color = Array( '#FF0000', '#FF9900', '#FFCC33', '#99CC99', '#00CC33' ); 

function testpassword( pwInput, pwSpan ) { 
    if(!pw){ var pw = document.getElementById(pwInput).value.toString(); } 
    if(!pw){ return false; } 
    var strength = 0; 
    if( pw.length >= minimum ) { 
        strength = 1; 
        if(pw.length >= fair){ 
            strength++; 
            } 
        if((/\d+/.test(pw)) || (/\W+/.test(pw))){ 
            strength++; 
            } 
        if(/[a-z]+/.test(pw) || /[A-Z]+/.test(pw)){ 
            strength++; 
            } 
        } 
    document.getElementById(pwSpan).innerHTML = strength_label[ strength ]; 
    document.getElementById(pwSpan).style.color = strength_color[ strength ];  
    } 
function comparepassword( pw1Input, pw2Input, pwSpan, pwdButton) { 
    if(!pw1){ var pw1 = document.getElementById(pw1Input).value.toString(); }
    if(!pw2){ var pw2 = document.getElementById(pw2Input).value.toString(); }
    if(!pw1){ return false; }
    if(!pw2){ return false; }    
    if(( pw1 == pw2) && (pw2.length > 0)) { 
        document.getElementById(pwSpan).innerHTML = 'Match!';
        document.getElementById(pwSpan).style.color = '#00CC33';
        var strength = 0; 
        if( pw2.length >= minimum ) { 
            strength = 1; 
            if(pw2.length >= fair){ 
                strength++; 
                } 
            if((/\d+/.test(pw2)) || (/\W+/.test(pw2))){ 
                strength++; 
                } 
            if(/[a-z]+/.test(pw2) || /[A-Z]+/.test(pw2)){ 
                strength++; 
                } 
            }
            if (strength > 3) {
            document.getElementById(pwdButton).disabled = false;
            }
        } else {
        document.getElementById(pwSpan).innerHTML = 'Do Not Match';
        document.getElementById(pwSpan).style.color = '#CC3300';
        document.getElementById(pwdButton).disabled = true;
        }   
      
    } 

