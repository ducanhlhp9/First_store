<?php 
    require_once __DIR__. "/autoload/autoload.php";
    $user = $db->fetchID("users", intval($_SESSION['name_id']));
    $id = intval(getInput('id'));


    // chi tiet sản phẩm
    $product = $db->fetchID("products",$id);
    // lay danh muc
    $cateid = $product['category_id'];
    $sql ="select *from products where category_id = $cateid order by id DESC limit 4";

    $sanphamkemtheo = $db->fetchsql($sql);

    $comment = "select *from comment";
    $productComment=$db->fetchsql($comment);

     $data =
        [
          "name" => $user['name'],
          "Product_id" => $id,
          "comment"=>postInput('message')
        ];
    if(isset($_POST['message']))
    {
      $inputComment = $_POST['message'];
      $id_insert = $db->insert("comment",$data);
    }
    
?>
<?php require_once __DIR__. "/layouts/header.php"; ?>
   
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div class="banner_content text-center">
            <h2>Single Product Page</h2>
            <div class="page_link">
              <a href="index.html">Home</a>
              <a href="category.html">Category</a>
              <a href="single-product.html">Product Details</a>
            </div>
          </div>
        </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Single Product Area =================-->
        <div class="product_image_area">
          <div class="container">
            <div class="row s_product_inner">
              <div class="col-lg-6">
                <div class="s_product_img">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                    <img src="<?php echo uploads()?>products/<?php echo $product['thunbar'] ?>" width ="50px" height="50px" alt="">
                  </li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1">
                    <img src="<?php echo uploads()?>products/<?php echo $product['thunbar'] ?>" width ="50px" height="50px" alt="">
                  </li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2">
                    <img src="<?php echo uploads()?>products/<?php echo $product['thunbar'] ?>" width ="50px" height="50px" alt="">
                  </li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="<?php echo uploads()?>products/<?php echo $product['thunbar'] ?>" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo uploads()?>products/<?php echo $product['thunbar'] ?>" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo uploads()?>products/<?php echo $product['thunbar'] ?>" alt="Third slide">
                  </div>
                </div>
              </div>
                </div>
              </div>
              <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                  <h3><?php echo $product['name']?></h3>
                  <h2>
                    <?php if (($product['sale'] ?? 0) > 0) : ?>
                        <p><strike class ="sale"><?php echo formatNumber($product['price']) ?></strike>
                        <?php echo formatPriceSale($product['price'], $product['sale']) ?></p>  
                    <?php else :  ?>                            
                        <p class ="price">Giá: <?php echo formatNumber($product['price']) ?></p>
                    <?php endif; ?>
                  </h2>
                  <ul class="list">
                    <li><a class="active" href="#"><span>Category</span> : Household</a></li>
                    <li><a href="#"><span>Number</span><?php echo $product['number']?></a></li>
                  </ul>
                  <p><?php echo $product['content']?></p>
                  <div class="product_count">
                    <label for="qty">Quantity:</label>
                <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
              </div>
                  <div class="card_area">
                    <a class="main_btn" href="<?php base_url()?>shoppingcart.php?id=<?php echo $product['id'] ?>">Add to Cart</a>
                    <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
                    <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--================End Single Product Area =================-->
        
        <!--================Product Description Area =================-->
        <section class="product_description_area">
          <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
          <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
          </li>
          
          <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Comments</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
            <p><?php echo $product['content'] ?></p>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="table-responsive">
              
            </div>
          </div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="row">
              <div class="col-lg-6">
                <div class="comment_list">
                  <?php foreach ($productComment as $item) : ?>
                  <div class="review_item">
                    <div class="media">
                      <div class="d-flex">
                        <img src="<?php base_url()?>public/frontend/img/product/single-product/review-1.png" alt="">
                      </div>
                      <div class="media-body">
                        <h4><?php echo $item['name'] ?></h4>
                        <h5><?php echo $item['created_at'] ?></h5>
                        <a class="reply_btn" href="#">Reply</a>
                      </div>
                    </div>
                    <p>
                      <?php echo $item['content'] ?>
                    </p>
                  </div>
                <?php endforeach; ?>
   
                </div>
              </div>
              <div class="col-lg-6">
                <div class="review_box">
                  <h4>Post a comment</h4>
                  <form class="row contact_form" action="chi-tiet-san-pham.php?id=<?php echo $item['Product_id'] ?>" method="post" id="contactForm" novalidate="novalidate">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <input class="form-control" name="message" id="message" rows="1" placeholder="Message">
                      </div>
                    </div>
                    <div class="col-md-12 text-right">
                      <button type="submit" value="submit" class="btn submit_btn">Submit Now</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
            <div class="row">
              <div class="col-lg-6">
                <div class="row total_rate">
                  <div class="col-6">
                    <div class="box_total">
                      <h5>Overall</h5>
                      <h4>4.0</h4>
                      <h6>(03 Reviews)</h6>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="rating_list">
                      <h3>Based on 3 Reviews</h3>
                      <ul class="list">
                        <li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                        <li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                        <li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                        <li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                        <li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="review_list">
                  <div class="review_item">
                    <div class="media">
                      <div class="d-flex">
                        <img src="img/product/single-product/review-1.png" alt="">
                      </div>
                      <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                  </div>
                  <div class="review_item">
                    <div class="media">
                      <div class="d-flex">
                        <img src="img/product/single-product/review-2.png" alt="">
                      </div>
                      <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                  </div>
                  <div class="review_item">
                    <div class="media">
                      <div class="d-flex">
                        <img src="img/product/single-product/review-3.png" alt="">
                      </div>
                      <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="review_box">
                  <h4>Add a Review</h4>
                  <p>Your Rating:</p>
                  <ul class="list">
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                  </ul>
                  <p>Outstanding</p>
                  <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea class="form-control" name="message" id="message" rows="1" placeholder="Review"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 text-right">
                      <button type="submit" value="submit" class="btn submit_btn">Submit Now</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="latest_product_inner row">
                  <?php foreach ($sanphamkemtheo as $item) : ?>

                  <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="f_p_item">
                      <div class="f_p_img">
                        <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                          <img class="img-fluid" src="<?php echo uploads()?>/products/<?php echo $item['thunbar']?>" alt ="" >
                        </a>
                        <div class="p_icon">
                          <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><i class="lnr lnr-heart"></i></a>
                          <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><i class="lnr lnr-cart"></i></a>
                          <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a>
                        </div>
                      </div>
                      <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                        <b><?php echo $item['name'] ?></b>
                      </a>
                      <h5>
                        <?php if (($item['sale'] ?? 0) > 0) : ?>
                          <p>Giá gốc: <strike class ="sale"><?php echo formatNumber($item['price']) ?></strike></p>
                          <p>Giảm giá:<a class="price"><?php echo formatPriceSale($item['price'], $item['sale']) ?></a></p> 
                        <?php else :  ?>                            
                          <p class ="price">Giá: <?php echo formatNumber($item['price']) ?></p>
                        <?php endif; ?>
                      </h5>
                    </div>
                  </div>  
              <?php endforeach; ?>            
            </div>
        </div>
          </div>
          
        </section>

        <!--================End Product Description Area =================-->
        <!--================End Most Product Area =================-->
 <?php require_once __DIR__. "/layouts/footer.php"; ?>       
        