<!DOCTYPE html>
<html>
<head>
	<style>
		table, th, td {
/*  border: 1px solid black;
*/  border-collapse: collapse;
/*  border: 2px solid red;
*/  border-radius: 12px;
}
th, td {
	
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>	
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<div class="container-fuilt" >
		
		<div class="row" >
			<div class="header" >
				<div class="col-sm-3" style=" display: inline-block;"><span><img src="image/logo1.png"></span></div>
				<div class="search-container col-sm-5">
					<form action="/action_page.php" class="form-inline">
						<input id ="tkiem" class="form-control"  type="text" placeholder="Nhập tìm kiếm.." name="search">
						<button id ="btkiem" class="form-control" type="submit">Submit</button>
					</form>
				</div>	
				<div class="login col-sm-4">
					<center ><span><img src="image/user.png"></span>
						<p><span id="dn" 
							<?php
							if (isset($_SESSION['log'])){  
								echo "style='display:none'";
							}else{
								echo "style='display:block'";
							}
							?>
							><a  data-toggle="modal" href="#modal-dn">Đăng nhập</a>/<a data-toggle="modal" href='#modal-dk'>Đăng kí</a></span>
							<form method="POST">
								<button type="submit" name="logout" id="logout"  <?php
								if (isset($_SESSION['log']) ){  
									echo "style='display:block'";
								}else{
									echo "style='display: none'";
								}
								?>
								>Đăng xuất</button>
							</form>
						</p></center>
						<?php 
						if (isset($_POST['logout'])){
							header('Location: index.php');
							session_destroy();
							echo "<script>alert('Đăng xuất thành công')</script>";
							
						} ?>
						
						
					</div>
					<div id="menu">
						<nav class="col-sm-12" style="background-image: url(image/bg1.jpg);">
							<ul class="menu" ><center>
								<li <?php if (isset($_SESSION['use']) ){  
									echo "style='display:block'";
								}else{
									echo "style='display:none'";
								}
								?>><a  href="#" ><b>ỨNG DỤNG</b></a>
								<ul class="dropdown-menu">
									<li><a href="addproduct.php">Quản lí sản phẩm</a></li>
									<li><a href="customer.php">Quản lí Khách hàng</a></li>
									<li><a href="user.php">Quản lí Đơn hàng</a></li>
								</ul>
							</li>
							<li><a href="index.php"><b>TRANG CHỦ</b></a></li>			
							<li><a href="#"><b>GIỚI THIỆU</b></a></li>
							<li><a  href="#"><b>SẢN PHẨM</b></a>
								<ul class="dropdown-menu">
									<li><a href="Eardrop.php">Hoa tai</a></li>
									<li><a href="Ring.php">Nhẫn</a></li>
									<li><a href="Specialized.php">Dây chuyên</a></li>
									<li><a href="Jewelry.php">Bộ trang sức</a></li>
									<li><a href="Bangles.php">Lắc tay</a></li>
									<li><a href="Shackingleg.php">Lắc chân</a></li>
									<li><a href="Watch.php">Đồng hồ</a></li>
								</ul>
							</li>

							<li><a href="#"><b>TIN TỨC</b></a></li>
							<li><a><span><b><img src="image/call.png"></b></span><span>LIÊN HỆ</span></a></li>
							<li><a href="cart.php" style="text-decoration: none;">
								<span><img src="image/cart.png"></span>
								<span class="cart-count-mobile" id="total-cart">0</span>
							</a>
						</li>
					</center>
				</ul>
			</nav>
			<div class="col-md-12" ><ul style="height: 50px;background-color: #f3f3f3; font-weight: bold;font-size: 28px;font-family:cursive ;text-align: center;" >Chi tiết sản phẩm</ul></div>

		</div>
	</div>
</div>
</div>
<div class="container">
	<table style="width:100%;height:500px;background-color: #C7D1C4; ">
		<tr>
			<?php 
			include('sql/connect_sql.php');
			error_reporting(0);

			if(isset($_GET['idtail'])){

				$id =$_GET['idtail'];

				$sql="SELECT image, namepro, sale, price FROM products Where id_pro='$id'";

				$result=mysqli_query($mysqli,$sql);

				if ($result) {
					while ($row= mysqli_fetch_array($result)){
						if ( $row['sale'] >0) {
 				# code...
							$gia=  $row['price']-($row['sale']/100);
						}
						else
							$gia=$row['price']
						
						?>
						
						<tr>
							<th rowspan="3" style="width: 20%;"> <img src='image/<?php echo $row['image']; ?>'style="width: 300px;height: 300px;  border: 2px solid red; border-radius: 12px;  background-color: #E2DEDE;
							" ></th>

							<td style="text-align: center;"><b><p>Tên:<?php echo  $row['namepro']; ?></p><br>
								<p>Giảm giá:<?php echo  $row['sale'] ;?>%</p><br>
								<p>Giá Gốc:<?php echo  $row['price']; ?>đ</p><br>
								<p>Tổng Giá:<?php echo  $gia; ?>đ</p></b>
							</td>
						</tr>
						<th>
							<td><a href="add_cart.php?item='<?php echo $row['id'] ;?> '"class="btn btn-warning">Mua hàng</a></td>
						</th>
						<?php 
					}
				}else{
					echo "<script>alert('Không tìm thấy');</script>";
				}
				
			}
			?>
		</table>
	</div>
</body>
</html>
