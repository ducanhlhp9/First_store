<?php 
    require_once __DIR__. "/autoload/autoload.php";
     $data =
        [
          "email" => postInput('email'), 
          "password" => (postInput("password"))

        ];

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        $error =[];
        if(postInput('email') == '')
        {
          $error['email'] = "bạn chưa tên đăng nhập";
        }
        if(postInput('password') == '')
        {
          $error['password'] = "Bạn chưa nhập mật khẩu";
        }
         if(empty($error)){
            $is_check = $db->fetchOne("users", "email ='".$data['email']."' and password ='".md5($data['password'])."'");
            if($is_check != null)
            {
                  
              $_SESSION['name_user'] = $is_check['name'];
              $_SESSION['name_id']  = $is_check['id'];
              echo "<script> alert('Đăng nhập thành công');location.href ='index.php'</script>";
            }
            else
            {
              $_SESSION['error'] = "Tên hoặc tài khoản không chính xác";
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
                            <a href="index.php">Home</a>
                            <a href="login.php">Login</a>
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
                            <img class="img-fluid" src="<?php base_url()?>public/frontend/img/em908.png" alt="">
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="login_form_inner">
                            <h3>Log in to enter</h3>
                            <form class="row login_form"  method="post" id="contactForm" novalidate="novalidate">

                                <div class="col-md-12 form-group">                                  
                                    <input type="email" class="form-control" id="email" name="email" placeholder="@gmail.com">
                                    <?php if (isset($error['email'])) : ?>
                                      <p  class ="text-danger"> <?php echo $error['email']?> </p>
                                    <?php endif ?>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    <?php if (isset($error['password'])) : ?>
                                        <p  class ="text-danger"> <?php echo $error['password']?> </p>
                                    <?php endif ?>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account">
                                        <input type="checkbox" id="f-option2" name="selector">
                                        <label for="f-option2">Keep me logged in</label>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="main_btn">Log In</button>
                                    <a href="#">Forgot Password?</a>
                                    <div class="hover">
                                    <a class="main_btn" href="registration.php">Create an Account</a>
                                </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Login Box Area =================-->
        
       <?php require_once __DIR__. "/layouts/footer.php"; ?>