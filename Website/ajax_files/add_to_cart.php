<?php
session_start();
// $_SESSION['cart'] = "";
// session_unset();
// session_destroy();



if(isset($_POST['id'])){
    $count_cart=0;
    // echo '<pre>';
    $find_flag = false;
    if(isset($_SESSION['cart'])){
        // echo 'set';
        $cart = $_SESSION['cart'];
        if(count($cart) != 0){
            foreach ($cart as $key=>$val){
                if($cart[$key]['id'] == $_POST['id']){
                    // echo $cart[$key]['quantity'];
                    $quantity = $_POST['quantity'] + $cart[$key]['quantity'];
                    $_SESSION["cart"][$key]['quantity'] = $quantity;
                    $find_flag = true;
                }

            }
        }
        if($find_flag == false){

            //  echo 'hello';
            if(!is_array($_SESSION['cart'])){
                $_SESSION['cart'] = array();
            }
            $item = array('id' => $_POST['id'], 'name' => $_POST['name'], 'price' => $_POST['price'], 'quantity' => 1);
            array_push($_SESSION['cart'], $item);
            $cart = $_SESSION['cart'];
        }
    } else {
        // echo 'h';
        $_SESSION['cart'] = array();
        $item = array('id' => $_POST['id'], 'name' => $_POST['name'], 'price' => $_POST['price'], 'quantity' => 1);
        array_push($_SESSION['cart'], $item);
        $cart = $_SESSION['cart'];

    }
    // echo '<br>------------------';

    foreach ($cart as $key=>$val){
        $count_cart++;


    }

    echo  $count_cart;

}


?>