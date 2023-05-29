
<?php
session_start();
include("include/dbConfig.php");
include("include/functions.php");
$desc="";

// Cheking if cart is not empty
if(!isset($_SESSION['cart'])){
    ?>
    <script>window.location.href="index.php"</script>
    <?php

}
// Cheking if cart is having no items
if(count($_SESSION['cart'])==0){
?>
<script>window.location.href="index.php"</script>
<?php
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <?php include("head.php"); ?>
    <link rel="stylesheet" type="text/css" href="css/cart_page.css">
    <style>
        .shopping_cart_single_product_discription {
            width: 100%;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>


<?php include("header.php"); ?>
<!--Preploader for the website-->
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

<section class="product_shopping_cart_section">
    <div class="custom_container">

        <div class="shopping_cart_main_box">

            <!-- cart product list section start  -->
            <div class="shopping_cart_product_list_box">

                <div class="shopping_cart_product_heading">
                    <div class="shopping_cart_product_heading_left">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>

                <div class="shopping_cart_product_list_main">
                    <div class="shopping_cart_product_list_header">
                        <ul>
                            <li style="width: 13%;"><p>Product</p></li>
                            <li style="width: 27%;"><p>Description</p></li>
                            <li style="width: 22%;"><p>Price</p></li>
                            <li style="width: 22%;"><p class="cart_page_center_align_class">Quantity</p></li>
                            <li style="width: 16%;"><p >Subtotal</p></li>
                        </ul>
                    </div>
                    <div class="shopping_cart_product_list_content">
                        <?php
                        $total=(float) 0;
                        // Fetching items from the cart
                        foreach ($_SESSION['cart'] as $key=> $val){
                            $query = $db->query("SELECT * FROM products WHERE product_id = ".$_SESSION['cart'][$key]['id']);
                            while($data = $query->fetch_assoc()){
                                $desc = $data['product_desc'];
                                $image = $data['product_image'];
                            }

                            ?>
                            <div class="shopping_cart_product_list_content_box" id="row<?=$_SESSION['cart'][$key]['id']?>">
                                <ul>
                                    <li style="width: 13%;">
                                        <div class="shopping_cart_product_list_header_responsive"><p>Product</p></div>
                                        <div class="shopping_cart_single_product_img"><img src="admin/<?php echo $image ?>" alt="imge"></div>
                                    </li>
                                    <li style="width: 27%;">
                                        <div class="shopping_cart_product_list_header_responsive"><p>Description</p></div>
                                        <div class="shopping_cart_single_product_discription"><p><?=$_SESSION['cart'][$key]['name'];?></p></div>
                                    </li>
                                    <li style="width: 22%;">
                                        <div class="shopping_cart_product_list_header_responsive"><p>Price</p></div>
                                        <div class="shopping_cart_single_product_price"> <p> <?=$_SESSION['cart'][$key]['price'];?>&nbsp;NOK</p></div>
                                    </li>
                                    <li style="width: 22%;" class="product_qty_btn_center_align_class">
                                        <div class="shopping_cart_product_list_header_responsive"><p>Quantity</p></div>
                                        <div class="shopping_cart_single_product_qty_btn">
                                            <a class="counter_minus_btn" data-id="<?=$_SESSION['cart'][$key]['id']?>"><i class="fa fa-minus"></i></a>
                                            <span id="product_quantity<?=$_SESSION['cart'][$key]['id']?>"><?= $_SESSION['cart'][$key]['quantity']; ?></span>
                                            <a class="counter_plus_btn" data-id="<?=$_SESSION['cart'][$key]['id']?>"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </li>
                                    <li style="width: 16%;position: relative;">
                                        <div class="shopping_cart_product_list_header_responsive"><p>Subtotal</p></div>
                                        <div class="shopping_cart_single_product_subtotal">
                                            <div class="shopping_cart_single_product_subtotal_prices">
                                                <p><?=$_SESSION['cart'][$key]['price']*$_SESSION['cart'][$key]['quantity'];?>&nbsp;NOK</p> <span class="remove_from_cart_btn" data-id="<?=$_SESSION['cart'][$key]['id']?>"> <i class="fas fa-times"></i></span></i>
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <?php
                            // Iterating to get the cart total price amount
                            $total+=$_SESSION['cart'][$key]['price']*$_SESSION['cart'][$key]['quantity'];
                        } ?>

                    </div>
                </div>



            </div>
            <!-- cart product list section End  -->


            <!-- Cart bill Summary section start -->
            <div class="checkout_page_box_two">
                <div class="shopping_cart_total_bill_box">
                    <div class="shopping_cart_total_bill_box_heading"><h5>Cart Summary</h5></div>


                    <div class="shopping_cart_total_bill_divider"></div>



                    <div class="shopping_cart_total_bill_divider"></div>

                    <div class="shopping_cart_total_bill_final_price_box"><p>Est.Total</p><span><?php echo   $total ?>&nbsp;NOK</span></div>

                    <div class="shopping_cart_total_bill_proceeding_btn"><a href="checkout_page.php">Proceed to Checkout</a></div>
                </div>

            </div>
            <!-- Cart bill Summary section End -->

        </div>
</section>



<?php include("footer.php"); ?>

<script>
    // Function to check if cart is not empty
    function check_cart() {

        $.ajax({
            url: "ajax_files/update_cart.php",
            type: "post",
            data: {action: "check"},
            success: function (response) {
                console.log(response);
                // $(this).parent().children("span").html("");
                if(response == 0 ){
                    window.location.href="index.php";
                }

                // get response from your PHP page (what you echo or print)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }
    // A click event when you decrease item quantity from cart
    $(".counter_plus_btn").click(function(){
        $(".loader").removeClass("hide");
        var id = $(this).data("id");
        var quantity = 1;

        $.ajax({
            url: "ajax_files/update_cart.php",
            type: "post",
            data: {id: id, action: "plus"},
            success: function (response) {
                console.log(response);
                // $(this).parent().children("span").html("");
                if(response != 0 ){
                    $("#product_quantity"+id).html(response);
                } else {
                    $("#row"+id).remove();
                }
                $(".loader").addClass("hide");
                // get response from your PHP page (what you echo or print)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
        check_cart();

    });
    // A click event when you increase item quantity from cart
    $(".counter_minus_btn").click(function(){
        $(".loader").removeClass("hide");
        var id = $(this).data("id");
        var quantity = 1;

        $.ajax({
            url: "ajax_files/update_cart.php",
            type: "post",
            data: {id: id, action: "minus"},
            success: function (response) {
                console.log(response);
                // $(this).parent().children("span").html("");
                if(response != 0 ){
                    $("#product_quantity"+id).html(response);
                } else {
                    $("#row"+id).remove();
                }
                $(".loader").addClass("hide");
                // You will get response from your PHP page (what you echo or print)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
        check_cart();


    });
    // A click event when you remove  an item from cart
    $(".remove_from_cart_btn").click(function(){
        $(".loader").removeClass("hide");
        var id = $(this).data("id");
        var quantity = 1;

        $.ajax({
            url: "ajax_files/update_cart.php",
            type: "post",
            data: {id: id, action: "remove"},
            success: function (response) {
                console.log(response);
                // $(this).parent().children("span").html("");
                if(response != 0 ){
                    $("#product_quantity"+id).html(response);
                } else {
                    $("#row"+id).remove();
                }
                $(".loader").addClass("hide");
                // You will get response from your PHP page (what you echo or print)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
        check_cart();


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