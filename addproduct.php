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
		<div class="login col-sm-2">
				<center ><span><img src="image/user.png"></span>
				<p><!-- <span id="dn" 
					<?php
					if (isset($_SESSION['use'])){  
					 echo "style='display:none'";
					}else{
						echo "style='display:block'";
					}
					?>
					><a  data-toggle="modal" href="#modal-dn">Đăng nhập</a>/<a data-toggle="modal" href='#modal-dk'>Đăng kí</a></span> -->
					<form method="POST">
						<a type="submit" name="logout" id="logout" class="btn btn-default" href="index.php"<?php
					if (isset($_SESSION['use']) ){  
					 echo "style='display:block'";
					}else{
				 echo "style='display:none'";
					}
					?>
					>Đăng xuất</a>
					</form>
				</p></center>
				<?php 
				if (isset($_POST['logout'])){
					 unset($_SESSION['use']);

				   
				} ?>
				
				
		</div>
		<div id="menu">
		<nav class="col-sm-12" style="background-image: url(image/bg1.jpg);">
		<ul class="menu" ><center>
			<li><a  href="#"><b>ỨNG DỤNG</b></a>
				<ul class="dropdown-menu">
					<li><a href="addproduct.php">Quản lí sản phẩm</a></li>
					<li><a href="customer.php">Quản lí Khách hàng</a></li>
					<li><a href="order.php">Quản lí Đơn hàng</a></li>
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
	 <div class="col-md-12" ><ul style="height: 50px;background-color: #f3f3f3; font-weight: bold;font-size: 28px;font-family:cursive ;text-align: center;" >Thêm sản phẩm</ul></div>

	   </div>
	</div>
</div>
</div>
<div class="container">

<!-- Thêm -->
	<form action="" method="POST" role="form"	class="form-group">
		<legend></legend>
		<div class="form-group col-md-6">
			<label>Loại</label>
			<select name="categories"  class="form-control" style="text-align: center" >
				<?php 
				$sql="SELECT*FROM categories";
				$result=mysqli_query($mysqli,$sql);
				if($result){
					while ($row=mysqli_fetch_array($result))
					 {
				 ?>
				<option value="<?php echo $row['id_categories']; ?>"><?php echo $row['name']; ?></option>
					<?php } }?>
				</select>
		</div>
		<div class="form-group col-md-6">
			<label>Tên sản phẩm</label>
			<input class="form-control" type="text" name="name" placeholder="Nhập tên sản phẩm" >
		</div>
		<div class="form-group col-md-6">
			<label>Giá</label>
			<input class="form-control"type="text" name="price" placeholder="Nhập giá " >
		</div>
		<div class="form-group col-md-6">
			<label>Số lượng</label>
			<input class="form-control"type="number"name="quantity" min="0"value="0">
		</div>
		<div class="form-group col-md-6">
			<label>Khuyễn mãi(nếu có)</label>
			<input class="form-control"type="text"name="sale" placeholder="Nhập giá khuyến mãi" >
		</div>
		<div class="form-group col-md-6">
			<label>Hình ảnh</label>
			<input type="file" name="img"  class="form-control-file" >
			
		</div>
		<button type="submit" name="insert" class="btn btn-default">Thêm</button>
	</form>
    
   
    <table class="table table-hover" border="1" cellspacing="0" cellpadding="10">
        <thead>
        <tr><th>Mã</th><th>Ảnh</th><th>Name</th><th>Giá</th><th>Số lượng</th><th>Khuyến mãi</th><th>Sửa</th><th>Xóa</th></tr>
        </thead>
        <tbody> 
<!-- <input name="tang" type="button" value="Tăng dân!"><input name="giam" type="button" value="Giảm dân!"> -->
<?php
		session_start();
// Thêm----------------------------------------------------------------------------
	if(isset($_POST["insert"])){

	$name=mysqli_real_escape_string($mysqli, $_REQUEST['name']);
	$price=mysqli_real_escape_string($mysqli, $_REQUEST['price']);
	$quantity=mysqli_real_escape_string($mysqli, $_REQUEST['quantity']);
	$sale=mysqli_real_escape_string($mysqli, $_REQUEST['sale']);
	$categories=$_POST['categories'];
	$img=mysqli_real_escape_string($mysqli, $_REQUEST['img']);
	$sql="INSERT INTO products(namepro,price,quantity,sale,id_categories,image)
		VALUES('$name','$price','$quantity','$sale','$categories','$img')";	


// bảng-----------------------------------------------------------------------
	 if (mysqli_query($mysqli, $sql)) {
 echo "<script>alert('success');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
		
	}
	$sql="SELECT*FROM products ORDER By id_pro DESC";
	$result=mysqli_query($mysqli,$sql);


	
	
if($result){
while($row = $result->fetch_assoc()){

			echo "<tr class='odd gradeX' align='center'>";
			echo"<td>".$row['id_pro']."</td>";
			echo"<td><img src='image/".$row['image']."' style='width:100px;height:100px'></td>";
			echo"<td>".$row['namepro']."</td>";
			echo"<td>".$row['price']."</td>";
			echo"<td>".$row['quantity']."</td>";
			echo"<td>".$row['sale']."</td>";
			echo"<td class='center'><a href='de_edit.php?idsua=".$row['id_pro']."<i class='fa fa-pencil'>Chỉnh sửa</i></a></td>";

			echo"<td class='center'><a href='de_edit.php?idxoa=".$row['id_pro']." <i class='fa fa-frash-o fa-lg'>Xóa</i></a></td>";
			echo"</tr>";

		}
		}



 ?>
 	
 </tbody>
	</table>		
</div>

</body>
</html>