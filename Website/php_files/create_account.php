<?php
include '../include/dbConfig.php';

// User is added to the database, if user already exists in the database then
// it returns the response 0 to the ajax in the script folder validation.js
// if a new user is added in the database then it returns response 1
$user_name=$email=$password=$phone_number=$address=$RegisterUser=$response="";
$today=date('Y-m-d');
if(isset($_POST['RegisterUser'])){

    $user_name=$_POST['user_name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone_number=$_POST['phone_number'];
    $address=$_POST['department'];

    $alluser="SELECT * FROM `customers` WHERE customer_email='$email' ";
    $alluserresult=mysqli_query($db,$alluser);

    if(mysqli_num_rows($alluserresult)>0){
        $response=0;
        echo $response; 
        
      }

else{
$createuser="INSERT INTO `customers`(`customer_name`, `customer_phone`, `customer_address`, `created_at`, `customer_email`, `customer_pass`) 
VALUES ('$user_name','$phone_number','$address','$today','$email','$password')";
$result=mysqli_query($db,$createuser);
$response=1;
echo $response; 
  
}
exit();


}


?>
