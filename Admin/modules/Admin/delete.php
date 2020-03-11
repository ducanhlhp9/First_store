<?php 
    $open ="admin";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));

    $DeleteAdmin = $db->fetchID("admin",$id);
    if(empty($DeleteAdmin))
    {
      $_SESSION['error'] = " không tồn tại";
      redirectAdmin("admin");
    }
    // kiểm tra xem danh mục đã có sản phẩm chưa
    $num = $db->delete("admin",$id);
    if($num > 0)
    {
      $_SESSION['success'] ="Xóa thành công";
      redirectAdmin("admin");
    }
    else
    {
      $_SESSION['error'] ="Xóa thất bại";
      redirectAdmin("admin");
    }
?>