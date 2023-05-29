<!DOCTYPE html>
<html lang="en">

<?php
session_start();
?>

<head>
   <?php include("head.php"); ?>
</head>

<body>

<?php include("header.php"); ?>

    <main class="">
        <div class="container">
            <div class="">
                <section class="mb-5 about_page_content">
                    <h2>About Us</h2>
                    <p>Welcome to the future of gaming! We are a cutting edge company specializing in the most advanced
                        cyberpunk
                        gaming gadgets available. From headsets to keyboards, mice to controllers, we have everything
                        you need to get
                        the most out of your gaming experience. Our products feature the latest in cyberpunk technology,
                        with sleek
                        designs and advanced capabilities. Experience the power of cyberpunk gaming with us today! Let
                        us take your
                        gaming to the next level.</p>
                </section>
                <section class="mb-5 about_page_content">
                    <h2>Our Mission</h2>
                    <p>
                        At Cyperpunk Gaming Gear, our mission is to provide the best possible gaming experience for our
                        customers. We believe that gaming is not just a hobby, but a passion that deserves the best
                        possible tools and accessories. We are dedicated to offering high-quality, innovative products
                        at affordable prices, while delivering exceptional customer service and support. We strive to
                        create a community of passionate gamers who share our love for gaming and technology. Our
                        ultimate goal is to empower gamers with the tools they need to take their gaming experience to
                        the next level, and to make a positive impact on the gaming industry as a whole.
                    </p>
                </section>
                <section class="mb-5 about_page_content">
                    <h2>Our Values</h2>
                    <p>At Cyberpunk Gaming Gear, we strive to provide our customers with the best gaming experience
                        possible.
                        Our values include high-tech, comfortable, and stylish products that are designed to help you
                        get the most
                        out of your gaming. We believe in providing the most advanced technology and highest quality
                        materials to
                        ensure that our customers can enjoy their gaming in comfort and style. Our goal is to provide an
                        unbeatable
                        gaming experience that you won't find anywhere else.</p>
                </section>


               <!-- testimonial -->
               <div class="container">
                <h2 class="mb-2 testamonial_heading">Testimonials</h2>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="card shadow-sm h-100 testamonial_main">
                      <div class="card-body">
                        <div class="stars">
                          <i class="fas fa-star text-warning"></i>
                          <i class="fas fa-star text-warning"></i>
                          <i class="fas fa-star text-warning"></i>
                          <i class="fas fa-star text-warning"></i>
                          <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="card-text text-left mt-3">I recently purchased a headset from Cyberpunk Gaming Gear, and it was an awesome experience. 
                          The headset is super comfortable and has amazing sound quality. It's really helped me up my game and I'm so glad I made this purchase!.</p>
                      </div>
                      <div class="card-footer">
                        <small class="text-muted">Joe, 17</small>
                        <br>
                        <small class="text-muted">May 1, 2023</small>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card shadow-sm h-100 testamonial_main">
                      <div class="card-body">
                        <div class="stars">
                          <i class="fas fa-star text-warning"></i>
                          <i class="fas fa-star text-warning"></i>
                          <i class="fas fa-star text-warning"></i>
                          <i class="fas fa-star text-warning"></i>
                          <i class="far fa-star"></i>
                        </div>
                        <p class="card-text text-left mt-3">As a serious e-sports player, I need gear that can keep up with me and my intense gaming sessions.
                           Cyberpunk Gaming Gear has been a lifesaver! The products I've purchased are comfortable, durable, and perform amazingly well.
                           I'm so impressed with the quality and value of the products from this company!</p>
                      </div>
                      <div class="card-footer">
                        <small class="text-muted">Alex, 22</small>
                        <br>
                        <small class="text-muted">April 28, 2023</small>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card shadow-sm h-100 testamonial_main">
                      <div class="card-body">
                        <div class="stars">
                          <i class="fas fa-star text-warning"></i>
                          <i class="fas fa-star text-warning"></i>
                          <i class="fas fa-star text-warning"></i>
                          <i class="far fa-star"></i>
                          <i class="far fa-star"></i>
                        </div>
                        <p class="card-text text-left mt-3">As a mother of two young gamers, I'm always looking for the best gaming gear for my kids. 
                          Cyberpunk Gaming Gear has been a great resource for me as they offer high-quality products at great prices. 
                          I know that my kids will be safe and comfortable while gaming with their new gear, and I'm so grateful to have found such a dependable company!</p>
                      </div>
                      <div class="card-footer">
                        <small class="text-muted">Sarah, 37</small>
                        <br>
                        <small class="text-muted">April 25, 2023</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
               <!-- testimonial -->
            </div>
        </div>
    </main>


 

    <?php include("footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
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