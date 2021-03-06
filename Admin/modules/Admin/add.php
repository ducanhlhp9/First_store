
<?php
    $open = "admin";
    require_once __DIR__. "/../../autoload/autoload.php";

        // danh muc san pham
    $category = $db->fetchAll("admin");
    $data =
        [
          "name" => postInput('name'),
          "email" => postInput("email"),
          "phone" => postInput("phone"),
          "password" => MD5(postInput("password")),
          "address" => postInput("address"),
          "level" => postInput("level")
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

        $is_check = $db->fetchOne("admin", "email = '".$data['email']. "'");
        if($is_check !=null)
        {
          $error['email'] ="Địa chỉ email đã tồn tại";
        }
        if(postInput('phone') == '')
        {
          $error['phone'] = "bạn chưa nhập số điện thoại";
        }
        if(postInput('password') == '')
        {
          $error['password'] = "Bạn chưa nhập mật khẩu";
        }
        if(postInput('address') == '')
        {
          $error['address'] = "Bạn chưa nhập địa chỉ";
        }

        if($data['password'] != MD5(postInput("re_password")))
        {
          $error['password'] = "mật khẩu không khớp";
        }
         if(empty($error)){
            $id_insert = $db->insert("admin",$data);
            if($id_insert)
            {
              move_uploaded_file($file_tmp,$part.$file_name);
              $_SESSION['success'] ="Thêm mới thành công";
              redirectAdmin("admin");
            }
            else
            {
              $_SESSION['error'] = "Thêm mới thất bại";
            }
          }
      }

      
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
      <h1>Thêm mới Admin</h1>
      <hr>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/php/admin/">Trang chủ</a>
      </li>
      <li class="breadcrumb-item">
        <a href="/php/admin/modules/admin/">Admin</a>
      </li>
      <li class="breadcrumb-item active">Thêm mới</li>
    </ol>

    <!-- // Thông báo ra lỗi -->
          <?php if(isset($_SESSION['error'])) :?>
            <div class ="alert alert-danger">
              <?php echo $_SESSION['error']; unset($_SESSION['error'])?>
            </div>
           <?php endif ;?>
    <div class ="row">
      <div class ="col-md-12">
        <form class ="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"><h6>Họ và Tên</h6></label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Họ và Tên" name ="name" value = "<?php echo $data['name']?>">
                <?php if (isset($error['name'])) : ?>
                  <p  class ="text-danger"> <?php echo $error['name']?> </p>
                <?php endif ?>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"><h6>Email </h6></label>
              <div class="col-sm-3">
                <input type="email" class="form-control" id="inputEmail3" placeholder="@gmail.com" name ="email" value = "<?php echo $data['email']?>">
                <?php if (isset($error['email'])) : ?>
                  <p  class ="text-danger"> <?php echo $error['email']?> </p>
                <?php endif ?>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"><h6>Phone Number </h6></label>
              <div class="col-sm-3">
                <input type="number" class="form-control" id="inputEmail3" placeholder="123456789" name ="phone" value = "<?php echo $data['phone']?>">
                <?php if (isset($error['phone'])) : ?>
                  <p  class ="text-danger"> <?php echo $error['phone']?> </p>
                <?php endif ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"><h6>Password</h6></label>
              <div class="col-sm-3">
                <input type="password" class="form-control" id="inputEmail3" placeholder="*********" name ="password" >
                <?php if (isset($error['password'])) : ?>
                  <p  class ="text-danger"> <?php echo $error['password']?> </p>
                <?php endif ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"><h6>Nhập lại Password</h6></label>
              <div class="col-sm-3">
                <input type="password" class="form-control" id="inputEmail3" placeholder="*********" name ="re_password">
                <?php if (isset($error['re_password'])) : ?>
                  <p  class ="text-danger"> <?php echo $error['re_password']?> </p>
                <?php endif ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"><h6>Địa chỉ</h6></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Xã/Phường...Quận/Huyện...-Tỉnh/Thành Phố" name ="address" value = "<?php echo $data['phone']?>">
                <?php if (isset($error['address'])) : ?>
                  <p  class ="text-danger"> <?php echo $error['address']?> </p>
                <?php endif ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"><h6>Level</h6></label>
              <div class="col-sm-2">
                <select class ="form-control" name="level" >
                  <option value="1">Admin</option>
                  <option value="2">Cộng tác viên</option>
                  option
                </select>
                <?php if (isset($error['level'])) : ?>
                  <p  class ="text-danger"> <?php echo $error['level']?> </p>
                <?php endif ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-success">Add</button>
              </div>
            </div>
          </form>
      </div>
    </div>

    <!-- Page Content -->
    

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
<header id="header" class="">
  
</header><!-- /header -->