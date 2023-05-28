<section class="web_header"> 
     <div class="custom_container">
         <div class="web_header_main">
           <div class="web_header_0">
             <ul class="web_header_0_list_0">
               <li class="li_0 web_header_logo"><a href="index.php"><i class='bx bxs-component'></i>CGG</a></li>
             </ul>
             <div class="d-flex align-center">
               <ul class="links_list">
                 <li><a href="index.php">Home</a> </li>
                 <li><a href="about.php">About</a> </li>
                 <li><a href="products.php">Products</a> </li>
                 <li><a href="contact.php">Contact</a> </li>
              </ul>
 
              <ul class="cart_links_list">
                 <li>
                  <a href="cart_page.php">
                  <i class="fal fa-shopping-cart"></i> 
                  <p class="cart_total"><?php if(isset($_SESSION['cart'])){ echo count($_SESSION['cart']); } else{echo "0";}?></p></a> </li>
                  <!-- <li><a class="btnLogin-popup">Login</a> </li> -->
                  <?php 
                
                if (isset($_SESSION['login_user'])) {
                ?>
                <li class="li_3"><a href="logout.php"><span class="web_header_signup_btn">Logout</span></a> </li>
              <?php }
              else
              { ?>

                <li class="li_3"><a href="login.php"><span class="web_header_signup_btn">Login</span></a> </li>
                <?php   }
              ?>
                </ul>
</div>
          </div>
        </div>
     </div> 
  </section>
  
  <section class="mobile_header"> 
     <div class="custom_container">
         <div class="mobile_header_main">
           <div class="mobile_header_0">
             <ul class="mobile_header_0_list_1">
                 <li class="li_0"><a class="mobile_res_toggle_btn" style="font-size: 28px;font-weight: 500;padding-right: 12px;"><i class="fal fa-bars"></i></a> </li> 
              </ul>
 
             <ul class="mobile_header_0_list_0">
               <li class="li_0 mobile_header_logo"><a href="index.php"><i class='bx bxs-component'></i>CGG</a></li>
             </ul>
             
 
              <ul class="mobile_header_0_list_2">
                 <li class="li_2">
                  <a href="cart_page.php" style="padding-right: 25px;font-size:26px;position:relative;">
                  <i class="fal fa-shopping-cart"></i>
                  <p class="mobile_cart_total"><?php if(isset($_SESSION['cart'])){ echo count($_SESSION['cart']); } else{echo "0";}?></p>
                </a>
                 </li>
                 <!-- <li class="li_3"><a class="test" style="font-size:26px;color:#212121;"><i class="fal fa-user"></i></a> </li> -->
                 <?php 
                
                if (isset($_SESSION['login_user'])) {
                ?>
                <li class="li_3"><a href="logout.php"><span class="web_header_signup_btn">Logout</span></a> </li>
              <?php }
              else
              { ?>

                <li class="li_3"><a href="login.php"><span class="web_header_signup_btn">Login</span></a> </li>
                <?php   }
              ?>
                </ul>
          </div>
         
        </div>
     </div> 
 
    <div class="mobile_res_toggle_content">
     <div class="mobile_res_toggle_content_cancle"><a class="mobile_res_toggle_btn" style="font-size:20px;"><i class="fas fa-times"></i></a></div>
   
     <ul class="mobile_res_toggle_list_1">
         <li><a href="index.php" style="font-size: 20px;font-weight: 500;">Home</a> </li>
         <li><a href="about.php" style="font-size: 20px;font-weight: 500;">About</a> </li>
         <li><a href="products.php" style="font-size: 20px;font-weight: 500;">Products</a> </li>
         <li><a href="contact.php" style="font-size: 20px;font-weight: 500;">Contact</a> </li>
      </ul>
 
 
     </div>
 
 
 
  </section>
  