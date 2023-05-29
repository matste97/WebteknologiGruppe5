<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
include("include/dbConfig.php");
include("include/functions.php");

// check the cart is not empty
if(!isset($_SESSION['cart'])){
    ?>
    <script>window.location.href="index.php"</script>
    <?php

}
if(count($_SESSION['cart'])==0){
    ?>
    <script>window.location.href="index.php"</script>
    <?php
}
if(!isset($_SESSION['login_user'])) {

    ?>
    <script>window.location.href="login.php"</script>
    <?php


}

// If order button is pressed

if(isset($_POST['place_order'])){

    //getting cart
    $cart = $_SESSION['cart'];
    // check existing order
    $temp_id = uniqid('r_', true);

    // Calling a function (from functions.php) to check If order exists with the same (Order #) as current (Order #) then create a new one.
    if(check_existing_order($temp_id, $db)==0){

        $temp_id = uniqid('r_', true);

    }
    // Take all items from the cart to insert into database
    $order_items = "INSERT INTO `order_items`( `product_id`, `quantity`, `price`, `created_at`, `order_id`) VALUES ";
    $values = array();

    foreach($cart as $key => $val){
        $order_items_query = '';
        $order_items_query .= "(".$cart[$key]['id'].", ";
        $order_items_query .= $cart[$key]['quantity'].", ";
        $order_items_query .= $cart[$key]['price'].", ";
        $order_items_query .= " '".date("Y-m-d")."' , ";
        $order_items_query .= "'".$temp_id."' ) ";
        array_push($values, $order_items_query);
    }

    $order_items .= implode(", " ,$values);

    // the customer who is logged in is placing the order
    $customer_id = $_SESSION['login_id'];
    // the final order # which is unique
    $order_id = $temp_id;

    // place the order with the above parameters and if order is placed then redirect to the thank you page.
    if(add_order($db, $order_id, $customer_id, $_POST['address'], $order_items)){ // function call from functions.php
        ?>
        <script>window.location.href="thank_you.php"</script>
        <?php
    }



}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/checkout_page.css">
    <link rel="stylesheet" type="text/css" href="css/cart_page.css">
    <?php include("head.php") ?>
</head>
<body>


<?php include("header.php") ?>


