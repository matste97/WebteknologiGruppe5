<?php
$products = get_products($db);

// print_r($products);
?>
<section class="product_listing_section">
    <div class="product_container">

        <div class="home_main">
            <div class="home_product_list_parent">

                <?php
                foreach ($products as $key => $val) {
                    ?>
                    <div class="home_single_product_box_main">
                        <div class="single_product_box">
                            <figure>
                                <img src="admin/<?= $products[$key]['product_image'] ?>">

                            </figure>
                            <div class="single_product_box_figcaption">

                                <div class="product_name">
                                    <p><?= $products[$key]['product_name']; ?></p>
                                </div>
                                <div class="product_description">
                                    <p><?= $products[$key]['product_desc']; ?></p>
                                </div>
                                <div class="price_tags">
                                    <div class="total_and_discount_price"><small class="orignal_price"><span>CAD</span> <?= $products[$key]['product_price']; ?></small></div>
                                </div>
                                <div class="product_cart_btn"><a class="add-to-cart" data-id="<?= $products[$key]['product_id']; ?>" data-name="<?= $products[$key]['product_name']; ?>" data-price="<?= $products[$key]['product_price']; ?>">Order now</a></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>

            <div class="home_single_product_image">
                <figure><img src="image/logo.png"></figure>
            </div>

            <div class="">

                <section class="home_newsletter_section">
                    <div class="custom_container2">
                        <div class="home_newsletter_box_two">
                            <form method="POST" action="">
                                <div class="newsletter_form_fields"><span>Subscribe To Newsletter </span>
                                    <div class="newsletter_form_fields_content" id="franchise_email_div">
                                        <input id="get-user-subscribe-email" type="text" required="required" name="email" placeholder="Enter your email" style="width: 100% !important;" />
                                        <button id="submit-recaptcha" type="submit" class="submitted btn">Subscribe</button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </section>




            </div>
        </div>

    </div>
</section>