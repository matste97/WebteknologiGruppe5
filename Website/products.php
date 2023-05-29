<?php 

session_start();
include("include/dbConfig.php");
include("include/functions.php");



?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include("head.php"); ?>
   <link rel="stylesheet" href="product.css">
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
    <div class="loader hide"></div>
<div class = "products">
  
    <div class = "container">
        <h1 class = "lg-title">Our products</h1>
        <p class = "text-light">To ensure an excellent gaming experience.</p>

        <div class = "product-items">
            <?php
               $products = get_products($db);
            
            foreach($products as $product) {
            
            ?>
                <!-- single product -->
                <div class = "product">
                    <div class = "product-content">
                        <div class = "product-img">
                            <img src="admin/<?=$product['product_image'];?>" alt = "Headset for office work and gaming">
                        </div>
                        <div class = "product-btns"> 
                            <button type = "button" class = "btn-cart add-to-cart" data-id="<?=$product['product_id'];?>" data-name="<?=$product['product_name'];?>"  data-price="<?=$product['product_price'];?>"> add to cart
                              
                            </button>
                        </div>
                    </div>
    
                    <div class = "product-info">
                        <div class = "product-info-top">
                            <!--<h2 class = "sm-title">Gaming</h2>-->
    
                        </div>
                        <a href = "product-detail.php?id=<?= $product['product_id'] ?>" class = "product-name"><?=$product['product_name'];?></a>
                        <p class = "product-price"><?=$product['product_price'];?> NOK</p>
                    </div>
                </div>
                <!-- end of single product -->
            
            <?php } ?>
        </div>
    </div>
</div>




    <?php include("footer.php"); ?>

<script src="script.js"></script>
    <script>
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
           // Get response from PHP page (echo or print)
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