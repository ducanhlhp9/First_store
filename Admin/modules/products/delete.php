<?php 
    $open ="products";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));

    $DeleteProduct = $db->fetchID("products",$id);
    if(empty($DeleteProduct))
    {
      $_SESSION['error'] = "Sản phẩm không tồn tại";
      redirectAdmin("products");
    }
    // kiểm tra xem danh mục đã có sản phẩm chưa
    $num = $db->delete("products",$id);
    if($num > 0)
    {
      $_SESSION['success'] ="Xóa thành công";
      redirectAdmin("products");
    }
    else
    {
      $_SESSION['error'] ="Xóa thất bại";
      redirectAdmin("products");
    }
?>