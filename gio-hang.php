
<?php 
    require_once __DIR__. "/autoload/autoload.php";
    if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
    {
    	echo "<script> alert('Không có sản phẩm trong giỏ hàng');location.href ='index.php'</script>"; 
    }
?>
<?php require_once __DIR__. "/layouts/header.php"; ?>
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<h2>Shopping Cart</h2>
						<div class="page_link">
							<a href="index.php">Home</a>
							<a href="shoppingcart.php.html">Cart</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Cart Area =================-->
        <section class="cart_area">
        	<div class="container">
        		<div class="cart_inner">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">STT</th>
									<th scope="col">Product</th>
									<th scope="col">Price</th>
									<th scope="col">Quantity</th>
									<th scope="col">Total</th>
									<th scope="col">Action</th>

								</tr>
							</thead>
							<tbody>
								<?php $sum = 0 ?>
								<?php $stt = 1; foreach($_SESSION['cart'] as $key =>$value): ?>
									<tr>
										<td><?php echo $stt ?></td>
										<td>
											<div class="media">
												<div class="d-flex">
													<img src="<?php echo uploads()?>products/<?php echo $value['thunbar'] ?>" width ="80px" height = "80px">
												</div>
												<div class="media-body">
													<p><?php echo $value['name'] ?></p>
												</div>
											</div>
										</td>
										<td>
											<h5><?php echo formatNumber($value['price']) ?></h5>
										</td>
										<td>
											<div >
												<h5><?php echo ($value['qty']) ?></h5>
											</div>
										</td>
										<td>
											<h5><h5><?php echo formatNumber(($value['price'])*$value['qty']) ?></h5></h5>
										</td>
										<td>
					                        <a class = "btn btn-xs btn-info" href ="edit.php?id=<?php echo $item['id'] ?>"><i class ="fa fa-edit"></i>Sửa</a>
					                        <a class = "btn btn-xs btn-danger" href ="remove.php?key=<?php echo $key ?>"><i class ="fa fa-times"></i>Xóa</a>
					                      </td>
									</tr>
									<?php $sum+= $value['price'] * $value['qty'];$_SESSION['tongtien'] = $sum; ?>
								<?php  $stt ++; endforeach ?>

								<tr class="bottom_button">
									<td>
										<!-- <a class="gray_btn" href="#">Update Cart</a> -->
									</td>
									<td>
										
									</td>
									<td>
										
									</td>
									<td>
										<div class="cupon_text">
											<a class="main_btn" href="#">Thông tin đơn hàng</a>
										</div>
									</td>
								</tr>
								<tr>

									<td>
									</td>
									<td>
										<h5>Số tiền</h5>
									</td>
									<td>
										<h5>
											<?php echo formatNumber($_SESSION['tongtien']) ?>
										</h5>
									</td>
								</tr>
								<tr>

									<td>
										
									</td>
									<td>
										<h5>Thuế VAT</h5>
									</td>
									<td>
										<h5>10%</h5>
									</td>
								</tr>
								<tr>
									<td>
										
									</td>
									<td>
										<h5>Giảm giá</h5>
									</td>
									<td>
										<h5><?php echo sale($_SESSION['tongtien']) ?>%</h5>
									</td>
								</tr>
								<tr>
									<td>
										
									</td>
									<td>
										<h5>Tổng tiền thanh toán</h5>
									</td>
									<td>
										<h5><?php echo formatNumber(($_SESSION['tongtien'])-($_SESSION['tongtien'])*sale($_SESSION['tongtien'])/100+($_SESSION['tongtien'])*1/10) ?></h5>
									</td>
								</tr>
								<tr class="out_button_area">
									<td>
										
									</td>
									<td>
										
									</td>
									<td>
										<div class="checkout_btn_inner">
											<a class="gray_btn" href="index.php">Continue Shopping</a>
											<a class="main_btn" href="thanh-toan.php">Proceed to checkout</a>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
        		</div>
        	</div>
        </section>
        <!--================End Cart Area =================-->
        
        <!--================Cart Total Area =================-->
<!--
        <section class="cart_total_area">
        	<div class="container">
        		<div class="cart_total_inner">
        			<div class="total_head">
        				
        			</div>
        			.
        		</div>
        	</div>
        </section>
-->
        <!--================End Cart Total Area =================-->
        
        <!--================ start footer Area  =================-->	
 <?php require_once __DIR__. "/layouts/footer.php"; ?>      