<?php 
    $open ="users";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));

    $DeleteAdmin = $db->fetchID("users",$id);
    if(empty($DeleteAdmin))
    {
      $_SESSION['error'] = " không tồn tại";
      redirectAdmin("users");
    }
    // kiểm tra xem danh mục đã có sản phẩm chưa
    $num = $db->delete("users",$id);
    if($num > 0)
    {
      $_SESSION['success'] ="Xóa thành công";
      redirectAdmin("users");
    }
    else
    {
      $_SESSION['error'] ="Xóa thất bại";
      redirectAdmin("users");
    }
?>