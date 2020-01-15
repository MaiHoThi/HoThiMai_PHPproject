<?php 
error_reporting(0);
include("sql/connect_sql.php");
// insert product

// function show_pro(){
// 	echo "<cript <div class='col3-3' id='id'><div class='card'><div class='sale'><span style='background-color: #D74444'>".$i['sale']."%</span></div><img src='".$i['img']."'id='img' alt='image'><div class='overlay'><h5 id='title'>".$i['name']."</h5><p><span id='price'>".$i['price']."</span><br></p><div class='sp'><a href='add_cart.php?item=".$row['id_pro']."'class='btn btn-warning'>Thêm giỏ hàng</a><a href='detail.php?idtail=".$row['id_pro']."' class='btn btn-warning' name='detail' >Chi tiết</a></div></div></div></div></script>";
// }
$target_file="image/".basename($_FILE['img']['name']);
$upload=1;
	if(isset($_POST['insert'])){
	$name=$_POST['name'];
	$quantity=$_POST['quantity'];
	$price=$_POST['price'];
	$img="<img src='image/'>";
	$categories=$_POST['categories'];
	$sale=$_POST['sale'];
	$sql="INSERT INTO products
		VALUES('$name','$quantity','$price','$img','$categories','$sale');";
		
		if(mysqli_query($mysqli,$sql))
		{
			header("location:addproduct.php?addps=success");
			exit();
		}else
		{
			header("location:addproduct.php?addps=fail");
			exit();
		}
		
		
	}
	
	
		
// insert admin

	mysqli_close($mysqli);


 ?>