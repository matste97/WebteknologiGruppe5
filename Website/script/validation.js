

// validate and submit register form with ajax start

// first this function validate all signup fields that there is no empty field

function validate_signupForm(event) {
    event.preventDefault();

    $("#submit_signup_form").validate({
        rules: {

            user_name: {
                required: true,
            },   
            email: {
                required: true,
                email: true,
            },  
            password: {
                required: true,
            },
            phone_number: {
                required: true,
            }, 
            department: {
                required: true,
            },               
        }

    });
// after validation send request to "create_account.php" file and 
// after that process there is a response come back from the create_account.php file

     if ($('#submit_signup_form').valid()) {
        $(document).ready(function () {
            var spinner = $('#loader');
       $("#loader").css("display", "flex");
       var user_name = $('#user_name').val();
       var email = $('#email').val();
       var password = $('#password').val();
       var phone_number = $('#phone_number').val();
       var department = $('#department').val();
       var RegisterUser = $('#RegisterUser').val();
       $.ajax({
         type: "POST",
         url: "/Website/php_files/create_account.php",
         data: {
           "user_name": user_name,
           "email": email,
           "password": password,
           "phone_number": phone_number,
           "department": department,
           "RegisterUser": RegisterUser
         },
         success: function(data) {
           console.log(data);
           spinner.hide();
           
           if (data == 1) {
             $('.responce_popup p').text("Account created successfully redirection to login...");
             $('.responce_popup').addClass('alert-success');
             setTimeout(function() { 
                $('.responce_popup').removeClass('alert-success');
             }, 2000);
              setTimeout(function() { 
                 window.location = "login.php";
              }, 3000);
 
           } else {
             $('.responce_popup p').text("user Already exists with this email.");
             $('.responce_popup').addClass('alert-warning');
             setTimeout(function() { 
                $('.responce_popup').removeClass('alert-warning');
             }, 2000);
           
           }
 
         // $('#reset_register').reset();
         },
       });

    });
     }
}
function onload_signup() {
    var element = document.getElementById('RegisterUser');
    element.onclick = validate_signupForm;
}

  // validate and submit register form with ajax end

  // validate and submit login form with ajax start

  // first this function validate all login fields that there is no empty field

  function validate_login_Form(event) {
    event.preventDefault();

    $("#submit_login_form").validate({
        rules: {

            user_name: {
                required: true,
            },   
            email: {
                required: true,
                email: true,
            },  
            password: {
                required: true,
            },
                        
        }

    });
    // after validation send request to login.php file and 
    //after that process there is a response come back from the login.php file


     if ($('#submit_login_form').valid()) {
       
        $(document).ready(function () {
            var spinner = $('#loader');
          
              $("#loader").css("display", "flex");
              var user_name= $('#user_name').val();
              var email = $( '#email').val();
              var password = $('#password').val();
              var LoginForm = $('#LoginForm').val();
               $.ajax
                ({
                  type: "POST",
                  url: "/sitting_plan/php_files/login.php",
                  data: { "user_name": user_name,"email": email,"password": password,"LoginForm":LoginForm},
                  success:function (data) {
                   spinner.hide();
                   
                   if (data == 1) {
                    $('.responce_popup p').text("login successfull redirection to dashboard...");
                    $('.responce_popup').addClass('alert-success');
                    setTimeout(function() { 
                       $('.responce_popup').removeClass('alert-success');
                    }, 9000);
                     setTimeout(function() { 
                        window.location = "index.php";
                     }, 9000);
        
                  } 
                  else if(data == 2){
                    $('.responce_popup p').text("email not exists");
                    $('.responce_popup').addClass('alert-warning');
                    setTimeout(function() { 
                       $('.responce_popup').removeClass('alert-warning');
                    }, 9000);
                  }
                  else if(data == 3){
                    $('.responce_popup p').text("already login");
                    $('.responce_popup').addClass('alert-warning');
                    setTimeout(function() { 
                       $('.responce_popup').removeClass('alert-warning');
                    }, 9000);
                  }
                  else {
                    $('.responce_popup p').text("credentils not match");
                    $('.responce_popup').addClass('alert-warning');
                    setTimeout(function() { 
                       $('.responce_popup').removeClass('alert-warning');
                    }, 9000);
                  
                  }
                   // $('#reset_register').reset();
                  } 
                }); 
            
          }); 


     }

}

function onload_login() {

    var element = document.getElementById('LoginForm');
    element.onclick = validate_login_Form;

}




     // validate and submit login form with ajax end
  

