
<?php 
    $open ="category";
    require_once __DIR__. "/../../autoload/autoload.php";




    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data =
        [
          "name" => postInput('name'),
          "slug" => to_slug(postInput("name"))
        ];
        $error =[];
        if(postInput('name') == '')
        {
          $error['name'] = "mời bạn nhập đủ tên danh mục";
        }
        if(empty($error))
        {
          $isset = $db->fetchOne("category","name = '".$data['name']."'");
          if(count($isset) >0)
          {
            $_SESSION['error'] ="Tên danh mục đã tồn tại !";
          }
          else
              {
              $id_imsert = $db->insert("category",$data);
              if($id_imsert > 0)
              {
                $_SESSION['success'] ="Thêm mới thành công";
                redirectAdmin("category");// back lai trang danh sach
              }
              else{
                $_SESSION['error'] ="Thêm mới thất bại";
              }
        }
        }
    }
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
      <h1>Thêm mới danh mục</h1>
      <hr>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="index.html">Danh mục</a>
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
        <form class ="form-horizontal" action="" method="POST">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"><h5>Tên danh mục</h5></label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Tên danh mục" name ="name">
                <?php if (isset($error['name'])) : ?>
                  <p  class ="text-danger"> <?php echo $error['name']?> </p>
                <?php endif ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-success">Register</button>
              </div>
            </div>
          </form>
      </div>
    </div>

    <!-- Page Content -->
    

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
<header id="header" class="">
  
</header><!-- /header -->