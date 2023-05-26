<?php

include("dbConfig.php");
function shorten_text($text, $max_length = 140, $cut_off = '...', $keep_word = false) {
    if(strlen($text) <= $max_length) {
        return $text;
    }

    if(strlen($text) > $max_length) {
        if($keep_word) {
            $text = substr($text, 0, $max_length + 1);

            if($last_space = strrpos($text, ' ')) {
                $text = substr($text, 0, $last_space);
                $text = rtrim($text);
                $text .=  $cut_off;
            }
        } else {
            $text = substr($text, 0, $max_length);
            $text = rtrim($text);
            $text .=  $cut_off;
        }
    }

    return $text;
}


function get_category($cat_id, $db){
    $query = $db->query("SELECT * FROM categories WHERE cat_id = ".$cat_id." LIMIT 1");
    while($data = $query->fetch_assoc()){
        $category = $data['cat_name'];
        
    }
    return $category;
}
function get_country_data($country_key, $getter, $db){
    $query = $db->query("SELECT * FROM countries WHERE country_keyword = '".$country_key."' LIMIT 1");
    while($data = $query->fetch_assoc()){
        $country = $data['country_name'];
        $currency = $data['country_currency_symbol'];
        
    }
    if($getter == "name"){
        $data = $country;
    } else if($getter == "currency")  {
        $data = $currency;
    }
    
    return $data;
}


function get_retailer_info($retailer_id, $db){
    $query = $db->query("SELECT * FROM retailers WHERE retailer_id = ".$retailer_id." LIMIT 1");
    $return_data = [];
    while($data = $query->fetch_assoc()){
        $return_data["name"] = $data['retailer_displayname'];
        $return_data["email"] = $data['retailer_email'];
    }
    return $return_data;
}

function count_records($table, $db){
    $query = $db->query("SELECT * FROM ".$table);
    return mysqli_num_rows($query);
}

function insert_log($title, $desc, $db){
    $query = "INSERT INTO system_logs (log_title, log_desc, user, created_at) VALUES ('".$title."', '".$desc."', '".$_SESSION['admin_login']."', '".date("Y-m-d h:i:s")."') ";
    
    
    mysqli_query($db, $query);
}
?>