<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<?php include('sql/connect_sql.php') ?>
	<form action="" class="form-group" method="POST" role="form">
<!-- Đăng ký -->
	<div class="modal fade" id="modal-dk">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					
						<legend>ĐĂNG KÝ</legend>
						<div class="form-group">
							<label for="">Họ và tên:</label>
							<input type="text" name="name"  class="form-control" value="<?php error_reporting(0);echo $_POST['name']?>" placeholder="Nhập họ và tên">
						</div>
						<div class="form-group">
							<label for="">Số điện thoại hoặc email:</label>
							<input type="text" class="form-control" value="<?php error_reporting(0); echo $_POST['sdt']?>" name="sdt" placeholder="Nhập số điện thoại hoặc email">
						</div>
						<div class="form-group">
							<label for="">Mật khẩu</label>
							<input type="password" class="form-control" name="password" value="<?php error_reporting(0); echo $_POST['password']?>" placeholder="Nhập mật khẩu">
						</div>
						<div class="form-group">
							<label for="">Giới tính</label>
							<input type="radio" name="gender" value="nam">Nam
 							 <input type="radio" name="gender"value="nữ" > Nữ<br>
						</div>
						<div class="form-group">
							<label for="">Ngày sinh:</label>
							<input type="date" name="bday" value="<?php error_reporting(0); echo $_POST['bday']?>">
						</div>
						<div class="form-group">
							<label for="">Nơi ở</label>
							<input type="text" class="form-control" name="address" value="<?php error_reporting(0); echo $_POST['address']?>" placeholder="Xã/thị trấn,Huyện/thị xã,Tỉnh/thành phố">
						</div>
					
				</div>
				<div class="modal-footer">
					 <button type="submit" name="signup" class="btn btn-default" >Đăng kí</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
			               
				</div>
				
			</div>
		</div>
	</div>
	</form>
</body>
</html>
 

  	<?php
// Thêm----------------------------------------------------------------------------
	 session_start();
					error_reporting(0);

	if(isset($_POST["signup"])){
	
	$name= $_POST['name'];
	$gender= $_POST['gender'];
	$bday=$_POST['bday'];
	$sdt=$_POST['sdt'] ;
	$address= $_POST['address'];
	$password= $_POST['password'];
	 
	if ($name==null && $gender==null&& $bday==null&& $sdt==null&& $address==null && $password==null ) {
		# code...
	echo "<script>alert(' Xin hãy vui lòng điền đây đủ thông tin');</script>";
	} else{
  					// Kiểm tra tài khoản đã tồn tại chưa
  					$sql="select * from user where username='$sdt'";
					$kt=mysqli_query($mysqli, $sql);
 
					if(mysqli_num_rows($kt)  > 0){
						echo "<script>alert(' Tài khoản đã tồn tại');</script>";
						header("Location: index.php");

					}
	else {
	$sql="INSERT INTO user 
		VALUES(null,'$name','$gender','$bday','$sdt','$address','$password',1)";	
		if (mysqli_query($mysqli, $sql) == true) {
 echo "<script>alert('đăng kí thành công');</script>";
 $_SESSION['user'] = $sdt;
  header("Location: index.php");

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
        header("Location: index.php");
    }
	}
	}
	

	 
	
	}
		
 ?> 