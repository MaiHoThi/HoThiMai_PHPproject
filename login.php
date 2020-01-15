<?php
session_start();
?>
			
<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
<!-- LOGIN -->
<form action="" class="log" method="POST" role="form">
	<div class="modal fade" id="modal-dn">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					 <table >
			            <tr class="center">
			                <td colspan="2">
			                  ĐĂNG NHẬP
			                </td>
			            </tr>
			            <tr>
			                <td>
			                    Số điện thoại hoặc email:
			                </td>
			                <td>
			                    <input type="text" name="username">
			                </td>
			            </tr>
			            <tr>
			                <td>
			                    Password
			                </td>
			                <td>
			                    <input type="password" name="password" >
			                </td>
			            </tr>
							</table>
								<div class="modal-footer">
					 <button type="submit" name="login" class="btn btn-default" >Đăng nhập</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
			               
				</div>
			</div>
				</div>
			
		</div>
	</div>
</form>
</body>
</html>
<?php									
    include ('sql/connect_sql.php');									
									
   if(isset($_POST['login'])  ){
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		if (isset($_POST['username']) == '' && isset($_POST['password']) == '') {
			# code...
			echo ("<script>alert('Nhập thiếu thông tin')</script>");
		}else{
		// $password = md5($password);
		$sql = "SELECT * FROM  user";
		
		$user = mysqli_query($mysqli,$sql);
        while($query = mysqli_fetch_array($user)){
		if(  $query['username']==$username &&   $query['password']==$password && $query['role'] == 1)
		{		
		echo ("<script>alert('Đăng nhập thành công');</script>");
		// header("location: index.php");
		$_SESSION['log']=true;
		$_SESSION['id_cus'] = $query['id_cus'];
		$_SESSION['user'] = $query['username'];
		$_SESSION['pass'] =  $query['password'];
		}
		else if ($query['username']==$username  && $query['password']== $password && $query['role'] == 0){
			$_SESSION['use']=true;
		header("location: addproduct.php");
		}

		}
	}
}
// <!-- Đăng xuất -->

// function display(){
// 	echo'<script >
// 		document.getElementsById('login').inerHTML=none;
// 		document.getElementsById('logout').inerHTML=block;
// 	}
// </script>';
//}

		?>
		
	
				
						
