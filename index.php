<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS & JS -->
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
	<?php require("login.php")?>	
	<?php require("registration.php")?>	
	<div class="container-fuilt" >
		
		<div class="row" >
			<div class="header" >
				<div class="col-sm-3" style=" display: inline-block;"><span><img src="image/logo1.png"></span></div>
				<div class="search-container col-sm-5">
					<form action="search.php" class="form-inline">
						<input id ="tkiem" class="form-control"  type="text" placeholder="Nhập tìm kiếm.." name="search">
						<button id ="btkiem" class="form-control" name="submit"type="submit">Submit</button>
					</form>
				</div>	
				<div class="login col-sm-2">
					<center ><span><img src="image/user.png"></span>
						<p><span id="dn" 
							<?php
							if (isset($_SESSION['log'])||isset($_SESSION['use'])){  
								echo "style='display:none'";
							}else{
								echo "style='display:block'";
							}
							?>
							><a  data-toggle="modal" href="#modal-dn">Đăng nhập</a>/<a data-toggle="modal" href='#modal-dk'>Đăng kí</a></span>
							<form method="POST">
								<button type="submit" name="logout" id="logout"  <?php
								if (isset($_SESSION['log'])||isset($_SESSION['use']) ){  
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
							<ul class="menu"  ><center>
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
								<span class="cart-count-mobile" id="total-cart"><?php
									session_start();
									include('sql/connect_sql.php');
									if (isset($_SESSION['cart'])) {
										$qty=0;
										$qty=count($_SESSION['cart']);
										echo $qty;
									}

									?></span>
							</a>
						</li>
					</center>
				</ul>
			</nav>
		</div>
		<div class="slidee col-sm-12" >
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
				</ol>
				<div class="carousel-inner">
					<div class="item active">
						<img src="image/sl1.jpg"class="sl">
					</div>
					<div class="item">
						<img src="image/ltay.jpg"class="sl">
					</div>
					<div class="item">
						<img src="image/sli3.jpg"class="sl" >
					</div>
					<div class="item">
						<img src="image/sli4.jpg"class="sl" >
					</div>
				</div>
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<div>
		</div>
	</div>
</div>


<div class="body">
	<div class="row">
		<hr>
		<div class=" container">
			<div style="color: black"><CENTER><h1 style="height: 50px;background-color: #f3f3f3; font-weight: bold;font-size: 28px;font-family:cursive ;text-align: center;"><b>SẢN PHẨM NỔI BẬT</b></h1></CENTER></div>
			<section class="hoatai ">
				<div class="row col-sm-12" >
					<?php 
					include("sql/connect_sql.php");
					$sql="SELECT * FROM products";
					$result=mysqli_query($mysqli,$sql);
					if ($result) {
						while ($row = mysqli_fetch_array($result)) {
							
							echo"<div class='col-sm-3'  id='id'><div class='card'><div class='sale'><span style='background-color: #D74444'>".$row['sale']."%</span></div><img src='image/".$row['image']."'id='img' alt='image'><div class='overlay'><h5 id='title'>".$row['namepro']."</h5><p><span id='price'>".$row['price']." đ</span><br></p><div class='sp'>
							<a href='add_cart.php?item=".$row['id_pro']."'class='btn btn-warning'>Thêm giỏ hàng</a><a href='detail.php?idtail=".$row['id_pro']."' class='btn btn-warning' name='detail' >Chi tiết</a></div></div></div></div>";
							

						}
					}		
					?>   
				</div>
			</div>
		</section>	
		<div class="con"><img src="image/btom.png" style="width: 100%"></div>
 	<!-- <section>
 		 		<div  style="color: black"><CENTER><h1 style="height: 50px;background-color: #f3f3f3; font-weight: bold;font-size: 28px;font-family:cursive ;text-align: center;"><b>SẢN PHẨM MỚI NHẤT</b></h1></CENTER></div>
 		<div></div>
 	</section> -->
 </div>
</div>
</div>

</div>

<div  class="bottm" style="position: relative;border-top: 1px solid;"  >
	<hr>
	<div class="row" style="margin-left: 10px" >
		<div class="col-sm-3"><h5>CHĂM SÓC KHÁCH HÀNG</h5>
			<P>101B Lê Hữu Trác, Phước Mỹ, Sơn Trà, Đà Nẵng</P>
			<P>(+84) 344 xxx xxx</P>
			<P>mama.ho.@gmail.com</P>
			<P>Thời gian mở cửa:</P><span>8h-22h tất cả các ngày</span>
		</div>
		<div class="col-sm-3">
			<h5> VỀ CHÚNG TÔI</h5>
			<P>Trang chủ</P>
			<P>Giới thiệu</P>
			<P>Sản phẩm</P>
			<P>Tin tức</P>
			<P>Liên hệ</P>
			
		</div>
		<div class="col-sm-3">
			<h5> THÔNG TIN</h5>
			<P>Trang chủ</P>
			<P>Giới thiệu</P>
			<P>Sản phẩm</P>
			<P>Tin tức</P>
			<P>Liên hệ</P>
			
		</div>
		<div class="col-sm-3">
			<h5> HỖ TRỢ</h5>
			<P>Trang chủ</P>
			<P>Giới thiệu</P>
			<P>Sản phẩm</P>
			<P>Tin tức</P>
			<P>Liên hệ</P>
			
		</div>
	</div>	
</div>
</div>
</body>
</html>