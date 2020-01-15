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
					<li><a href="oder.php">Quản lí Đơn hàng</a></li>
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
				<span class="cart-count-mobile" id="total-cart"><?php $_SESSION['cart']; echo $qty;?></span>
			 </a>
			</li>
			</center>
		</ul>
		</nav>
	 <div class="col-sm-12" ><ul style="height: 50px;background-color: #f3f3f3; font-weight: bold;font-size: 28px;font-family:cursive ;text-align: center;" >Nhẫn</ul></div>

	   </div>
	</div>
</div>

 <div class="container " >
 <section class="hoatai ">
          <div class="row mt-5" >
     <?php 
     include("sql/connect_sql.php");
     $sql="SELECT * FROM products";
     $result=mysqli_query($mysqli,$sql);
     if ($result) {
     	while ($row = mysqli_fetch_array($result)) {
     		if($row['id_categories']==1){
  echo"<div class='col-sm-3'  id='id'><div class='card'><div class='sale'><span style='background-color: #D74444'>".$row['sale']."%</span></div><img src='image/".$row['image']."'id='img' alt='image'><div class='overlay'><h5 id='title'>".$row['namepro']."</h5><p><span id='price'>".$row['price']." đ</span><br></p><div class='sp'><a href='add_cart.php?item=".$row['id_pro']."'class='btn btn-warning'>Thêm giỏ hàng</a><a href='detail.php?idtail=".$row['id_pro']."' class='btn btn-warning' name='detail' >Chi tiết</a></div></div></div></div>";
}
}
}		
      ?>   
  </div>    
</section>
</div>
<hr>
<div  class="bottom"  >
		<div class="row" >
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
