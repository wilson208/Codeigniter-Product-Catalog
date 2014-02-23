    function validatePassword(){
        var field = document.getElementById("password");
        var fieldGroup = document.getElementById("passwordGroup");
        var fieldSpan = document.getElementById("passwordSpan"); 
        var password = field.value;
        
        if(password.length < 8 || password.length > 20 || !password.match(/[a-z]/) || !password.match(/[A-Z]/) || !password.match(/[0-9]/)){
            fieldGroup.className = 'form-group has-error has-feedback';
            fieldSpan.className = 'glyphicon glyphicon-remove form-control-feedback';
        }else{
            fieldGroup.className = 'form-group has-success has-feedback';
            fieldSpan.className = 'glyphicon glyphicon-ok form-control-feedback';
        }  
    }
    function validatePasswordConfirm(){
        var passwordField = document.getElementById("password");
        var confirmField = document.getElementById("passwordconfirm");
        var fieldGroup = document.getElementById("passwordConfirmGroup");
        var fieldSpan = document.getElementById("passwordConfirmSpan"); 
        
        if(passwordField.value != confirmField.value){
            fieldGroup.className = 'form-group has-error has-feedback';
            fieldSpan.className = 'glyphicon glyphicon-remove form-control-feedback';
        }else{
            fieldGroup.className = 'form-group has-success has-feedback';
            fieldSpan.className = 'glyphicon glyphicon-ok form-control-feedback';
        }
    }
    function checkEmailTaken(){
        var http;
        if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
            http=new XMLHttpRequest();
        }else{// code for IE6, IE5
            http=new ActiveXObject("Microsoft.XMLHTTP");
        }
        http.onreadystatechange=function(){
            if (http.readyState==4 && http.status==200){
                document.getElementById("myDiv").innerHTML=http.responseText;
            }
        }
        http.open("GET","ajax_info.txt",true);
        http.send();
    }