<?php
session_start();
// error_reporting();
include("include/dbConfig.php");


// check if user is logged in

if (isset($_SESSION['login_user'])) {

    if(strlen($_SESSION['login_user'])!=0){
        echo '<script>window.location="checkout_page.php"</script>';  
    }
        

}
    else
{ // user is not logged in

$check_existing_user = false;
$check_invalid = false;
    // echo 'no';
    if(isset($_POST['login']))
    {
        //getting user's entered form data
        $username=$_POST['email'];
        $password=$_POST['password'];
        
        // if the entered credentials match with the admin credentials, login as admin and redirect to admin panel.
        if($username == "admin@gmail.com" && $password == "12345678"){
            $query = $db->query("SELECT * FROM admins WHERE admin_email = '".$username."'");
            while($d = $query->fetch_assoc()){
                $admin_name = $d['admin_name'];
            }
            
            // creating an admin login session
            $_SESSION['admin_login'] = $admin_name;
            
            ?>
            <script>window.location.href="admin"</script>
            <?php
        }
        
        $Loginusername='';
        
        // check the user exists with the entered email
        $check_q = $db->query("SELECT * FROM customers WHERE customer_email = '$username'");
        
        if(mysqli_num_rows($check_q)!=0){
            // check if user's password is correct
             $q = "SELECT * FROM customers WHERE customer_email = '$username' AND customer_pass='$password'";
    
            $ret=$db->query($q);
            while($row =$ret->fetch_assoc()){
                $Loginusername=$row['customer_name'];
                $loginuserid = $row['customer_id'];
            }
            $num=mysqli_num_rows($ret);
          
            if($num>0)
            {
                
                // the case where password is true and creating the log in session for user.
                $extra="index.php";
                $_SESSION['login_user']=$Loginusername;
                $_SESSION['login_id']=$loginuserid;

                echo '<script>window.location.href="checkout_page.php"</script>';

            }
            else
            {   
                // invalid password
                $check_invalid = true;
    
            }
        } else  { // no user found
            $check_existing_user = true;
        }
        
       
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
     <title>Login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <link rel="stylesheet" type="text/css" href="CSS-Files/stylemain.css">

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
          <h3>Hi, Welcome back</h3>
          <p>Enter your credentials to continue</p>
        </div>
        <form action=""
          method="POST"
        >
          <div class="form_design_one_content_box">
           
          
            <div class="form_design_one_field_box">
              <div class="form_design_one_single_field_box">
                <span>Email Address</span>
                <input
                  type="text"
                  placeholder="Enter your email"
                  name="email"
                  id="email"
                  required
                />
              </div>
              <label class="error" generated="true" for="email"></label>
            </div>

            <div class="form_design_one_field_box">
              <div class="form_design_one_single_field_box">
                <span>Password</span>
                <input
                  type="text"
                  placeholder="Enter your Password"
                  name="password"
                  id="password"
                  required
                />
              <i class="ri-eye-fill" onclick="myFunction()"></i>
              </div>
              <label class="error" generated="true" for="password"></label>
            </div>
            <?php 
            if($check_existing_user == true){
                ?>
                <label class="text-danger">This user doesn't exist</label>
                <?php 
            }
            if($check_invalid == true){
                ?>
                <label class="text-danger">Invalid Password</label>
                <?php 
            }
            ?>
            <div class="form_design_one_submit_btn">
            <button id="LoginForm" class="LoginForm" type="submit" name="login">
              Login
              </button> 
              
            </div>
          </div>
        </form>
         <script>onload_login()</script>
     <div class="form_design_one_account_btn">
          <p>Don't have an account ? <a href="signup.php">Sign up here</a></p>
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
<?php  }

?>
