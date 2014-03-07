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
    
    function validateEmail(){
        var email = document.getElementById('email').value;
        var fieldGroup = document.getElementById("emailGroup");
        var fieldSpan = document.getElementById("emailSpan"); 
        var errorLabel = document.getElementById("emailError");
        
        if(checkEmailFormat(email)){
             var urlString = "../ajax_responders/emailTaken?email=".concat(email);
             $.get( urlString, 
                function( data ) { 
                    if(JSON.parse(data).taken == 1){
                        fieldGroup.className = 'form-group has-error has-feedback';
                        fieldSpan.className = 'glyphicon glyphicon-remove form-control-feedback';
                        errorLabel.innerHTML = 'Email Already Taken';
                    }else{
                        fieldGroup.className = 'form-group has-success has-feedback';
                        fieldSpan.className = 'glyphicon glyphicon-ok form-control-feedback';
                        errorLabel.innerHTML = 'Email Not Taken';
                    }
                }
            ); 
        }else{
            fieldGroup.className = 'form-group has-error has-feedback';
            fieldSpan.className = 'glyphicon glyphicon-remove form-control-feedback';
            errorLabel.innerHTML = 'Email Wrong Format';
        }
    }
    
    function checkEmailTaken(email){
        
       
    }
    function checkEmailFormat(email) { 
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    } 