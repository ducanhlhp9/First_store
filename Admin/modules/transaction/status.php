<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    $id = intval(getInput('id'));

    $editTransaction = $db->fetchID("transaction", $id);
    if(empty($editTransaction))
    {
      $_SESSION['error'] ="Dữ liệu không tồn tại";
      redirectAdmin("transaction");
    }
    // kiểm tra đang xử lý hay chưa thì không được xử lý nữa
    if($editTransaction['satus'] == 1)
    {
      $_SESSION['error'] ="Đơn hàng đang được xử lý rồi !!";
      redirectAdmin("transaction");
    }
    $status = 1;

    $update = $db->update("transaction", array("status" => $status), array("id" => $id));
    if($update > 0)
    {
      $_SESSION['success'] ="update  thành công";
      // trừ đi sản phẩm theo đơn hàng trong bảng products
      $sql = "select product_id, qty from oder where transaction_id = $id";
      $order = $db->fetchsql($sql);
      foreach ($order as $item) 
      {
        $idproduct = intval($item['product_id']);
        $product = $db->fetchID("products", $idproduct);
        $number = $product['number'] - $item['qty'];
        $up_pro = $db->update("products", array("number"=>$number,"pay"=>$product['pay']+1), array("id"=>$idproduct));
      }
      redirectAdmin("transaction");// back lai trang danh sach
    }
    else{
      $_SESSION['error'] ="Dữ liệu không thay đổi";
      redirectAdmin("transaction");
    }
?>