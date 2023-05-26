
<?php
include 'connection.php';
session_start();
$user_name=$email=$password=$LoginForm=$response="";

// receive all user data from the database, then match email with the mail entered in form.
// after that it matches the password and save user name in session
// returns the response 0 to the ajax in the script folder validation.js if login failed
// otherwise the user login and returns response 1 if the login was successful.

if(isset($_POST['LoginForm'])){

    $user_name=$_POST['user_name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    if(!isset($_SESSION['email'])){
    $singleuser="SELECT * FROM `register` WHERE email='$email' ";
    $singleuserresult=mysqli_query($conn,$singleuser);
    $get_user=mysqli_num_rows($singleuserresult);

    if($get_user){
       
        $singleuserresultarray=mysqli_fetch_assoc($singleuserresult);
      
        $db_pass=$singleuserresultarray['password'];
      
      

        // $decode_pass=password_verify($password,$db_pass);
    // if($decode_pass){
    //     echo "Login Success";
    // }
    // else{
    //     echo "pass not match";
    // }

    if($db_pass==$password){

        $_SESSION['email']=$singleuserresultarray['email'];
        $response=1;
        echo $response;
      }
    else{
       
      $response=0;
      echo $response;
    }


    }
    else{
      $response=2;
      echo $response;
    }
   
    }
    else{
      $response=3;
      echo $response;

    }
   
}


?>
