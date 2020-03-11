
<?php 
    $open ="transaction";
    require_once __DIR__. "/../../autoload/autoload.php";
    if(isset($_GET['page'])) // if not exist
    {
      $p = $_GET['page'];
    }
    else
    {
      $p =1;
    }
    // pagination
    $sql = "SELECT transaction.*, users.name as nameuser, users.phone as phoneuser,users.address as address  from transaction left join users on users.id = transaction.user_id order by ID DESC";
    $transaction = $db->fetchJone('transaction',$sql,$p,3,true);
    if(isset($transaction['page']))
    {
      $sotrang = $transaction['page'];// huy truong $sotrang o trong ham fetchjone
      unset($transaction['page']);
    }
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
  <!-- Page Content -->
    <h1>
        Danh sách Đơn hàng
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
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Trạng thái</th>
                    <th>Action</th>
                  </tr>
                </thead>
            
                <tbody>
                  <?php $stt = 1; foreach ($transaction as $item): ?>
                    <tr>
                      <td><?php echo $stt ?></td>
                      <td><?php echo $item['nameuser'] ?></td>
                      <td><?php echo $item['phoneuser'] ?></td> 
                      <td><?php echo $item['address'] ?></td> 
                      <td> 
                        <a class = "btn btn-xs <?php echo $item['status'] == 0?'btn-danger':'btn-info'?>" href="status.php?id=<?php echo $item['id'] ?>"><?php echo $item['status'] == 0?'chưa xử lý':'Đã xử lý' ?></a>
                      </td> 

                      <td>
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
                      <?php $count = $db->countTable('transaction') ?>
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