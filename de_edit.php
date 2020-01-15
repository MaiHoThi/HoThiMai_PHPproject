
<?php 
include("sql/connect_sql.php");
// Xóa sản phẩm
if(isset($_GET['idxoa'])){
 
    $idxoa=$_GET['idxoa'];
    $sql_xoa = "DELETE FROM products WHERE id_pro =' $idxoa'";
    $result =mysqli_query($mysqli,$sql_xoa);
    if ($result) {
    	 header("location: addproduct.php");

    } else {
    echo "<script>alert('cannot delete');</script>";

    }
    
   
}
if(isset($_GET['xoacart'])){
 
    $xoacart=$_GET['xoacart'];
    $sql_xoa = "DELETE FROM cart WHERE id_order =' $xoacart'";
    $result =mysqli_query($mysqli,$sql_xoa);
    if ($result) {
         header("location: cart.php");

    } else {
    // echo "cannot delete";
    echo "<script>alert('cannot delete');</script>";
         // header("location: cart.php");


    }
    
   
}
// Xóa cus
if(isset($_GET['cusxoa'])){
    $cusxoa=$_GET['cusxoa'];
    $sql_xoa = "DELETE FROM user WHERE id =' $cusxoa'";
    $result =mysqli_query($mysqli,$sql_xoa);
    if ($result) {
         header("location: customer.php");

    } else {
    echo "<script>alert('cannot delete');</script>";

    }
    
   
}

// Sửa sản phẩm
		if(isset($_POST['edit'])){
        $idsua=$_GET['idsua'];
	    $sname= $_POST['sname'];
		$sprice=$_POST['sprice'];
		$squantity= $_POST['squantity'];
		$ssale=$_POST['ssale'];
		$scategories=$_POST['scategories'];
        $image=$_POST['simg'];

		$sql_sua = "UPDATE products SET namepro = '$sname',price='$sprice',quantity = '$squantity',sale = '$ssale',id_categories = '$scategories',image = '$image' WHERE id_pro =' $idsua'";
            $result =mysqli_query($mysqli,$sql_sua);

    if ($result) {
    	# code...
        echo "<script>alert('Sửa thành công');</script>";
    	header("location:addproduct.php");
    } else {
    	# code...
    	 echo "<script>alert('cannot update');</script>";
         echo"error:".$sql_sua."mysql".mysqli_query();
    }
    
   
}



 ?>
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
<body >
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
                <center><span ><img src="image/user.png"></span>
                <p><span><a  data-toggle="modal" href="#modal-dn">Đăng nhập</a></span>/<span><a  data-toggle="modal" href='#modal-dk'>Đăng kí</a></span></p></center>
        </div>
        <div id="menu">
        <nav class="col-sm-12" style="background-image: url(image/bg1.jpg);">
        <ul class="menu" ><center>
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
     <div class="col-md-12" ><ul style="height: 50px;background-color: #f3f3f3; font-weight: bold;font-size: 28px;font-family:cursive ;text-align: center;" >Sửa sản phẩm</ul></div>

       </div>
    </div>
</div>
</div>
       <form action="" method="POST" role="form"   class="form-group" style="background-image: url(image/bg1.jpg);">
        <legend></legend>
        <div class="form-group col-md-6">
            <label>Loại</label>
            <select name="scategories"  class="form-control" style="text-align: center" >
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
            <input class="form-control" type="text" name="sname" value="<?php echo $_POST['sname'] ?>" placeholder="Nhập tên sản phẩm" >
        </div>
        <div class="form-group col-md-6">
            <label>Giá</label>
            <input class="form-control"type="text" value="<?php echo $_POST['sprice'] ?>" name="sprice" placeholder="Nhập giá " >
        </div>
        <div class="form-group col-md-6">
            <label>Số lượng</label>
            <input class="form-control"type="number" value="<?php echo $_POST['squantity'] ?>" name="squantity" min="0"value="0">
        </div>
        <div class="form-group col-md-6">
            <label>Khuyễn mãi(nếu có)</label>
            <input class="form-control"type="text"name="ssale" value="<?php echo $_POST['ssale'] ?>" placeholder="Nhập giá khuyến mãi" >
        </div>
        <div class="form-group col-md-6">
            <label>Hình ảnh</label>
            <input type="file" name="simg"  class="form-control-file" placeholder="">
            
        </div>
        <button  type="submit" name="edit"  class="btn btn-default">Sửa</button>
    </form>
</div>
  </body>
  </html>