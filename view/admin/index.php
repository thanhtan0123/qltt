<?php 
include '../../controller/script.php';
$t= new guest();
error_reporting(0);
session_start();
if(!$_SESSION['username']&&!$_SESSION['password'])
{
    echo "<script>window.location='../../index.php'</script>";
}
if($_SESSION['phanquyen']==1)
{
    echo "<script>window.location='../../index.php'</script>";
}
if($_SESSION['phanquyen']==3)
{
    echo "<script>window.location='../giangvien/index.php'</script>";
}
if($_SESSION['phanquyen']==4)
{
    echo "<script>window.location='../congty/index.php'</script>";
}

 ?>
 <!DCOTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu  -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                	<h3 style="color: white">ADMIN THM</h3>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>trang chủ</span></a>
                                
                            </li>
                            
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-align-left"></i> <span>Quản lí </span></a>
                                <ul class="collapse">
                                    
                                    <li><a href="#" aria-expanded="true"><i class="ti-hand-point-right"></i><span>Sinh viên</span></a>
                                        <ul class="collapse">
                                            <li><a href="sinhvien.php"><i class="ti-eye"></i><span>Xem</span></a></li>
                                            
                                            
                                        </ul>
                                    </li>
                                    <li><a href="#" aria-expanded="true"><i class="ti-hand-point-right"></i><span>Công ty</span></a>
                                        <ul class="collapse">
                                            <li><a href="congty.php"><i class="ti-eye"></i><span>Xem</span></a></li>
                                            <li><a href="#"><i class="ti-settings"></i><span>Chỉnh sửa</span></a>
                                                <ul class="collapse">
                                                    <li><a href="add/congty.php"><i class="ti-plus"></i><span>Thêm</span></a></li>
                                                    <li><a href="delete/congty.php"><i class="ti-minus"></i><span>Xóa</span></a></a></li>
                                                    
                                                </ul>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    <li><a href="#" aria-expanded="true"><i class="ti-hand-point-right"></i><span>Giảng viên</span></a>
                                        <ul class="collapse">
                                            <li><a href="giangvien.php"><i class="ti-eye"></i><span>Xem</span></a></li>
                                            <li><a href="#"><i class="ti-settings"></i><span>Chỉnh sửa</span></a>
                                                <ul class="collapse">
                                                    <li><a href="add/giangvien.php"><i class="ti-plus"></i><span>Thêm</span></a></li>
                                                    <li><a href="delete/giangvien.php"><i class="ti-minus"></i><span>Xóa</span></a></a></li>
                                                    
                                                </ul>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                   
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="../../index.php">Trang chủ</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Đổi mật khẩu</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body mx-3">
                            <form action="" method="post">
                            <div class="md-form mb-5">
                              <i class="ti-lock"></i>
                              <input type="password" id="defaultForm-email" name="password" class="form-control validate">
                              <label data-error="wrong" data-success="right" for="defaultForm-email">Mật khẩu cũ</label>
                            </div>

                            <div class="md-form mb-4">
                              <i class="ti-lock"></i>
                              <input type="password" id="defaultForm-pass" name="matkhaumoi" class="form-control validate">
                              <label data-error="wrong" data-success="right" for="defaultForm-pass">Mật khẩu mới</label>
                            </div>

                            <div class="md-form mb-4">
                              <i class="ti-lock"></i>
                              <input type="password" id="defaultForm-pass" name="nhaplaimkm" class="form-control validate">
                              <label data-error="wrong" data-success="right" for="defaultForm-pass">Nhập lại mật khẩu mới</label>
                            </div>
                            
                            <div class="md-form mb-4">
                              <input type="submit" class="btn btn-danger" value="Xác nhận" name="nut2">
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Admin: <span style="color: #55DD6F"><?php 
                                $admin=$_SESSION['username'];
                                echo $admin;
                             ?></span> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                
                                <a class="dropdown-item" href="../../controller/loggout.php">Đăng xuất</a>
                                <a class="dropdown-item" id="drop" data-toggle="modal" data-target="#modalLoginForm">Đổi mật khẩu</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- seo fact area start -->
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-6 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-thumb-up"></i> Likes</div>
                                            <h2>2,315</h2>
                                        </div>
                                        <canvas id="seolinechart1" height="50"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-md-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-share"></i> Share</div>
                                            <h2>3,984</h2>
                                        </div>
                                        <canvas id="seolinechart2" height="50"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 mb-lg-0">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon">Impressions</div>
                                            <canvas id="seolinechart3" height="60"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="seo-fact sbg4">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon">New Users</div>
                                            <canvas id="seolinechart4" height="60"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- seo fact area end -->
                    <!-- Social Campain area start -->
                   <!-- Live Crypto Price area start -->

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Tin tức</h4>
                                <div class="letest-news mt-5">
                                    <div class="single-post mb-xs-40 mb-sm-40">
                                        <div class="lts-thumb">
                                            <img src="assets/images/blog/photo1569039710162-1569039710316-crop-15690397742221914054621 (1).jpg" alt="post thumb">
                                        </div>
                                        <div class="lts-content">
                                            
                                            <h2><a href="blog.html">Thực tập sinh than "em chẳng học được gì!"</a></h2>
                                            <p>Ngọc Huyền - sinh viên năm cuối trường Đại học N.T vừa trải qua kỳ thực tập cuối khóa tại một công ty làm về truyền thông, tổ chức sự kiện. Kỳ thực tập diễn ra trong 3 tháng, không lương...</p>
                                        </div>
                                    </div>
                                    <div class="single-post">
                                        <div class="lts-thumb">
                                            <img src="assets/images/blog/fb.jpg" alt="post thumb">
                                        </div>
                                        <div class="lts-content">
                                            
                                            <h2><a href="#">Bạn có thể bỏ túi đến 8.000 USD/tháng khi thực tập ở Facebook</a></h2>
                                            <p>Facebook đang chiếm vị trí đầu bảng với mức lương trung bình là 8.000 USD/tháng. Như vậy mức lương hàng năm mà mỗi thực tập sinh nhận được tại đây hiện lên tới 96.000 USD...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- latest news area end -->
                    <!-- Live Crypto Price area end -->
                    <!-- testimonial area end -->
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>Trường phi <a href="https://facebook.com/wp/">Lovely</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
   
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    <?php 
          $username=$_SESSION['username'];
          $password=$_POST['password'];
          $matkhaumoi=$_POST['matkhaumoi'];
          $nhaplaimkm=$_POST['nhaplaimkm'];
          switch ($_POST['nut2']) {
            case 'Xác nhận':
              
              {
                $t->doimatkhau2($username,$password,$matkhaumoi,$nhaplaimkm);
                break;
              }
          }
       ?>
</body>

</html>
