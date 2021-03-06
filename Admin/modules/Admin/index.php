
<?php 
    $open ="admin";
    require_once __DIR__. "/../../autoload/autoload.php";
   
    // $products = $db->fetchAll("products");
    // check exist pagination
    if(isset($_GET['page'])) // if not exist
    {
      $p = $_GET['page'];
    }
    else
    {
      $p =1;
    }
    // pagination
    $sql = "SELECT admin.*  from admin";
    $admin = $db->fetchJone('admin',$sql,$p,3,true);
    if(isset($admin['page']))
    {
      $sotrang = $admin['page'];// huy truong $sotrang o trong ham fetchjone
      unset($admin['page']);
    }
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
  <!-- Page Content -->
    <h1>
        Danh sách danh mục
        <a href ="add.php" class ="btn btn-info"> Thêm mới </a>
    </h1>

    <hr>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Trang chủ</a>
      </li>
      <li class="breadcrumb-item active">Danh mục</li>
    </ol>

    <!-- alert insert success -->
    <div class ="clearfix"></div>
    <?php if(isset($_SESSION['success'])) :?>
      <div class ="alert alert-success">
        <?php echo $_SESSION['success']; unset($_SESSION['success'])?>
      </div>
     <?php endif ;?> 
     <?php if(isset($_SESSION['error'])) :?>
      <div class ="alert alert-danger">
        <?php echo $_SESSION['error']; unset($_SESSION['error'])?>
      </div>
     <?php endif ;?>
    <div class= "row">
        <div class ="col-md-12">
            <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>address</th>
                    <th>Action</th>
                  </tr>
                </thead>
            
                <tbody>
                  <?php $stt = 1; foreach ($admin as $item): ?>
                    <tr>
                      <td><?php echo $stt ?></td>
                      <td><?php echo $item['name'] ?></td> 
                      <td><?php echo $item['email'] ?></td>
                      <td><?php echo $item['phone'] ?></td>
                      <td><?php echo $item['address'] ?></td>
                      <td>
                        <a class = "btn btn-xs btn-info" href ="edit.php?id=<?php echo $item['id'] ?>"><i class ="fa fa-edit"></i>Sửa</a>
                        <a class = "btn btn-xs btn-danger" href ="delete.php?id=<?php echo $item['id'] ?>"><i class ="fa fa-times"></i>Xóa</a>
                      </td>
                    </tr>
                  <?php $stt++; endforeach ?>
                </tbody>
              </table>
              <nav aria-label="Page navigation" class ="clearfix">
                  <ul class="pagination">
                    <li> 
                      <?php if (($_GET['page'] ?? 1) > 1) : ?>
                      <a class = "page-link" href= "?page=<?php echo $_GET['page'] - 1;?>" aria-label="Previous" class ="clearfix">
                        <span aria-hidden ="true">&laquo;</span>
                      </a>
                      <?php else: ?>
                        <span class = "page-link" aria-hidden ="true" >&laquo;</span>
                    <?php endif; ?>
                    </li>
                    <?php for($i =1; $i <= $sotrang; $i++) : ?>
                      <?php 
                        if(isset($_GET['page']))
                        {
                          $p = $_GET['page'];
                        }
                        else
                        {
                          $p = 1;
                        }
                      ?>
                      <li class ="paginate_button page-item <?php echo ($i == $p) ? 'active' : '' ?>">
                        <a class ="page-link" href="?page=<?php echo $i;?>"><?php echo $i; ?></a>
                      </li>
                    <?php endfor;?>
                    <li> 
                      <?php $count = $db->countTable('admin') ?>
                      <?php if (($_GET['page'] ?? 1) <($count/2) ) : ?>
                      <a class = "page-link" href= "?page=<?php echo $_GET['page'] + 1;?>" aria-label="Previous" class ="clearfix">
                        <span aria-hidden ="true">&raquo;</span>
                      </a>
                      <?php else: ?>
                        <span class = "page-link" aria-hidden ="true" >&raquo;</span>
                    <?php endif; ?>
                    </li>
                  </ul>
              </nav>

            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        </div>
    </div>

    
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>