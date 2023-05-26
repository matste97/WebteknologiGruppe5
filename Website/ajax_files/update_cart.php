<?php
session_start();

if($_POST['action'] == "plus"){
    foreach($_SESSION['cart'] as $key => $cart){
        if($_SESSION['cart'][$key]['id'] == $_POST['id']){
            $_SESSION['cart'][$key]['quantity'] += 1;

            $final_count = $_SESSION['cart'][$key]['quantity'];
            if($_SESSION['cart'][$key]['quantity'] == 0) {
                unset($_SESSION['cart'][$key]);
                $removed_id = $_POST['id'];
            }
        }
    }
}

if($_POST['action'] == "minus"){
    foreach($_SESSION['cart'] as $key => $cart){
        if($_SESSION['cart'][$key]['id'] == $_POST['id']){
            $_SESSION['cart'][$key]['quantity'] -= 1;
            $final_count = $_SESSION['cart'][$key]['quantity'];
            if($_SESSION['cart'][$key]['quantity'] == 0) {
                unset($_SESSION['cart'][$key]);
                $removed_id = $_POST['id'];
            }

        }
    }
}
if($_POST['action'] == "remove"){
    foreach($_SESSION['cart'] as $key => $cart){
        if($_SESSION['cart'][$key]['id'] == $_POST['id']){
            unset($_SESSION['cart'][$key]);
            $removed_id = $_POST['id'];

        }
    }
}

if($_POST['action'] == "check"){
    $count = 0;
    foreach($_SESSION['cart'] as $key => $cart){
        $count++;

    }
    echo $count;
}

if(isset($removed_id)) {
    echo 0;
} else {
    echo $final_count;
}



?>