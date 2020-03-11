<?php 
    require_once __DIR__. "/autoload/autoload.php";
    
?>
<?php require_once __DIR__. "/layouts/header.php"; ?>
      <h1>Xin chào <?php echo $_SESSION['admin_name'] ?></h1>
      <hr>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Blank Page</li>
    </ol>

    <!-- Page Content -->
    

<?php require_once __DIR__. "/layouts/footer.php"; ?>