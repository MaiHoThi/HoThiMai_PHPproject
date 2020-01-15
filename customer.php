<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>	
	<script src="https://kit
	.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<div class="container-fluid">
<?php require("sql/connect_sql.php") ?>
<?php require("login.php")?>	
<!-- <?php require("registration.php")?>	
 --><div class="container-fuilt" >
	
	<div class="row" >
	<div class="header" >
		<div class="col-sm-3" style=" display: inline-block;"><span><img src="image/logo1.png"></span></div>
		<div class="search-container col-sm-5">
		    <form action="/action_page.php" class="form-inline">
		      <input id ="tkiem" class="form-control"  type="text" placeholder="Nhập tìm kiếm.." name="search">
		      <button id ="btkiem" class="form-control" type="submit">Submit</button>
		    </form>
		  </div>	
		<div class="login col-sm-2">
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
			
			<li><a  href="#"><b>ỨNG DỤNG</b></a>
				<ul class="dropdown-menu">
					<li><a href="addproduct.php">Quản lí sản phẩm</a></li>
					<li><a href="customer.php">Quản lí Khách hàng</a></li>
					<li><a href="user.php">Quản lí đơn hàng</a></li>
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
	 <div class="col-md-12" ><ul style="height: 50px;background-color: #f3f3f3; font-weight: bold;font-size: 28px;font-family:cursive ;text-align: center;" >Quản lí khách hàng</ul></div>

	   </div>
	</div>
</div>
</div>
<div class="container">
   
  	<?php
// Thêm----------------------------------------------------------------------------
	
					error_reporting(0);


   
	$sql_user="SELECT*FROM user ORDER By id_cus ASC";
	$result=mysqli_query($mysqli,$sql_user);
	
if($result){
	echo "<table class='table table-hover' border='1' cellspacing='0' cellpadding='10'>";
       echo " <thead>";
       echo " <tr><th>Mã</th><th>Họ Và tên</th><th>Giới tính</th><th>Ngày sinh</th><th>Số điện thoại hoặc email</th><th>Địa chỉ</th><th>Xóa</th></tr>";
       echo " </thead>";
       echo " <tbody>";
       // <th>Sửa</th><th>Xóa</th>
while($row = mysqli_fetch_array($result)){
			echo "<tr class='odd gradeX' align='center'>";
			echo"<td>".$row['id_cus']."</td>";
			echo"<td>".$row['name']."</td>";
			echo"<td>".$row['gender']."</td>";
			echo"<td>".$row['birthday']."</td>";
			echo"<td>".$row['username']."</td>";
			echo"<td>".$row['address']."</td>";

			echo"<td class='center'><a href='de_edit.php?cusxoa=".$row['id']."> <i class='fa fa-frash-o fa-lg'>Xóa</i></a></td>";
			echo"</tr>";
			

		}
		echo "</tbody>";
			echo "</table>";	
		}

 ?>
</div>

</body>
</html>