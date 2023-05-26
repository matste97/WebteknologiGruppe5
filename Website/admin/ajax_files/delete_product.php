<?php

include("../include/dbConfig.php");

// through this condition product is deleted

if(isset($_GET['id'])){
    // echo json_encode($_GET['id']);
    $temp_data["result"] = array();
    $count = 1;
    $get_user_query = $db->query("SELECT * FROM products WHERE product_id = ".$_GET['id']);
  
    while ($data = $get_user_query->fetch_assoc()){
        $product_name = $data['product_name'];
    }
    if(mysqli_num_rows($get_user_query)!=0){
        
        if(mysqli_query($db, "DELETE FROM `products` WHERE `product_id` =  ".$_GET['id'])){

            // $title = "Product Deleted";
            // $desc = $product_name." Product removed by ".$_SESSION['admin_login']; 
            // insert_log($title, $desc, $db);
            
            
            $temp_data["result"] = array(
                "removed_records" => mysqli_num_rows($get_user_query)
            );
        } else {
            $temp_data["result"] = array(
                "error" => "Error in query"
            );
        }
     
    } else {
        $temp_data["result"] = array(
            "error" => "Invalid User ID"
        );
    }
} else {
    $temp_data["error"] = array("type"=>"invalid parameters request");
    
}
echo json_encode($temp_data);
?>