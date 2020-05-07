<?php
session_start();
error_reporting(0);
header('Content-Type: text/html; charset=UTF-8');
if(isset($_SESSION['username']) && $_SESSION['password'] != NULL){

   
    
    echo '<script language="javascript">window.location="index.php";alert("Bạn đã đăng nhập.")</script>';

}

?>
<?php 
include 'controller/script.php';
$t= new guest();
session_start();
error_reporting(0);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>::Đăng nhập::</title>
 
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="layout/css/style.css">

</head>

<body>

	<section class="login-block">
    <div class="container">
    <div class="row">
        <div class="col-md-4 login-sec">
            <h2 class="text-center" style="color: #E47B7B">Đăng nhập vào THM</h2>
            <form class="login-form" method="post">

  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase"  style="text-align: center;">User</label>
    <input type="text" class="form-control" placeholder="" name='username' >
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase" >Password</label>
    <input type="password" class="form-control" placeholder=" " name='password'>
  </div>
  
  
    <div class="form-check">
        
    	<input type="submit" class="btn btn-login float-right" value="Login" align="center" name="nut">
	 </div>
	
  
</form>
<div class="copy-text"><i class="fa fa-heart"></i> <a href="index.php">Về trang chủ</a></div><br>

        </div>
        <div class="col-md-8 banner-sec">
            
        </div>
    </div>
</div>

</section>
 <?php 
	 $username=$_POST['username'];
	 $password=$_POST['password'];
     // kiểm tra phan quyền
     $ketqua=mysql_query("select phanquyen from user where username='$username'");
     while($row=mysql_fetch_array($ketqua))
            {
               $phanquyen=$row['phanquyen'];
            
            }
      // end kiểm tra phân quyền  
	 switch ($_POST['nut']) {
	 	case 'Login':
	 	{
	 		$t->dangnhapvaohethong($username,$password,$phanquyen);
            
	 		break;
	 	}
	 }
?>

</body>
</html>