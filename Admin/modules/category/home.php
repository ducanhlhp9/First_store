<?php 
	$open = "category";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));

    $editCategory = $db->fetchID("category",$id);
    if(empty($editCategory))
    {
      $_SESSION['error'] = "Dữ liệu không tồn tại";
      redirectAdmin("category");
    }

    $home = $editCategory['home'] == 0 ? 1 : 0;

    $update = $db->update("category", array("home" => $home), array("id" => $id));
	  if($update > 0)
	  {
	    $_SESSION['success'] ="update  thành công";
	    redirectAdmin("category");// back lai trang danh sach
	  }
	  else{
	    $_SESSION['error'] ="Dữ liệu không thay đổi";
	    redirectAdmin("category");
	  }
 ?>