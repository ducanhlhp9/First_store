
<?php
    $open ="category";
    require_once __DIR__. "/../../autoload/autoload.php";
    // kiểm tra ID
    $id = intval(getInput('id'));

    $editProduct = $db->fetchID("products",$id);
    if(empty($editProduct))
    {
      $_SESSION['error'] = "Dữ liệu không tồn tại";
      redirectAdmin("products");
    }
        // danh muc san pham
    $category = $db->fetchAll("category");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data =
        [
          "name" => postInput('name'),
          "slug" => to_slug(postInput("name")),
          "category_id" => postInput("category_id"),
          "price" => postInput("price"),
          "number" => postInput("number"),
          "content" => postInput("content"),
          "sale" => postInput("sale")
        ];
        $error =[];
        if(postInput('name') == '')
        {
          $error['name'] = "mời bạn nhập đủ tên danh mục";
        }
        if(postInput('category_id') == '')
        {
          $error['category_id'] = "mời bạn chọn tên danh mục";
        }
        if(postInput('price') == '')
        {
          $error['price'] = "mời bạn nhập giá sản phẩm";
        }
        if(postInput('content') == '')
        {
          $error['content'] = "mời bạn nhập nội dung sản phẩm";
        }
        if(postInput('number') == '')
        {
          $error['number'] = "mời bạn nhập Số lượng sản phẩm";
        }

        if(!isset($_FILES['thunbar']))
        {
          $error['thunbar'] ="Mời bạn chọn hình ảnh";
        }  
         if(empty($error))
        {
          if(isset($_FILES['thunbar']))
          {
            $file_name = $_FILES['thunbar']['name'];
            $file_tmp = $_FILES['thunbar']['tmp_name'];
            $file_type = $_FILES['thunbar']['type'];
            $file_erro = $_FILES['thunbar']['error'];
            if($file_error == 0)
            {
              $part = ROOT ."products/";
              $data['thunbar'] = $file_name;
            }
          }
          $update = $db->update("products",$data, array("id"=>$id));
          if($update)
          {
            move_uploaded_file($file_tmp,$part.$file_name);
            $_SESSION['success'] ="Updated!!";
            redirectAdmin("products");
          }
          else
          {
            $_SESSION['error'] = "update thất bại";
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
        <a href="index.html">Sản phẩm</a>
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
              <label for="inputEmail3" class="col-sm-2 col-form-label"><h6>Danh mục sản phẩm</h6></label>
              <div class="col-sm-3">
                <select class ="form-control col-md-8" name ="category_id">
                  <option value =""> mời bạn chọn danh mục sản phẩm</option>      
                  <?php foreach ($category as $item) :?>
                      <option value ="<?php echo $item['id']?>" <?php echo $editProduct['category_id']  == $item['id'] ? "selected = 'selected'" : ''?>> <?php echo $item['name']?></option>
                  <?php endforeach ?>           
                </select>
                <?php if (isset($error['category_id'])) : ?>
                  <p  class ="text-danger"> <?php echo $error['category_id']?> </p>
                <?php endif ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"><h6>Tên sản phẩm</h6></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Tên sản phẩm" name ="name" value ="<?php echo $editProduct['name']?>">
                <?php if (isset($error['name'])) : ?>
                  <p  class ="text-danger"> <?php echo $error['name']?> </p>
                <?php endif ?>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"><h6>Giá sản phẩm</h6></label>
              <div class="col-sm-3">
                <input type="number" class="form-control" id="inputEmail3" placeholder="9.000.000" name ="price" value ="<?php echo $editProduct['price']?>">
                <?php if (isset($error['price'])) : ?>
                  <p  class ="text-danger"> <?php echo $error['price']?> </p>
                <?php endif ?>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"><h6>Giảm giá</h6></label>
              <div class="col-sm-1">
                <input type="number" class="form-control" id="inputEmail3" placeholder="10%" name ="sale"  value ="<?php echo $editProduct['sale']?>">
              </div>
              <label for="inputEmail3" class="col-sm-1 col-form-label"><h6>Hình ảnh</h6></label>
              <div class="col-sm-3">
                <input type="file" class="form-control" id="inputEmail3"  name ="thunbar" value ="<?php echo $editProduct['thunbar']?>"> 
              <?php if (isset($error['thunbar'])) : ?>
                  <p  class ="text-danger"> <?php echo $error['thunbar']?> </p>
                <?php endif ?>
                <img src ="<?php echo uploads()?>products/<?php echo $editProduct['thunbar']?>" width ="50px" height ="50px">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"><h6>Nội dung</h6></label>
              <div class="col-sm-4">
                <textarea class ="form-control" name="content" rows ="4"><?php echo $editProduct['content']?></textarea>
                <?php if (isset($error['content'])) : ?>
                  <p  class ="text-danger"> <?php echo $error['content']?> </p>
                <?php endif ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"><h6>Số lượng sản phẩm</h6></label>
              <div class="col-sm-1">
                <input type="number" class="form-control" id="inputEmail3" placeholder="100" name ="number" value ="<?php echo $editProduct['number']?>">
                <?php if (isset($error['number'])) : ?>
                  <p  class ="text-danger"> <?php echo $error['number']?> </p>
                <?php endif ?>
                
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-success">Save</button>
              </div>
            </div>
          </form>
      </div>
    </div>

    <!-- Page Content -->
    

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
<header id="header" class="">
  
</header><!-- /header -->