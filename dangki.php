<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
</body>
</html>
<?php

session_start();
include ("controller/script.php");
$p=new guest();
if(isset($_SESSION['username']))
{
			if($_SESSION['phanquyen']==2)
			{
				echo "<script>window.location='view/admin/index.php'</script>";
			}
			if($_SESSION['phanquyen']==3)
			{
				echo "<script>window.location='view/giangvien/index.php'</script>";
			}
			if($_SESSION['phanquyen']==4)
			{
				echo "<script>window.location='view/congty/index.php'</script>";
			}
			$t=$_GET['idnganh'];
			if(!$t)
			{
				echo "<script>window.location='index.php'</script>";
			}
			$username=$_SESSION['username'];

					$idnganhtuyendung=$_GET['idnganh'];

					
					$kiemtra2 = mysql_query("select  * from nganhcongtytuyendung where id='$idnganhtuyendung'");
					$i2 = mysql_num_rows($kiemtra2);
					if ($i2 > 0) {
						while ($row2 = mysql_fetch_array($kiemtra2)) {
							$idcty=$row2['idcty'];
					}}	
						

			


										if (isset($idnganhtuyendung)&&isset($username)&&isset($idcty)) {
											$p->dangkithuctap($username,$idcty,$idnganhtuyendung);
											echo "<h1>right</h1>";
										}
										else{echo "<h1>Sai</h1>";}
						
}
else 
{
	$getidnganh=$_GET['idnganh'];
	echo "<script language='javascript'>alert('Bạn phải đăng nhập trước')</script>";
	echo "<script>window.location='details.php?idnganh=".$getidnganh."#wrap-inner'</script>";
	
}							
							
							
?>
