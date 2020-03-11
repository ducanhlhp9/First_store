
<?php 
    require_once __DIR__. "/autoload/autoload.php";
     if (!isset($_SESSION['name_id']))
    {
      echo "<script> alert('Bạn phải đăng nhập mới có thể thực hiện được chức năng này!!');location.href ='index.php'</script>";
    }
    // lấy id và chi tiết của sản phẩm
     $id = intval(getInput('id'));


    // chi tiet sản phẩm
    $product = $db->fetchID("products",$id);

    if( ! isset($_SESSION['cart'][$id]))
    {
    	$_SESSION['cart'][$id]['name'] = $product['name'];
    	$_SESSION['cart'][$id]['thunbar'] = $product['thunbar'];
    	// $_SESSION['cart'][$id]['price'] = $product['price'];
    	$_SESSION['cart'][$id]['qty'] = 1;
    	
    	$_SESSION['cart'][$id]['price'] =((100 - $product['sale']) *$product['price'])/100;
    	
    }
    else
    {
    	$_SESSION['cart'][$id]['qty'] = $_SESSION['cart'][$id]['qty'] +1;
    }
    echo "<script> alert('Thêm mới sản phẩm thành công!!');location.href ='gio-hang.php'</script>";
?>
