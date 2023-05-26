<?php 

function get_products($db) {
    
    $query = $db->query("SELECT * FROM products ORDER BY product_name ASC");
    $data = array();
    
    while($temp_data = $query->fetch_assoc()){
        array_push($data, $temp_data);
    }
    
    return  $data;
}

function get_home_products($db) {
    
    $query = $db->query("SELECT * FROM products ORDER BY created_at DESC LIMIT 3");
    $data = array();
    
    while($temp_data = $query->fetch_assoc()){
        array_push($data, $temp_data);
    }
    
    return  $data;
}

function get_category($db) {
    
    $query = $db->query("SELECT * FROM categories ORDER BY cat_name ASC");
    $data = array();
    
    while($temp_data = $query->fetch_assoc()){
        array_push($data, $temp_data);
    }
    
    return  $data;
}
function get_category_name($db, $id) {
    $data = '';
    $query = $db->query("SELECT * FROM categories WHERE cat_id =".$id);
    
    while($temp_data = $query->fetch_assoc()){
       $data = $temp_data['cat_name'];
    }
    
    return  $data;
}


function check_existing_order($order_id, $db){
    
    $query = $db->query("SELECT * FROM orders WHERE order_id = '".$order_id."'");
    
    return mysqli_num_rows($query);
    
}
function add_order($db, $order_id,$customer_id,  $address, $items){
     $_SESSION['cart'] = "";
     unset($_SESSION['cart']);
    mysqli_query($db, $items);
    $order_query = "INSERT INTO orders (customer_id, order_id, address, created_at) VALUES (".$customer_id.", '".$order_id."','".$address."' , '".date("Y-m-d")."')";
    
 

    return mysqli_query($db, $order_query);
}

?>