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
if (isset($_POST['add_product'])) {

  $upload = false;
  $error = false;
  $success = false;
  // echo '<pre>';
  $post_data = $_POST;
//   $query = $db->query("SELECT * FROM products WHERE product_name = '" . $_POST['name'] . "' ");
//   if (mysqli_num_rows($query) == 0) {

   // from here image upload in the folder and its link generate in database

    $upload_dir = "";

    $image = $_FILES['image'];

    $image_name = basename($image['name']);
    $image_temp = $image['tmp_name'];
    $product_dir = '';

    $prod_path = "[" . date('Y-m-d h:i:s') . "]" . $_POST['name'] . "/" . $image_name;

     // this condition check same image file is already exists or not
    if (file_exists($image_name)) {

      $image_name = date("Y-m-d h:i:s") . "_" . $image_name;
    }
    $image_path = $product_dir . $image_name;

     // this condition check if image move to the folder then its insert product in database
    if (move_uploaded_file($image_temp, "$image_name")) {


      $query = "INSERT INTO `products`(`product_name`,`product_desc`, `product_price`, `product_image`,`created_at`) VALUES ('" . $_POST['name'] . "', '" . $_POST['desc'] . "', '" . $_POST['price'] . "', '" . $image_name . "', '" . date('Y-m-d h:i:s') . "')";
    //   echo $query;

      if (mysqli_query($db, $query)) {
        // print_r($_FILES['gallery_images']);

        $success = true;
      }
    } else {
?>
      <script>
        alert("File upload error");
      </script>
<?php
    }
//   } else {
//     $error = true;
//   }
}

// this condition is for to update the product

if (isset($_POST['update_product_info'])) {
  $query = "UPDATE products SET product_name = '" . $_POST['name'] . "' , product_desc = '" . $_POST['desc'] . "' WHERE product_id = " . $_POST['product_id'];

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
                <li class="li_0"><a to="/"> Manage Products</a> </li>
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
            <h5> > Manage Products</h5>
          </div>


          <div>


            <form action="" method="post" enctype="multipart/form-data">
              <div class="form_design_one_content_box">
                <div class="form_design_one_field_box">
                  <div class="form_design_one_single_field_box">
                    <span>PRODUCT NAME</span>
                    <input type="text" id="basic-default-name" name="name" placeholder=" " required />

                  </div>
                  <label class="error" generated="true" for="room_num"></label>
                </div>
                <div class="form_design_one_field_box">
                  <div class="form_design_one_single_field_box">
                    <span>PRODUCT PRICE</span>
                    <input type="number" id="basic-default-name" name="price" placeholder="" required />

                  </div>
                  <label class="error" generated="true" for="room_length"></label>
                </div>
             


                <div class="form_design_one_field_box">
                  <div class="form_design_one_single_field_box textarea">
                    <span>PRODUCT DESC</span>
                    <textarea id="basic-default-company" rows="5" name="desc" placeholder="" required></textarea>

                  </div>
                  <label class="error" generated="true" for="room_width"></label>
                </div>

                <div class="form_design_one_field_box">
                  <div class="form_design_one_single_field_box">
                    <span>FEATURED IMAGE</span>
                    <input type="file" name="image" accept="image/*" required>
                  </div>
                  <label class="error" generated="true" for="room_width"></label>
                </div>



                <div class="form_design_one_submit_btn">

                  <button type="submit" name="add_product">Add</button>
                </div>
              </div>
            </form>

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
                <th>Delete</th>
                <th>Edit</th>
                <th>Image</th>
                <th>Name</th>
                <th>Date Added</th>

              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <?php

              $query = $db->query("SELECT * FROM products  ORDER BY product_id DESC");
              $count = 1;
              while ($row = $query->fetch_assoc()) {
              ?>
                <tr data-product-row-id="<?php echo $row['product_id']; ?>">
                  <td>

                    <button type="button" class="delete_product" data-id="<?php echo $row['product_id']; ?>">
                      <i class="fas fa-trash-alt"></i>
                    </button>

                  </td>
                  <td>
                    <!-- <button type="button" class="btn btn-sm btn-primary float-end" data-id="<?php echo $row['product_id']; ?>" data-bs-toggle="modal" data-bs-target="#updateproduct<?php // echo $count; 
                                                                                                                                                                                          ?>">
                  <i class='fa fa-edit'></i>
                    </button> -->
                    <button type="button" class="" data-toggle="modal" data-id="<?php echo $row['product_id']; ?>" data-target="#updateproduct-<?php echo $count; ?>">
                      <i class='fa fa-edit'></i>
                    </button>

                  </td>
                  <td>
                    <a class="" style="width: 70px; height:70px; display: flex; flex-direction: row;align-items: center;justify-content: center; cursor: pointer">
                      <img src="<?php echo $row['product_image']; ?>" name="" class="rounded w-100 ">
                    </a>
                  </td>
                  <td><?php echo $row['product_name']; ?></td>

                  <td> <?php echo date("F j, Y, g:i a", strtotime($row['created_at'])); ?></td>
                </tr>
                <div class="add_student_modal modal fade" id="updateproduct-<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="updateproduct-<?php echo $count; ?>" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-slideout" role="document">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update info</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                     
                      <form action="" method="post">
                           <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                        <div class="form_design_one_content_box">



                          <div class="form_design_one_field_box">
                            <div class="form_design_one_single_field_box">
                              <span>Product Name</span>
                              <input type="text" id="nameBasic" placeholder="Enter Name" name="name" value="<?php echo $row['product_name'];  ?>">

                            </div>
                            <label class="error" generated="true" for="room_num"></label>
                          </div>
                          <div class="form_design_one_field_box">
                            <div class="form_design_one_single_field_box">
                              <span>Product Description</span>
                              <textarea placeholder="Enter description" rows="6" name="desc"><?php echo $row['product_desc'];  ?></textarea>

                            </div>
                            
                            <label class="error" generated="true" for="room_length"></label>
                          </div>
                          


                          <div class="form_design_one_submit_btn">

                            <button type="submit" class="add_room_btn" name="update_product_info">Save changes</button>
                          </div>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>

              <?php
                $count++;
              }
              ?>
            </tbody>

        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
    $(document).ready(function(){

    
			
       $(".delete_product").click(function(){
                // alert("yes");
                // $("#edit_modal_temp_div").addClass("preloader");
                
                delete_id = $(this).data("id");
                  $("tr[data-product-row-id='"+delete_id+"']").css('background', '#ff9c9c');
                $.ajax({
                  url: "ajax_files/delete_product.php",
                  method: "GET",
                  data: { id : delete_id },
                  success: function(data){
                    // alert("Data: " + data);
                    var response = jQuery.parseJSON(data);
                    console.log(response.result);
                    var new_data = response.result;
                    if(new_data.removed_records!=""){
                         setTimeout(
                          function() 
                          {
                            $("tr[data-product-row-id='"+delete_id+"']").fadeOut(300, function(){ 
                                $(this).remove();
                            });

                             
                          }, 1000);
                    }
                    
                  }
                });
                setTimeout(
                  function() 
                  {
                     $("#edit_modal_temp_div").removeClass("preloader");
                  }, 500);
                // console.log(modal_id);    
            }); 
    });
        
    </script>
</body>

</html>