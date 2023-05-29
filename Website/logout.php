<?php 

session_start();

// clearing all the session variables
$_SESSION['login_user'] = '';
$_SESSION['login_id'] = '';

// destroying and unset the session from browser to make it log out
session_unset();
session_destroy();


// redirect to login after logging out
?>
<script>window.location.href="index.php"</script>