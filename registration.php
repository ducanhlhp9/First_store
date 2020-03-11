
<?php 
    $open = "users";
    require_once __DIR__. "/autoload/autoload.php";
    if (isset($_SESSION['name_user']))
    {
      echo "<script> alert('Đã đăng nhập!!');location.href ='index.php'</script>";
    }
     $category = $db->fetchAll("users");
     $data =
        [
          "name" => postInput('name'),
          "email" => postInput('email'),
          "phone" => postInput('phone'),
          "address" => postInput('address'), 
          "password" => MD5(postInput("password")),

        ];

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        $error =[];
        if(postInput('name') == '')
        {
          $error['name'] = "Bạn chưa nhập họ tên";
        }
        if(postInput('email') == '')
        {
          $error['email'] = "bạn chưa nhập email";
        }

        $is_check = $db->fetchOne("users", "email = '".$data['email']. "'");
        if($is_check !=null)
        {
          $error['email'] ="Địa chỉ email đã tồn tại";
        }
        if(postInput('phone') == '')
        {
          $error['phone'] = "bạn chưa nhập số điện thoại";
        }
        
        if(postInput('address') == '')
        {
          $error['address'] = "Bạn chưa nhập địa chỉ";
        }
        if(postInput('password') == '')
        {
          $error['password'] = "Bạn chưa nhập mật khẩu";
        }
        if($data['password'] != MD5(postInput("re_password")))
        {
          $error['password'] = "mật khẩu không khớp";
        }
         if(empty($error)){
            $id_insert = $db->insert("users",$data);
            if($id_insert)
            {
              $_SESSION['success'] ="Đăng kí  thành công";
              header("location: login.php");
                  
              
            }
            else
            {
              $_SESSION['error'] = "Đăng kí thất bại";
            }
          }
      }
?>
<?php require_once __DIR__. "/layouts/header.php"; ?>   
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<h2>Login/Register</h2>
						<div class="page_link">
							<a href="index.html">Home</a>
							<a href="registration.html">Register</a>
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
							<h3>Create an Account</h3>
							<form class="row login_form"  method="post" id="contactForm" novalidate="novalidate">
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="name" name="name" placeholder="Name" value = "<?php echo $data['name']?>">
                    <?php if (isset($error['name'])) : ?>
                      <p  class ="text-danger"> <?php echo $error['name']?> </p>
                    <?php endif ?>
                </div>
								<div class="col-md-12 form-group">
									<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value = "<?php echo $data['email']?>">
                    <?php if (isset($error['email'])) : ?>
                      <p  class ="text-danger"> <?php echo $error['email']?> </p>
                    <?php endif ?>
								</div>
                <div class="col-md-12 form-group">
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone Number" value = "<?php echo $data['phone']?>">
                    <?php if (isset($error['phone'])) : ?>
                      <p  class ="text-danger"> <?php echo $error['phone']?> </p>
                    <?php endif ?>
                </div>
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" id="Address" name="address" placeholder="Address" value = "<?php echo $data['address']?>">
                    <?php if (isset($error['address'])) : ?>
                      <p  class ="text-danger"> <?php echo $error['address']?> </p>
                    <?php endif ?>
                </div>
								<div class="col-md-12 form-group">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <?php if (isset($error['password'])) : ?>
                    <p  class ="text-danger"> <?php echo $error['password']?> </p>
                <?php endif ?>
								</div>
								<div class="col-md-12 form-group">
									<input type="password" class="form-control" id="re_password" name="re_password" placeholder="Confirm password">
                    <?php if (isset($error['re_password'])) : ?>
                      <p  class ="text-danger"> <?php echo $error['re_password']?> </p>
                    <?php endif ?>
								</div>
								<div class="col-md-12 form-group">
									<div class="creat_account">
										<input type="checkbox" id="f-option2" name="selector">
										<label for="f-option2">Keep me logged in</label>
									</div>
								</div>
								<div class="col-md-12 form-group">
									<button type="submit" value="submit" class="btn submit_btn">Register</button>
								</div>
							</form>
						</div>
					</div>
				</div>
        	</div>
        </section>
        <!--================End Login Box Area =================-->
        
      <?php require_once __DIR__. "/layouts/footer.php"; ?> 