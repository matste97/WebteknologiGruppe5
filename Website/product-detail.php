

<?php 
session_start();
include("include/dbConfig.php");
if(!isset($_GET['id'])) {
    ?>
    <script>
        window.location.href="index.php";
    </script>
    <?php
}

// get the product details with respect to the product id in the URL
$query = $db->query("SELECT * FROM products WHERE product_id = ".$_GET['id']);
$detail = '';

//adding data to the array
while($data = $query->fetch_assoc()) {
    $detail = $data;    
}

?><!DOCTYPE html>
<html lang="en">

<head>
<?php include("head.php"); ?>
</head>

<body>
<?php include("header.php"); ?>

    <div class="pt-100"></div>
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

    <!--// displaying product details-->
    <div class="container pt-100 py-5">
        <div class="row">
            <!--product image-->
            <div class="col-md-6">
                <img src="admin/<?=$detail['product_image'];?>" class="img-fluid"
                    alt="Product Image">
            </div>
            <div class="col-md-6 mt-5">
                <!--name-->
                <h1><?=$detail['product_name'];?></h1>
                <p class="lead"></p>
                <hr>
                <!--price-->
                <p class="text-muted">Price: <?=$detail['product_price'];?>&nbsp; NOK</p>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" value="1" id="quantity" min="1" max="10" >
                </div>
                <div class="col-md-12 mt-5">
                    <h3>Product Details</h3>
                    <!--description-->
                    <p><?=$detail['product_desc'];?></p>
                </div>
                <!--add to cart button-->
                <button class="btn btn-dark btn-cart mt-5 btn-block add-to-cart" data-id="<?=$detail['product_id'];?>" data-name="<?=$detail['product_name'];?>" data-price="<?=$detail['product_price'];?>">Add to Cart</button>
            </div>
        </div>
    </div>


    <footer>
        <p>This website is a result of a university group project, performed in the course <a href="https://www.ntnu.edu/studies/courses/IDATA2301#tab=omEmnet">IDATA2301 Web
            technologies</a>, at <a href="https://www.ntnu.edu/">NTNU</a>. <br>All the information provided here is a result of imagination. Any
            resemblance with real companies or products is a coincidence.</p>
    </footer>

    <script src="script.js"></script>
    <!--click event for add to cart-->
    <script>
    $(".add-to-cart").click(function(){
        $(".loader").removeClass("hide");
        var id = $(this).data("id");
        var name = $(this).data("name");
        var price = $(this).data("price");
        var discount = $(this).data("discount");
        var quantity = $("#quantity").val();
        
        $.ajax({
            url: "ajax_files/add_to_cart.php",
            type: "post",
            data: {id: id, name: name, price: price, quantity: quantity, discount: discount},
            success: function (response) {
                console.log(response);
                var cart_total_quantity = response;
                $(".cart_total").html("");
                $(".cart_total").html(cart_total_quantity);
                $(".loader").addClass("hide");
               // gets response from PHP page (what you echo or print)
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