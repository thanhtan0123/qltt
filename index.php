<!--  thẻ <details></details>-->
<!-- nhớ database dễ lẫn lộn vì ghi nhầm nhất là bảng khoa -->
<!-- 1 là sinh viên, 2 admin,3 giảng viên, 4 là cong ty-->
<?php
error_reporting(0);
session_start();
include ("controller/script.php");
$p=new guest();
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


?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>:: Trang Chủ ::</title>
	<link rel="shortcut icon" type="image/png" href="layout/img/home/fav.png"/>
	<link rel="stylesheet" href="layout/css/bootstrap.min.css">
	<link rel="stylesheet" href="layout/css/home.css">
	<script type="text/javascript" src="layout/js/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="layout/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	

	<script type="text/javascript">
		$(function() {
			var pull        = $('#pull');
			menu        = $('nav ul');
			menuHeight  = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	</script>

</head>
<!-- php -->

<!-- header -->

	<header id="header" style="background: #393838;">
		<div class="container">
			<div class="row">
				<div id="logo" class="col-md-3 col-sm-12 col-xs-12">
					<h1>
						 <a href="#" class="navbar-brand">
					      <!-- Logo Image -->
					      <img src="https://res.cloudinary.com/mhmd/image/upload/v1557368579/logo_iqjuay.png" width="45" alt="" class="d-inline-block align-middle mr-2">
					      <!-- Logo Text -->
					      <span class="text-uppercase font-weight-bold" style="color:#FED06E; font-weight: bold;letter-spacing: 3px;"> T H M </span>
					    </a>		
					</h1>
				</div>
				<div id="search" class="col-md-5 col-sm-12 col-xs-12">
					<input type="text" name="text" placeholder="Nhập từ khóa ...">
					<input type="submit" name="submit"  value="Tìm Kiếm" style="font-weight: bold;font-size:spx; ;">
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12" style="font-weight: bold;">
					
					
					<?php 
						if(isset($_SESSION['username'])&& $_SESSION['password'])
						{
							echo '<a href="yourself.php" style="line-height: 118px;color: white"><span class="glyphicon glyphicon-user"></span> ' .$_SESSION['username'].'</a>';
							echo '<a href="" style="line-height: 118px;color: white; margin-left:10px"><span class="glyphicon glyphicon-check"></span> Đã đăng ký</a>';
							echo '<a href="controller/loggout.php" style="line-height: 118px;color: white; margin-left:15px"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Log out</a>';
						}
						else
						{
							echo '<a href="login.php" style="line-height: 118px;color: white;margin-left:50px"><span class="glyphicon glyphicon-user"></span> Đăng nhập</a>';
						}
					 ?>
								 
								    
				</div>
			</div>			
		</div>
	</header><!-- /header -->
	<!-- endheader -->


 	<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">
						<ul>
							<li class="menu-item" style="color:#E14545;font-weight: bold">Danh mục ngành theo khoa</li>
							<li class="menu-item"><a href="index.php" style="color: #E14545"> ALL</a></li>
							<?php
									$p->showkhoa('select * from khoa order by TenNganh'); 
								
							 ?>

													
						</ul>
						<!-- <a href="#" id="pull">Danh mục</a> -->
					</nav>

					<div id="banner-l" class="text-center">
						<div class="banner-l-item">
							<a href="#"><img src="layout/img/home/bn1.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="layout/img/home/bn2.jpg" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="layout/img/home/bn3.jpg" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="layout/img/home/bn4.jpg" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="layout/img/home/bn5.jpg" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="layout/img/home/bn6.jpg" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="layout/img/home/bn7.jpg" alt="" class="img-thumbnail"></a>
						</div>
					</div>
				</div>



				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					<div id="slider">
						<div id="demo" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="layout/img/home/banner1.jpg" alt="Los Angeles" >
								</div>
								<div class="carousel-item">
									<img src="layout/img/home/banner2.jpg" alt="Chicago">
								</div>
								<div class="carousel-item">
									<img src="layout/img/home/banner3.png" alt="New York" >
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>

					<div id="banner-t" class="text-center">
						<div class="row">
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="layout/img/home/bannert1.png" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="layout/img/home/bannert2.png" alt="" class="img-thumbnail"></a>
							</div>
						</div>					
					</div>

					<div id="wrap-inner">
						<div class="products">
							<h3 style="font-weight: bold;">Các doanh nghiệp cần sinh viên thực tập</h3>
							<div class="product-list row">
								
							<!-- show những công ty ở main (showmain) -->
							<?php   
							$idkhoa=$_GET['idkhoa'];
							$sotin1trang=9;//tự cho 
							if(isset($_GET["trang"]))
							{
								$trang=$_GET['trang'];
								settype($trang, "int");
								
							}
							else{$trang=1;}
						$from=($trang -1) * $sotin1trang;
							if (isset($idkhoa)) {
								$p->showcongtyomain_phantrang("select  * from congty a join nganhcongtytuyendung b on a.id=b.idcty join nganhdaotao c on b.idnganh=c.iddt join khoa d on c.idkhoa=d.idnganh where c.idkhoa='$idkhoa' LIMIT $from,$sotin1trang");
							}
							else
							{
								$p->showcongtyomain_phantrang("select  * from congty a join nganhcongtytuyendung b on a.id=b.idcty join nganhdaotao c on b.idnganh=c.iddt join khoa d on c.idkhoa=d.idnganh 
									LIMIT $from,$sotin1trang");
							}
							?>
							        
							<!-- endshowmain--> 
							       
							</div>
							<div id="phantrang">
							       	<?php 
								$sotin1trang=9;
								$p->showcongtyomain($sotin1trang);
							 ?>	
							       </div>	           	                	
						</div>
						

						
					</div>

					
					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
 	<footer id="footer">			
		<div id="footer-t">
			<div class="container">
				<div class="row">				
					<div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">						
						<a href="#"><img src="https://res.cloudinary.com/mhmd/image/upload/v1557368579/logo_iqjuay.png" width="45" alt="" class="d-inline-block align-middle mr-2">	</a>			
					</div>
					<div id="about" class="col-md-3 col-sm-12 col-xs-12">
						<h3>About us</h3>
						<p class="text-justify">H23T thành lập năm 2020. Chúng tôi đã cùng nhau xây dựng 1 hệ thống đăng kí thực tập dành cho sinh viên IUH sử dụng, để các sinh viên dễ dàng theo dõi và cập nhật những công ty, việc làm phù hợp với bản thân mình nhất. Chúc tất cả các sinh viên nói chung và các bạn gần thực tạp nói riêng 1 điều tốt đẹp nhất. Cảm ơn các bạn !</p>
					</div>
					<div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Hotline</h3>
						<p>Phone Sale: 0961230604</p>
						<p>Email: phitruong199@gmail.com</p>
					</div>
					<div id="contact" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Contact Us</h3>
						<p>Address 1: Khoa Công Nghệ Thông Tin- Trường Đại Học công nghiệp TPHCM</p>
						<p>Address 2: Trung tâm văn hóa trường Đại học Công Nghiệp TPHCM</p>
					</div>
				</div>				
			</div>
			<div id="footer-b">				
				<div class="container">
					<div class="row">
						<div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>Nhóm 3 Phát triển ứng dụng kì 2 năm 2019-2020</p>
						</div>
						<div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>© THM INTERNSHIP </p>
						</div>
					</div>
				</div>
				<div id="scroll">
					<a href="#"><img src="layout/img/home/scroll.png" alt=""></a>
				</div>	
			</div>
		</div>
	</footer>
	</html>
	<!-- endfooter -->
