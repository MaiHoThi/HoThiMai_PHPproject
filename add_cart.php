
	<?php			
          # code...

	session_start();
   	# code...
	include 'sql/connect_sql.php';
	if(isset($_GET['item'])){
		$id=$_GET['item'];
		$qty=NULL;
// if(isset($_SESSION['cart'][$id]))
// {
		$qty = $_SESSION['cart'][$id] + 1;
		$id_cus = $_SESSION['id_cus'];
		$sql="INSERT into cart(id_order,id_cus,id_pro,quantity) values( null,$id_cus,$id,$qty);";
		if(mysqli_query($mysqli,$sql)){
			$_SESSION['cart']=true;
			header("location:cart.php");
			$_SESSION['cart'][$id]=$qty;

			exit();
		}else{
			echo "bạn phải đăng ký hoặc đăng nhập trước khi thêm giỏ hàng";
			header('location: index.php');
		}
// }
// else
// {
//     $qty=1;
// }
// $_SESSION['cart'][$id]=$qty;


	}
	?>			
