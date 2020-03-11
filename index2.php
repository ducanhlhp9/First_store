
 <?php 
    require_once __DIR__. "/autoload/autoload.php";
    
	$sqlHomecate ="SELECT *from category where home = 1 order by updated_at";
    $categoryHome = $db->fetchsql($sqlHomecate);
    
    $data = [];
    foreach ($categoryHome as $item) 
    {
    	$cateID = intval($item['id']);
    	$sql ="select *from products where category_id = $cateID";
    	$productHome = $db->fetchsql($sql);
    	$data[$item['name']] = $productHome;
    }
    
    																
?>
<?php require_once __DIR__. "/layouts/header.php"; ?>

 <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
				<div class="container">

					<div class="banner_content text-center">
						<h2>Shop Category Page</h2>
						<div class="page_link">
							<a href="<?php base_url()?>index.php">Home</a>
							<a href="<?php base_url()?>index2.php">Category</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Category Product Area =================-->
        <section class="cat_product_area p_120">
        	<div class="container">
        		<div class="row flex-row-reverse">
        			<div class="col-lg-9">
        				<div class="product_top_bar">
        					<div class="left_dorp">
								<select class="sorting">
									<option value="1">Default sorting</option>
								</select>
								<select class="show">
									<option value="1">Show 12</option>
								</select>
        					</div>
        					<!-- <div class="right_page ml-auto">
								
        					</div> -->
        				</div>
        				<?php foreach ($data as $key => $value): ?>
						<h4><b><?php echo $key ?></b></h4>
		
		        		<div class="latest_product_inner row">
			        		<?php foreach ($value as $item) : ?>
									<div class="col-lg-3 col-md-4 col-sm-6">
										<div class="f_p_item">
											<div class="f_p_img">
												<a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
													<img class="img-fluid" src="<?php echo uploads()?>/products/<?php echo $item['thunbar']?>" alt ="" >
												</a>
												<div class="p_icon">
													<a href="#"><i class="lnr lnr-heart"></i></a>
													<a href="<?php base_url()?>shoppingcart.php?id=<?php echo $item['id'] ?>"><i class="lnr lnr-cart"></i></a>
													<a href="#"><i class="fa fa-search"></i></a>
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
						<?php endforeach; ?>
        			</div>
        			<div class="col-lg-3">
        				<div class="left_sidebar_area">
        					<aside class="left_widgets cat_widgets">
        						<div class="l_w_title">
									<h3>Browse Categories</h3>
								</div>
        						<div class="widgets_inner">
									<ul class="list">
										<?php foreach($categoryHome as $item) :?>
											<li>
												<a href ="danh-muc-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
											</li>
										<?php endforeach;?>
									</ul>
        						</div>
        					</aside>
        					<aside class="left_widgets p_filter_widgets">
        						<div class="l_w_title">
									<h3>New Products</h3>
								</div>
        						<div class="widgets_inner">
									<ul class="list">
										<?php foreach($productNew as $item) :?>
											<li >
												<a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
													<img src ="<?php echo uploads()?>products/<?php echo $item['thunbar']?>"  width ="80" height = "80">
												</a>
												<div  >
													<p class ="name"><?php echo $item['name']?></p>
													<?php if (($item['sale'] ?? 0) > 0) : ?>
														<p>Giá gốc: <strike class ="sale"><?php echo formatNumber($item['price']) ?></strike></p> 
														<p>Giảm giá:<?php echo formatPriceSale($item['price'], $item['sale']) ?></p>	
													<?php else :  ?>														
														<p class ="price">Giá: <?php echo formatNumber($item['price']) ?></p>
													<?php endif; ?>
													<span class ="view"><i class ="fa fa-eye"></i> 100000 <i class = "fa fa-heart-o"></i>10</span>
												</div>
											</li>
										<?php endforeach;?>
									</ul>
        						</div>
        					</aside>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Category Product Area =================-->
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