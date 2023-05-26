<?php
$products = get_category($db);

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
                            <img src="admin/<?= $products[$key]['cat_image'] ?>">

                        </figure>
                        <div class="single_product_box_figcaption">

                            <div class="product_name"><p><?=$products[$key]['cat_name']; ?></p></div>

                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>

    </div>
</section>

