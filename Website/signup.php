<!DOCTYPE html>
<html lang="en">

<head>

  <title>Sign up Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css/form.css">

  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <link rel="manifest" href="%PUBLIC_URL%/manifest.json" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

  <script src="script/validation.js"></script>
</head>

<body>

  <div class="responce_popup alert fade" role="alert">
    <p></p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>


  <div class="form_design_one_section">
    <div class="form_design_one_box_main">
      <div class="form_design_one_box">
        <div class="form_design_one_content_section">
          <div class="form_design_one_content_heading">
            <h3>No Account? No Problem</h3>
            <p>Enter your credentials to continue</p>
          </div>
          <form method="POST" id="submit_signup_form" novalidate="novalidate">
            <div class="form_design_one_content_box">

              <div class="form_design_one_field_box">
                <div class="form_design_one_single_field_box">
                  <span>Name</span>
                  <input type="text" placeholder="Enter your name" name="user_name" id="user_name" />
                </div>
                <label class="error" generated="true" for="user_name"></label>
              </div>

              <div class="form_design_one_field_box">
                <div class="form_design_one_single_field_box">
                  <span>Email Address</span>
                  <input type="text" placeholder="Enter your email" name="email" id="email" />
                </div>
                <label class="error" generated="true" for="email"></label>
              </div>

              <div class="form_design_one_field_box">
                <div class="form_design_one_single_field_box">
                  <span>Password</span>
                  <input type="text" placeholder="Enter your Password" name="password" id="password" />
                  <i class="ri-eye-fill" onclick="myFunction()"></i>
                </div>
                <label class="error" generated="true" for="password"></label>
              </div>

              <div class="form_design_one_field_box">
                <div class="form_design_one_single_field_box">
                  <span>Phone</span>
                  <input type="text" placeholder="Enter your number" name="phone_number" id="phone_number" />
                </div>
                <label class="error" generated="true" for="phone_number"></label>
              </div>

              <div class="form_design_one_field_box">
                <div class="form_design_one_single_field_box">
                  <span>Address</span>
                  <input type="text" placeholder="Enter your Address" name="department" id="department" />

                </div>
                <label class="error" generated="true" for="department"></label>
              </div>

              <div class="form_design_one_submit_btn">
                <button id="RegisterUser" class="RegisterUser" type="submit">

                  Sign Up
                </button>
              </div>
            </div>
          </form>
          <script> onload_signup()</script>
          <div class="form_design_one_account_btn">
            <p>Have an account? <a href="login.php">Login here</a></p>
          </div>
        </div>
      </div>
    
    </div>
  </div>

  <div id="loader">
    <div class="loader_main"></div>
  </div>

<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</body>

</html>