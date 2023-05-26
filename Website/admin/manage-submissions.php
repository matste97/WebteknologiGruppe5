<?php

session_start();
include('include/dbConfig.php');
include('include/functions.php');

if(!isset($_SESSION['admin_login'])) {
    ?>
    <script>window.location.href="../login.php"</script>
    <?php
}


$success = $error = $upload = false;
if (isset($_POST['add_category'])) {

  $upload = false;
  $error = false;
  $success = false;
  // echo '<pre>';
  $post_data = $_POST;
  $query = $db->query("SELECT * FROM categories WHERE 	cat_name = '" . $_POST['cname'] . "' ");
  if (mysqli_num_rows($query) == 0) {

    $upload_dir = "";

    $image = $_FILES['cimage'];

    $image_name = basename($image['name']);
    $image_temp = $image['tmp_name'];
    $product_dir = '';
    //  $product_dir = $upload_dir."[".date('Y-m-d h:i:s')."]".$_POST['name']."/";
    $prod_path = "[" . date('Y-m-d h:i:s') . "]" . $_POST['name'] . "/" . $image_name;
    // if(!is_dir($product_dir)) {
    //    mkdir($product_dir);
    //  }

    // $image_path = $product_dir.$image_name;
    // echo $image_path;
    if (file_exists($image_name)) {

      $image_name = date("Y-m-d h:i:s") . "_" . $image_name;
    }
    $image_path = $product_dir . $image_name;
    if (move_uploaded_file($image_temp, "$image_name")) {


      // die($image_path);
      $query = "INSERT INTO `categories`(`cat_name`,`cat_image`) VALUES ('". $_POST['cname'] . "','" . $image_name . "')";
      echo $query;

      if (mysqli_query($db, $query)) {
        // print_r($_FILES['gallery_images']);
   
        $success = true;
        echo  $success;
      }
    } else {
?>
      <script>
        alert("File upload error");
      </script>
<?php
    }
  } else {
    $error = true;
  }
}


if (isset($_POST['update_category_info'])) {
  $query = "UPDATE categories SET cat_name = '" . $_POST['cname'] . "' WHERE cat_id = " . $_POST['cat_id'];

  if (mysqli_query($db, $query)) {
    // insert_log("Product Information Updated", "(".$_POST['name'].")  updated with data ( ".$_POST['name'].", ".$_POST['desc']." )" , $db);
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



  <?php if ($success == true) { ?>
    <div class="responce_popup alert alert-success alert-dismissible" role="alert">
      Successfully Updated
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>
  <?php } ?>

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
                <li class="li_0"><a to="/"> Manage Categories</a> </li>
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
            <h5> > Contact Submissions</h5>
          </div>




          <div class="student_data_tabel_header">
            <div class="datatable_custom_search_field">
              <i class="fal fa-search"></i>
              <input id="custom_datatable_search_field" type="text" placeholder="Search Here">
            </div>
          </div>

          <table id="record_data_tabel" class="table table-striped table-bordered" style="width:100%">


            <thead>
              <tr>
                <th>Sr. #</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <?php
              $query = $db->query("SELECT * FROM submissions  ORDER BY sub_date DESC");
              $count = 1;
              while ($row = $query->fetch_assoc()) {
              ?>
                <tr>
                  <td><?=$row['sub_id'];?></td>
                  <td><?=$row['sub_name'];?></td>
                  <td><?=$row['sub_email'];?></td>
                  <td><?=$row['sub_phone'];?></td>
                  <td><?=$row['sub_message'];?></td>
                  <td><?php echo $row['sub_date']; ?></td>
                </tr>
              <?php
                $count++;
              }
              ?>
            </tbody>

        </div>
      </div>
    </div>
  </div>

</body>

</html>