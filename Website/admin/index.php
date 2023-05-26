<?php 

session_start();
include('include/dbConfig.php');
include('include/functions.php');


if(!isset($_SESSION['admin_login'])) {
    ?>
    <script>window.location.href="../login.php"</script>
    <?php
}


if(isset($_GET['change_status'])){
    
    $query = "UPDATE orders SET order_status = '".$_GET['change_status']."' WHERE order_id =".$_GET['id'];
    if(mysqli_query($db, $query)){
          $success = true;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="CSS-Files/form.css">
  <link rel="stylesheet" type="text/css" href="CSS-Files/Library.css">
  <link rel="stylesheet" type="text/css" href="CSS-Files/stylemain.css">


  <link rel="manifest" href="%PUBLIC_URL%/manifest.json" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">

  <!-- fontawsome link start-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

  <!-- fontawsome link end -->


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>



  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

  <script src="script/app.js"></script>

</head>

<body>


  <div class="responce_popup alert fade" role="alert">
    <p></p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <?php include('include/sidebar.php'); ?>

  <div class="content-section">
    <section class="dashboard-header">
      <div class="header-container">
        <div class="web_header_main">
          <div class="web_header_0">
            <ul class="web_header_0_list_0">
              <li class="li_0 web_header_logo">
                <a class="header-hamburger-btn">
                  <i class="ri-menu-fill hamburger_img"></i>
                </a>
              </li>
              <ul class="web_header_0_list_1">
                <li class="li_0"><a to="/"> Dashboard</a> </li>
              </ul>
            </ul>
            <ul class="web_header_0_list_2">
              <li class="li_0"> </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <div class="content-section-main">
      <div class="content-container">
        <div class="responsive_content_manage">
          <div class="pagination-list">
            <h5> > Dashboard</h5>
          </div>

          <div class="dashboard_details">
          <div class="dashboard_box"> 
          <h3>
            <?php echo count_records("orders", $db); ?> Orders</h3>
            <a href="manage-orders.php">View Orders</a>       
           </div> 
           <div class="dashboard_box"> 
          <h3>
          <?php echo count_records("products", $db); ?> Items</h3>
            <a href="manage-products.php">View Products</a>       
           </div>               
        </div>
      </div>
    </div>
  </div>

</body>

</html>