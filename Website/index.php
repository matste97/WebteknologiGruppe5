
<?php
session_start();
include("include/dbConfig.php");
include("include/functions.php");
$success = false;
if(isset($_POST['submit_sub'])){
    $today=date('Y-m-d');
    if(mysqli_query($db, "INSERT INTO submissions (sub_name, sub_phone, sub_email, sub_message,sub_date) VALUES ('".$_POST['name']."', '".$_POST['phone']."', '".$_POST['email']."', '".$_POST['message']."','$today') ")){
        $success = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php include("head.php"); ?>
</head>

<body>
<?php include("header.php"); ?>
    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 999999;
            background: url("https://static.tossdown.com/site/b8103262-e706-425b-807e-4d9e65dfba0b.gif") 50% 50% no-repeat rgb(249,249,249);
            opacity: 1 !important;
        }
        .hide {
            display: none !important;
        }
      </style>
      <?php if ($success == true) { ?>
      <div class="alert alert-success alert-dismissable p-2" style="
    position: fixed;
    top: 0px;
    left: 0px;
    right: 0px;
    z-index: 99999;
    border-radius: 0 !important;
"><a href="#" class="close" data-dismiss="alert" aria-label="close" style="
    position: absolute;
    top: 5px;
    right: 10px;
    font-size: 20px;
    text-decoration: none;
">×</a>
    
    <p align="center" class="w-100 m-0 p-0">Message Sent</p>
</div>

<?php } ?>
    <div class="loader hide"></div>
   

    <!-- hero -->
    <section class="hero">
        <div class="container">
            <div class="row banner_data">
                <div class="col-md-6 m-auto p-4">
                    <h1 class="mb-3">
                        Cyberpunk Gaming Gear for the Future-Focused
                    </h1>
                    <p>
                        Unleash Your Inner Hacker with Our High-Tech Gaming Accessories and Apparel
                    </p>

                    <a href="products.php" class="btn btn-outline-danger px-5 py-3 text-danger rounded-pill">
                        Shop Now
                    </a>
                </div>
                <div class="col-md-6">
                    <img src="product-images/Headphones-PNG-Image.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section>
    <!-- hero -->


    <!-- top products -->
    <section class="top py-5">
        <div class="container">
            <div class="text-center">
                <h2>
                    Top Products
                </h2>
            </div>

            <div class="row mt-4 ">
                <?php 
                // getting products from database // function call from functions.php
                $products = get_home_products($db);
                
                // Looping to get all items listed 
                foreach($products as $product){
                ?>
                    <div class="col-md-4 p-3">
			<div class="card position-relative">
                           <span class="category"><?= get_category_name($db, $product['cat_id']);?></span> 
                            <img src="admin/<?=$product['product_image'];?>" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <p class="card-text"><small class="text-success">In Stock</small></p>
                                
                                <!--Product name-->
                                <h5 class="card-title"><?=$product['product_name'];?></h5>
                                
                                <!--Product Description-->
                                <p class="card-text">
                                  <?=$product['product_desc'];?>
                                </p>
                                
                                <!--Price -->
                                <p class="card-text">Price:
                                
                                    <span class="sell-price"> <?=$product['product_price'];?>&nbsp;NOK</span></p>
                              
                                <!--view details button to open the product in the new page and view details -->
                                <div class="d-flex justify-content-center align-items-center">
                                    <a class="btn btn-add-cart" href="product-detail.php?id=<?=$product['product_id'] ?>">
                                       View Details
                                    </a>
                                    <!-- Add the item in the cart -->
                                    <button class="btn btn-add-cart add-to-cart" data-id="<?=$product['product_id'];?>" data-name="<?=$product['product_name'];?>" data-price="<?=$product['product_price'];?>" >
                                        Add to Cart
                                    </button>
                                </div>
    
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- top products -->

    <!-- about -->
    <section class="about">
        <div class="container">
            <div class="text-center">
                <h2>About Us</h2>
            </div>

            <div class="row mt-4 home_about_content">
                <div class="col-md-6 mb-4">
                  <div class="card border-0 h-100">
                    <div class="card-body">
                      <h5 class="card-title">Who We Are</h5>
                      <p class="card-text">We are a team of passionate gamers who love to bring the latest gaming gear and accessories to fellow gamers all over the world. With years of experience in the industry, we are dedicated to providing our customers with the best possible gaming experience through our products and services.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="card border-0 h-100">
                    <div class="card-body">
                      <h5 class="card-title">Our Mission</h5>
                      <p class="card-text">Our mission is to empower gamers with the tools they need to take their gaming experience to the next level. We strive to provide high-quality, innovative products at affordable prices, while delivering exceptional customer service and support. Our goal is to create a community of passionate gamers who share our love for gaming and technology.</p>
                    </div>
                  </div>
                </div>
              </div>
              
        </div>
    </section>
    <!-- about -->


    <!-- contact -->
    <section class="contact-us">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <h2 class="text-center mb-4">Contact Us</h2>
              <form id="contact-form" action="" method="POST">
                <div class="form-group mb-4">
                  <label for="name">Name *</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group mb-4">
                  <label for="phone">Phone *</label>
                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                </div>
                <div class="form-group mb-4">
                  <label for="email">Email *</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group mb-4">
                  <label for="message">Message *</label>
                  <textarea class="form-control" id="message" name="message" rows="6" placeholder="Enter your message" required></textarea>
                </div>
                <div class="text-right mb-4">
                  <button type="submit" name="submit_sub" class="btn btn-add-cart">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      
    <!-- contact -->

    <?php include("footer.php"); ?>

   

    <script>
    // Click event to add the item in the cart
    $(".add-to-cart").click(function(){
        $(".loader").removeClass("hide");
        var id = $(this).data("id");
        var name = $(this).data("name");
        var price = $(this).data("price");
        var quantity = 1;
        
        $.ajax({
            url: "ajax_files/add_to_cart.php",
            type: "post",
            data: {id: id, name: name, price: price, quantity: quantity},
            success: function (response) {
                console.log(response);
                var cart_total_quantity = response;
                $(".cart_total").html("");
                $(".cart_total").html(cart_total_quantity);
                $(".loader").addClass("hide");
               // You will get response from your PHP page (what you echo or print)
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
        
        
    });
    
    $('.mobile_res_toggle_btn').click(function () {
    $('.mobile_res_toggle_content').toggleClass('responsive_bar');
});
$('.test').click(function () {
    $('.wrapper').toggleClass('active-popup');
});
      
      </script>

</body>

</html>
