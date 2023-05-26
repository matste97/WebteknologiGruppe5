<?php
$products = get_products($db);

// print_r($products);
?>
<section class="product_listing_section">
    <div class="product_container">


        <div class="product_list_parent">

            <?php
            foreach ($products as $key=>$val){
                ?>
                <div class="single_product_box_main">
                    <div class="single_product_box">
                        <figure>
                            <img src="admin/<?= $products[$key]['product_image'] ?>">

                        </figure>
                        <div class="single_product_box_figcaption">

                            <div class="product_name"><p><?=$products[$key]['product_name']; ?></p></div>
                            <div class="product_description"><p><?=$products[$key]['product_desc']; ?></p></div>
                            <div class="price_tags"><div class="total_and_discount_price"><small class="orignal_price"><span>CAD</span> <?=$products[$key]['product_price']; ?></small></div></div>
                            <div class="product_cart_btn"><a class="add-to-cart" data-id="<?=$products[$key]['product_id'];?>" data-name="<?=$products[$key]['product_name']; ?>" data-price="<?=$products[$key]['product_price']; ?>">Order now</a></div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>

    </div>
</section>

