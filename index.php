<?php 
    require_once __DIR__. "/autoload/autoload.php";
    
?>
<?php require_once __DIR__. "/layouts/header.php"; ?>
   
        <!--================Home Banner Area =================-->
        <section class="home_banner_area">
            <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div class="banner_content row">
            <div class="col-lg-5">
              <h3>Macbook </h3>
              <p></p>
              <a class="white_bg_btn" href="index2.php">View Collection</a>
            </div>
            <div class="col-lg-7">
              <div class="halemet_img">
                <img src="<?php base_url()?>public/frontend/img/banner/apple-macbook-pro-2019-touch-i7-16gb-256gb-radeon-15-600x600-removebg-preview.png" alt="">
              </div>
            </div>
          </div>
        </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Feature Product Area =================-->
       
        <section class="feature_product_area">
          <div class="main_box">
        <div class="container">
          <div class="row hot_product_inner">
            <?php foreach($productHot as $item1) :?>
            <div class="col-lg-6">
              <div class="hot_p_item">
                <a href="chi-tiet-san-pham.php?id=<?php echo $item1['id'] ?>">
                      <img class="img-fluid" src ="<?php echo uploads()?>products/<?php echo $item1['thunbar']?>" alt="" width ="400px" height ="400px">
                </a>
                <div class="product_text">
                  <h5 class ="btn btn-info">Hot Deals</h5>
                  <a href="#" class ="btn btn-info">Shop Now</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
            <?php foreach($productHot as $item1) :?>
            <div class="col-lg-6">
              <div class="hot_p_item">
                <a href="chi-tiet-san-pham.php?id=<?php echo $item1['id'] ?>">
                      <img class="img-fluid" src ="<?php echo uploads()?>products/<?php echo $item1['thunbar']?>" alt="" width ="400px" height ="400px">
                </a>
                <div class="product_text">
                  <h5 class ="btn btn-info">Hot Deals</h5>
                  <a href="#" class ="btn btn-info">Shop Now</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          
        </div>
          </div>
        </section>
        <!--================End Feature Product Area =================-->
        
        <!--================Deal Timer Area =================-->
       
        <section class="timer_area">
          <div class="container">
            <div class="main_title">
              <h2>Exclusive Hot Deal Ends Soon!</h2>
              <p>Who are in extremely love with eco friendly system.</p>
              <a class="main_btn" href="#">Shop Now</a>
            </div>
            <div class="timer_inner">
          <div id="timer" class="timer" style="opacity: 1;">
            <div class="timer__section days">
              <div class="timer__number">09</div>
              <div class="timer__label">days</div>
            </div>
            <div class="timer__section hours">
              <div class="timer__number">23</div>
              <div class="timer__label">hours</div>
            </div>
            <div class="timer__section minutes">
              <div class="timer__number">49</div>
              <div class="timer__label">Minutes</div>
            </div>
            <div class="timer__section seconds">
              <div class="timer__number">44</div>
              <div class="timer__label">seconds</div>
            </div>
          </div>
        </div>
          </div>
        </section>
        <!--================End Deal Timer Area =================-->
        
        <!--================Latest Product Area =================-->
        <section class="feature_product_area latest_product_area">
          <div class="main_box">
        <div class="container">
          <div class="feature_product_inner">
            <div class="main_title">
              <h2>Latest Products</h2>
              <p>Who are in extremely love with eco friendly system.</p>
            </div>
            <div class="latest_product_inner row">
              <?php foreach($productNew as $item) :?>
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="f_p_item">
                  <div class="f_p_img">
                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                      <img class="img-fluid" src ="<?php echo uploads()?>products/<?php echo $item['thunbar']?>" alt="">
                    </a>
                    <div class="p_icon">
                      <a href="#"><i class="lnr lnr-heart"></i></a>
                      <a href="<?php base_url()?>shoppingcart.php?id=<?php echo $item['id'] ?>"><i class="lnr lnr-cart"></i></a>
                    </div>
                  </div>
                  <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><h4><p class ="name"><?php echo $item['name']?></p></h4></a>
                  <h5>
                    <?php if (($item['sale'] ?? 0) > 0) : ?>
                        <p>Giá gốc: <strike class ="sale"><?php echo formatNumber($item['price']) ?></strike></p> 
                        <p>Giảm giá:<?php echo formatPriceSale($item['price'], $item['sale']) ?></p>  
                    <?php else :  ?>                            
                        <p class ="price">Giá: <?php echo formatNumber($item['price']) ?></p>
                    <?php endif; ?>
                  </h5>
                </div>
              </div>
              <?php endforeach;?>
            </div>
          </div>
        </div>
          </div>
        </section>

        
        
        <!--================End Latest Product Area =================-->
        <!--================Most Product Area =================-->
        <section class="most_product_area">
                <div class="main_box">
              <div class="container">
                <div class="main_title">
                  <h2>Hot Products</h2>
                  <p>Who are in extremely love with eco friendly system.</p>
                </div>
                <div class="latest_product_inner row">
              <?php foreach($productHot2 as $item) :?>
              <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="f_p_item">
                  <div class="f_p_img">
                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                      <img class="img-fluid" src ="<?php echo uploads()?>products/<?php echo $item['thunbar']?>" alt="">
                    </a>
                    <div class="p_icon">
                      <a href="#"><i class="lnr lnr-heart"></i></a>
                      <a href="<?php base_url()?>shoppingcart.php?id=<?php echo $item['id'] ?>"><i class="lnr lnr-cart"></i></a>
                    </div>
                  </div>
                  <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><h4><p class ="name"><?php echo $item['name']?></p></h4></a>
                  <h5>
                    <?php if (($item['sale'] ?? 0) > 0) : ?>
                        <p>Giá gốc: <strike class ="sale"><?php echo formatNumber($item['price']) ?></strike></p> 
                        <p>Giảm giá:<?php echo formatPriceSale($item['price'], $item['sale']) ?></p>  
                    <?php else :  ?>                            
                        <p class ="price">Giá: <?php echo formatNumber($item['price']) ?></p>
                    <?php endif; ?>
                  </h5>
                </div>
              </div>
              <?php endforeach;?>
            </div>
              </div>
                </div>
              </section>      
<!--================End Most Product Area =================-->
        
        
        
 <?php require_once __DIR__. "/layouts/footer.php"; ?>       
        