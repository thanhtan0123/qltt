<?php
include '../../../controller/script.php';
$t = new congty();
error_reporting(0);
session_start();
if (!$_SESSION['username'] && !$_SESSION['password']) {
	echo "<script>window.location='../../../index.php'</script>";
}
if ($_SESSION['phanquyen'] == 1) {
	echo "<script>window.location='../../../index.php'</script>";
}
if ($_SESSION['phanquyen'] == 3) {
	echo "<script>window.location='../../giangvien/index.php'</script>";
}
if ($_SESSION['phanquyen'] == 2) {
	echo "<script>window.location='../../admin/index.php'</script>";
}

?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Công ty</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../../admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../admin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="../../admin/assets/css/metisMenu.css">
    <link rel="stylesheet" href="../../admin/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../admin/assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../../admin/assets/css/typography.css">
    <link rel="stylesheet" href="../../admin/assets/css/default-css.css">
    <link rel="stylesheet" href="../../admin/assets/css/styles.css">
    <link rel="stylesheet" href="../../admin/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../../admin/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
        #customers {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #4CAF50;
          color: white;

        }
        input[type=text] {

   background-color: white;
  color: black;
  width: 50%;
  margin-top: 20px;

}
textarea{margin-top: 20px;}
    </style>

</head>

<body class="body-bg">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->

    <!-- preloader area end -->
    <!-- main wrapper start -->
    <div class="horizontal-main-wrapper">
        <!-- main header area start -->
        <div class="mainheader-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="../index.php"><h5>THM company</h5></a>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-9 clearfix text-right">
                        <div class="d-md-inline-block d-block mr-md-4">
                            <ul class="notification-area">
                                <li id="full-view"><i class="ti-fullscreen"></i></li>
                                <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                                <li class="dropdown">
                                    <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                                        <span>2</span>
                                    </i>

                                </li>
                                <li class="dropdown">
                                    <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"><span>3</span></i>

                                </li>

                            </ul>
                        </div>
                        <div class="clearfix d-md-inline-block d-block">
                            <div class="user-profile m-0">
                                <img class="avatar user-thumb" src="../../admin/assets/images/author/avatar.png" alt="avatar">
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['username']; ?> <i class="fa fa-angle-down"></i></h4>
                                <div class="dropdown-menu">


                                    <a class="dropdown-item" href="../../../controller/loggout.php">Log Out</a>
                                    <a class="dropdown-item" href="#">Settings</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main header area end -->
        <!-- header area start -->
        <div class="header-area header-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12  d-none d-lg-block">
                        <div class="horizontal-menu">
                            <nav>
                                <ul id="nav_menu">

                                    <li>
                                        <a href="../index.php"><i class="ti-layout-sidebar-left"></i><span>Dashboard
                                                </span></a>

                                    </li>
                                    <li>
                                        <a href="../add/themtuyendung.php"><i class="ti-pie-chart"></i><span>Thêm tuyển dụng</span></a>

                                    </li>
                                    <li class="mega-menu active">
                                        <a href="javascript:void(0)"><i class="ti-palette"></i><span>Đổi thông tin</span></a>
                                        <ul class="submenu">
                                            <li><a href="#">Thông tin chung của công ty</a></li>
                                            <li><a href="../updatethaydoi/nganhdangtuyendung.php">Thông tin về ngành đang tuyển dụng</a></li>
                                            <li><a href="../updatethaydoi/matkhau.php">Mật khẩu</a></li>

                                        </ul>
                                    </li>
                                    <li class="mega-menu" >
                                        <a href="../danhsachdangki.php"><i class="ti-layers-alt"></i> <span>Danh sách đăng kí</span></a>
                                        
                                    </li>
                                    <li>
                                        <a href="../quanlisauthuctap.php"><i class="ti-slice"></i><span>Quản lí sau thực tập</span></a>
                                        
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class="fa fa-table"></i>
                                            <span>Tables</span></a>
                                        <ul class="submenu">
                                            <li><a href="table-basic.html">basic table</a></li>
                                            <li><a href="table-layout.html">table layout</a></li>
                                            <li><a href="datatable.html">datatable</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="maps.html"><i class="ti-map-alt"></i> <span>maps</span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- nav and search button -->
                    
                    <!-- mobile_menu -->
                    <div class="col-12 d-block d-lg-none">
                        <div id="mobile_menu"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header area end -->
        <!-- page title area end -->
        <div class="page-container">
            <div class="main-content-inner" id="heyyou">
                <div class="row">
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">

                                 <div class="data-tables datatable-dark">
                                        <table id="customers">
                                            <thead class="text-capitalize">
                                                <tr>

                                                    <th>Tên công ty</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Khu vực</th>
                                                    <th>Hình</th>
                                                    <th>Chi tiết công ty</th>
                                                    <th>Liên hệ</th>
                                                    <th>Username</th>
                                                    <th>ID</th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                <?php
