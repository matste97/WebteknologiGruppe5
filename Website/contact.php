<!DOCTYPE html>
<html lang="en">

<?php
session_start();
?>

<head>
  <?php include("head.php"); ?>
</head>

<body>

<?php include("header.php"); ?>



<div class="container">
    <link rel="stylesheet" href="contact.css">
    <h1>Contact Us</h1>
    <form>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message</label>
        <textarea id="message" name="message" required></textarea>

        <input type="submit" value="Submit">
    </form>
</div>

<?php include("footer.php"); ?>

<script src="script.js"></script>


<script>

    $('.mobile_res_toggle_btn').click(function () {
    $('.mobile_res_toggle_content').toggleClass('responsive_bar');
});
$('.test').click(function () {
    $('.wrapper').toggleClass('active-popup');
});
      
      </script>
</body>

</html>