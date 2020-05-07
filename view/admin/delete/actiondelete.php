<?php 
include '../../../controller/script.php';
$t= new guest();
session_start();
error_reporting(0);
if(!$_SESSION['username']&&!$_SESSION['password'])
{
    echo "<script>window.location='../../../index.php'</script>";
}
if($_SESSION['phanquyen']==1)
{
    echo "<script>window.location='../../../index.php'</script>";
}
if($_SESSION['phanquyen']==3)
{
    echo "<script>window.location='../../giangvien/index.php'</script>";
}
if($_SESSION['phanquyen']==4)
{
    echo "<script>window.location='../../congty/index.php'</script>";
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xóa</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<h1>Xóa Khách Hàng </h1>
    <form method="post">
    	<?php if (isset($_GET['idcongty'])) {
    		# code...
    	 ?>
    	<h4>Bạn có chắc chắn muốn xóa công ty 
    		<?php 
    			$idcongty=$_GET['idcongty'];
    	$t->showtenxoa("select * from congty where id='$idcongty'"); ?> này không ?</h4><br />
        <input class="btn btn-danger" type="submit" value="yes" name="nut" />
        <input class="btn btn-primary" type="submit" value="no" name="nut" />
    </form>
	<?php 
	    			$idcongty=$_GET['idcongty'];
	    			switch ($_POST['nut']) {
	    				case 'yes':
	    					{
	    						$t->xoacongty($idcongty);

	    					}
	    				case 'no':
	    					{
	    						 echo "<script>window.location='congty.php#dataTable'</script>";;
	    					}
	    			}

	 ?>
	<?php } ?>


		<?php if (isset($_GET['idgiangvien'])) {
    		# code...
    	 ?>
    	<h4>Bạn có chắc chắn muốn xóa giảng viên có id <?php echo "<span style='color:red'>".$_GET['idgiangvien']."</span>"; ?> này không
    		</h4><br />
        <input class="btn btn-danger" type="submit" value="yes" name="nut" />
        <input class="btn btn-primary" type="submit" value="no" name="nut" />
    </form>
	<?php 
	    			$idgiangvien=$_GET['idgiangvien'];
	    			switch ($_POST['nut']) {
	    				case 'yes':
	    					{
	    						$t->xoagiangvien($idgiangvien);

	    					}
	    				case 'no':
	    					{
	    						 echo "<script>window.location='giangvien.php#dataTable'</script>";;
	    					}
	    			}

	 ?>
	<?php } ?>
</body>
</html>