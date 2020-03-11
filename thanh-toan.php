
<?php 
    require_once __DIR__. "/autoload/autoload.php";
   $user = $db->fetchID("users", intval($_SESSION['name_id']));
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $data =
      [
        'amount' => $_SESSION['tongtien'],
        'user_id' => $_SESSION['name_id']
      ];
      $idtran = $db->insert("transaction", $data);
      if($idtran > 0)
      {
        foreach ($_SESSION['cart'] as $key => $value) {
          $data2 =
          [
            'transaction_id' => $idtran,
            'product_id' => $key,
            'qty' => $value['qty'],
            'price' => $value['price']
          ];
          $id_insert = $db->insert("oder", $data2);
        }
        unset($_SESSION['cart']);
        unset($_SESSION['tongtien']);
        $_SESSION['success'] ="Lưu thông tin đơn hàng thành công ! hàng sắp về";
        header("location: thong-bao.php");
      }
    }
?>
<?php require_once __DIR__. "/layouts/header.php"; ?>   
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<h2>Infor User</h2>
						<div class="page_link">
							<a href="index.php">Home</a>
							<a href="gio-hang.php">cart</a>
              <a href="thanh-toan.php">checkout</a>

						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Login Box Area =================-->
        <section class="login_box_area p_120">
        	<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="login_box_img">
							<img class="img-fluid" src="<?php base_url()?>public/frontend/img/login.jpg" alt="">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="login_form_inner reg_form">
							<h3>Infor User</h3>
							<form class="row login_form"  method="post" id="contactForm" novalidate="novalidate">
								<div class="col-md-12 form-group">
									<input type="text" readonly="" class="form-control" id="name" name="name"  value = "<?php echo $user['name']?>">
                    
                </div>
								<div class="col-md-12 form-group">
									<input type="email" readonly="" class="form-control" id="email" name="email"  value = "<?php echo $user['email']?>">
								</div>
                <div class="col-md-12 form-group">
                    <input type="number" readonly="" class="form-control" id="phone" name="phone"  value = "<?php echo $user['phone']?>">
                    
                </div>
                <div class="col-md-12 form-group">
                    <input type="text" readonly="" class="form-control" id="Address" name="address"  value = "<?php echo $user['address']?>">
                    
                </div>
                <div class="col-md-12 form-group">
                    <input type="text" readonly="" class="form-control" id="text" name="text" placeholder="" value = "<?php echo formatNumber($_SESSION['tongtien'])?>">
                    
                </div>
								
								<div class="col-md-12 form-group">
									<button type="submit" value="submit" class="btn submit_btn">confirm</button>
								</div>
							</form>
						</div>
					</div>
				</div>
        	</div>
        </section>
        <!--================End Login Box Area =================-->
        
      <?php require_once __DIR__. "/layouts/footer.php"; ?> 