$username = $_SESSION['username'];
$t->xemcongty("select * from congty where username='$username'")
?>
                                                 <tr>
                                                    <td colspan="8"><center><h4>Bạn muốn đổi thông tin nào? Vui lòng chọn rồi xác nhận.(Bạn không được đổi id và username)</h4></center> </td>
                                                </tr>
                                                <tr>
                                                    <form action="" method="post">


                                                       <td><input type="checkbox" name="check[]" value="1" id="cat_1"></td>
                                                        <td><input type="checkbox" name="check[]" value="2" id="cat_2"></td>

                                                        <td><input type="checkbox" name="check[]" value="3" id="cat_3"></td>

                                                        <td><input type="checkbox" name="check[]" value="4" id="cat_4"></td>
                                                        <td><input type="checkbox" name="check[]" value="5" id="cat_5"></td>
                                                        <td><input type="checkbox" name="check[]" value="6" id="cat_6"></td>


                                                        <td colspan="2"><center><input type="submit"  class="btn btn-danger" value="Xác nhận" name="nutcheck"><center></td>

                                                    </form>
                                                </tr>
                                            </tbody>
                                        </table>

                                            <?php
$check = $_POST['check'];
switch ($_POST['nutcheck']) {
case 'Xác nhận':
	{
		$t->checkbox($check);

	}
}
?>

                                             <?php
$ten = $_POST['ten'];
$diachi = $_POST['diachi'];
$khuvuc = $_POST['khuvuc'];
$hinh = $_FILES['hinh']['name'];
$chitietcongty = $_POST['chitietcongty'];
$lienhe = $_POST['lienhe'];
$usernameold = $_SESSION['username'];

switch ($_POST['xacnhandoi']) {
case 'Xác nhận':
	{

		$t->laydulieusaukhicheckbox($ten, $diachi, $khuvuc, $hinh, $chitietcongty, $lienhe, $usernameold);

	}

}

?>

                                    </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dark table end -->
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area" style="clear: both;">
                <p>© Trường phi <a href="">Lovely</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- main wrapper start -->
    <!-- offset area start -->

    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="../../admin/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../../admin/assets/js/popper.min.js"></script>
    <script src="../../admin/assets/js/bootstrap.min.js"></script>
    <script src="../../admin/assets/js/owl.carousel.min.js"></script>
    <script src="../../admin/assets/js/metisMenu.min.js"></script>
    <script src="../../admin/assets/js/jquery.slimscroll.min.js"></script>
    <script src="../../admin/assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <!-- start amcharts -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- all line chart activation -->
    <script src="../admin/assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="../admin/assets/js/pie-chart.js"></script>
    <!-- all bar chart -->
    <script src="../admin/assets/js/bar-chart.js"></script>
    <!-- all map chart -->
    <script src="../admin/assets/js/maps.js"></script>
    <!-- others plugins -->
    <script src="../admin/assets/js/plugins.js"></script>
    <script src="../admin/assets/js/scripts.js"></script>


</body>

</html>
<img src="../../../layout/img/home/congtythuctap/" alt="">