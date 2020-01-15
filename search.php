
<!DOCTYPE html>
<html>
<head>
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
  <div class="body">
  <div class="row">
    <hr>
    <div class=" container">
      <div style="color: black"><CENTER><h1 style="height: 50px;background-color: #f3f3f3; font-weight: bold;font-size: 28px;font-family:cursive ;text-align: center;"><b>SẢN PHẨM NỔI BẬT</b></h1></CENTER></div>
      <section class="hoatai ">
        <div class="row col-sm-12" >
<?php
include("sql/connect_sql.php");
      
if (isset($_REQUEST['submit'])) 
{
           
    $search = addslashes($_GET['search']);

    if (empty($search)) {
        echo "Yeu cau nhap du lieu vao o trong";
    } 
    else
    {
      
       $query = "SELECT *FROM products where namepro like '%$search%';";

       $sql = mysqli_query($mysqli,$query);

       $num = mysqli_num_rows($sql);

                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
       if ($num > 0 && $search != "") 
       {
                    // Dùng $num để đếm số dòng trả về.
        echo "<script>aleart('$num ket qua tra ve voi tu khoa <b>$search</b>')</script>";

                   
      while ($row = mysqli_fetch_assoc($sql )) {

                echo"<div class='col-sm-3'  id='id'><div class='card'><div class='sale'><span style='background-color: #D74444'>".$row['sale']."%</span></div><img src='image/".$row['image']."'id='img' alt='image'><div class='overlay'><h5 id='title'>".$row['namepro']."</h5><p><span id='price'>".$row['price']." đ</span><br></p><div class='sp'>
                <a href='add_cart.php?item=".$row['id_pro']."'class='btn btn-warning'>Thêm giỏ hàng</a><a href='detail.php?idtail=".$row['id_pro']."' class='btn btn-warning' name='detail' >Chi tiết</a></div></div></div></div>";


            }
    } 
    else {
        echo "Khong tim thay ket qua!";
    }
}
}
?>   
</div>
</section>
</div>
</div>
</div>
</body>
</html>
