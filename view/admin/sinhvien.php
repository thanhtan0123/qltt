<?php 
include '../../controller/script.php';
error_reporting(0);
session_start();
$t= new guest();
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
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Quản lí sinh viên</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
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
                                            <li><a href=""><i class="ti-eye"></i><span>Xem</span></a></li>
                                            
                                            
                                        </ul>
                                    </li>
                                    <li><a href="#" aria-expanded="true"><i class="ti-hand-point-right"></i><span>Công ty</span></a>
                                        <ul class="collapse">
                                            <li><a href="congty.php"><i class="ti-eye"></i><span>Xem</span></a></li>
                                            <li><a href="#"><i class="ti-settings"></i><span>Chỉnh sửa</span></a>
                                                <ul class="collapse">
                                                    <li><a href="add/congty.php"><i class="ti-plus"></i><span>Thêm</span></a></li>
                                                    <li><a href="delete/congty.php"><i class="ti-minus"></i><span>Xóa</span></a></a></li>
                                                    <li><a href="update/congty.php"><i class="ti-close"></i><span>Sửa</span></a></a></li>
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
                                <li><span>Quản lí sinh viên</span></li>
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
                                <a class="dropdown-item" data-toggle="modal" data-target="#modalLoginForm">Đổi mật khẩu</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- data table start -->
                    
                    <!-- data table end -->
                    <!-- Primary table start -->
                    
                    <!-- Primary table end -->
                    <!--Danh sách sinh viên-->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Danh sách sinh viên</h4>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>MSSV</th>
                                                <th>Tên SV</th>
                                                <th>Email</th>
                                                
                                                <th>Khoa chủ quản</th>
                                                <th>Ngành đào tạo</th>
                                                <th>Điểm hệ số 4</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                                <?php 
                                                    $t->AdSV("select * from sinhvien a join nganhdaotao b on a.idndt=b.iddt join ketquahoctap c on a.idsv=c.idsv");
                                                 ?>
                                                
                                           
                                            
                                            
                                        </tbody>
                                    </table>
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

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
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