<div class="checkout_page_section">
    <div class="custom_container">
        <form  action="" method="post">
            <div class="checkout_page_box">

                <!-- checkout details section start  -->
                <div class="checkout_page_box_one">

                    <div class="shopping_cart_product_list_box checkout_page_review_order">

                        <div class="shopping_cart_product_heading">
                            <div class="shopping_cart_product_heading_left">
                                <h2>Review order</h2>
                            </div>

                        </div>

                    </div>


                    <div class="check_out_verification_steps">
                        <div class="check_out_shipping_method_box">
                            <div class="check_out_verification_steps_heading">
                                <h2>1. Choose Shipping Method</h2>
                            </div>
                            <div class="check_out_shipping_method_btns">
                                <a id="type_delivery_location">
                                    <i class="fas fa-truck" id="toggle_truck_icon"></i>
                                    <i class="fas fa-check" id="toggle_tick_icon"></i>
                                    <span id="toggle_delivery_text_color">Delivery</span>
                                </a>
                                <a id="select_pickup_location" style="display: none">
                                    <i class="fas fa-map-marker-alt" id="toggle_location_icon"></i>
                                    <i class="fas fa-check" id="toggle_location_tick_icon"></i>
                                    <span id="toggle_pickup_text_color">Pickup</span>
                                </a>
                            </div>

                            <div class="check_out_shipping_method_box_pick_up_location_selector" id="check_out_pick_up_location_selector">
                                <label>Choose pickup location</label>
                                <select>Store location</select>
                            </div>

                        </div>

                        <div class="check_out_delivery_detail_box" id="type_delevery_address">
                            <div class="check_out_verification_steps_heading">
                                <h2>2. order Details</h2>
                            </div>

                            <div class="check_out_delivery_form_box">

                                <div class="check_out_delivery_form_content">
                                    <div class="check_out_delivery_form_fields_box">
                                        <div class="check_out_delivery_form_fields">
                                            <label>Full name*</label>
                                            <input type="text" placeholder="Enter your full name" name="fullname" required>
                                        </div>
                                        <div class="check_out_delivery_form_fields">
                                            <label>Contact no.*</label>
                                            <input type="text" placeholder="Your contact number" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="check_out_delivery_form_fields">
                                        <label>Complete address*</label>
                                        <input type="text" placeholder="Enter your full address" name="address" required>
                                    </div>
                                    <div class="check_out_delivery_form_fields">
                                        <label>Door/appartment/suit(Optional)</label>
                                        <input type="text" placeholder="Enter your door/appartment/suit No." name="address_two">
                                    </div>
                                    <div class="check_out_delivery_form_fields">
                                        <label>Special Instructions(Optional)</label>
                                        <textarea cols="20" rows="5" type="text" placeholder="Write your message here....." name="note"></textarea>
                                    </div>
                                </div>

                            </div>

                        </div>






                        <div class="check_out_payment_method_box">
                            <div class="check_out_payment_method_heading">
                                <h2>3. Payment Details</h2>

                            </div>
                            <div class="check_out_payment_card_form">
                                <form>
                                    <div class="check_out_payment_card_form_field">
                                        <label>Card Number</label>
                                        <input type="number" placeholder="xxxx xxxx xxxx xxxx" maxlength="16" onKeyPress="if(this.value.length==16) return false;">
                                    </div>
                                    <div class="check_out_payment_card_form_field">
                                        <label>MM/YY</label>
                                        <input type="date" placeholder="01/21">
                                    </div>
                                    <div class="check_out_payment_card_form_field">
                                        <label>CVV</label>
                                        <input type="number" placeholder="*" class="single_card_field">
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>








                </div>
                <!-- checkout details section End  -->

                <?php
                // fetching  total price from cart
                $total=(float) 0;
                foreach ($_SESSION['cart'] as $key=> $val){
                    $total+=$_SESSION['cart'][$key]['price']*$_SESSION['cart'][$key]['quantity'];
                } ?>


                <!-- Cart bill Summary section start -->
                <div class="checkout_page_box_two">
                    <div class="shopping_cart_total_bill_box">
                        <div class="shopping_cart_total_bill_box_heading"><h5>Cart Summary</h5></div>


                        <div class="shopping_cart_total_bill_divider"></div>



                        <div class="shopping_cart_total_bill_divider"></div>

                        <div class="shopping_cart_total_bill_final_price_box"><p>Est.Total</p><span><?=$total;?>&nbsp;NOK</span></div>

                        <div class="shopping_cart_total_bill_proceeding_btn" ><input type="submit" name="place_order" id="place_order" value="Place Order"> </div>
                    </div>

                </div>

                <!-- Cart bill Summary section End -->

            </div>
        </form>
    </div>
</div>

<?php include("footer.php") ?>



<script>
    // $("#place_order").click(function(){

    //   $("#checkout_form").submit();

    // });
    $("#type_delivery_location").click(function () {

        $("#toggle_tick_icon").css("display", "block");
        $("#toggle_truck_icon").css("display", "none");
        $("#type_delivery_location").css("background", "#0F994B");
        $("#toggle_tick_icon").css("color", "#ffffff");
        $("#toggle_delivery_text_color").css("color", "#ffffff");


        $("#select_pickup_location").css("background", "unset");
        $("#toggle_pickup_text_color").css("color", "#000000");

        $("#toggle_location_icon").css("display", "block");
        $("#toggle_location_tick_icon").css("display", "none");


        $("#check_out_pick_up_location_selector").css("display", "none");

    });

    $("#select_pickup_location").click(function () {

        $("#toggle_tick_icon").css("display", "none");
        $("#toggle_truck_icon").css("display", "block");
        $("#toggle_tick_icon").css("display", "none");

        $("#select_pickup_location").css("background", "#0F994B");
        $("#toggle_location_tick_icon").css("color", "#ffffff");
        $("#toggle_pickup_text_color").css("color", "#ffffff");


        $("#type_delivery_location").css("background", "unset");
        $("#toggle_delivery_text_color").css("color", "#000000");

        $("#toggle_location_icon").css("display", "none");
        $("#toggle_location_tick_icon").css("display", "block");
        $("#check_out_pick_up_location_selector").css("display", "flex");
    });

    $("#click_to_add_coupon").click(function () {
        $("#checkout_page_coupon_form").css("display", "block");

    });

</script>

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