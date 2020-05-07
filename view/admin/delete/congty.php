<?php 
include '../../../controller/script.php';
session_start();
$t= new guest();
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

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Quản lí công ty</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
   
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    
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
                                <a href="../index.php" aria-expanded="true"><i class="ti-dashboard"></i><span>Trang chủ</span></a>
                                
                            </li>
                            
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-align-left"></i> <span>Quản lí </span></a>
                                <ul class="collapse">
                                    
                                    <li><a href="#" aria-expanded="true"><i class="ti-hand-point-right"></i><span>Sinh viên</span></a>
                                        <ul class="collapse">
                                            <li><a href="../sinhvien.php"><i class="ti-eye"></i><span>Xem</span></a></li>
                                            
                                            
                                        </ul>
                                    </li>
                                    <li><a href="#" aria-expanded="true"><i class="ti-hand-point-right"></i><span>Công ty</span></a>
                                        <ul class="collapse">
                                            <li><a href="../congty.php"><i class="ti-eye"></i><span>Xem</span></a></li>
                                            <li><a href="#"><i class="ti-settings"></i><span>Chỉnh sửa</span></a>
                                                <ul class="collapse">
                                                    <li><a href=""><i class="ti-plus"></i><span>Thêm</span></a></li>
                                                    <li><a href="../delete/congty.php"><i class="ti-minus"></i><span>Xóa</span></a></a></li>
                                                    
                                                </ul>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    <li><a href="#" aria-expanded="true"><i class="ti-hand-point-right"></i><span>Giảng viên</span></a>
                                        <ul class="collapse">
                                            <li><a href="../giangvien.php"><i class="ti-eye"></i><span>Xem</span></a></li>
                                            <li><a href="#"><i class="ti-settings"></i><span>Chỉnh sửa</span></a>
                                                <ul class="collapse">
                                                    <li><a href="../add/giangvien.php"><i class="ti-plus"></i><span>Thêm</span></a></li>
                                                    <li><a href="../delete/giangvien.php"><i class="ti-minus"></i><span>Xóa</span></a></a></li>
                                                    
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
                                <li><a href="../index.php">Trang chủ</a></li>
                                <li><span>Xóa công ty</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="../assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Admin: <span style="color: #55DD6F"><?php 
                                $admin=$_SESSION['username'];
                                echo $admin;
                             ?></span> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                
                                <a class="dropdown-item" href="../../../controller/loggout.php">Đăng xuất</a>
                                <a class="dropdown-item" href="../index.php">Đổi mật khẩu</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            
            
            <!-- header area end -->
            <!-- page title area start -->
            
            <!-- page title area end -->
            
                                
                            
            
            <!-- page title area end -->
            <div class="main-content-inner">

                <div class="row">
                    <!-- data table start -->
                    
                    <!-- data table end -->
                    <!-- Primary table start -->
                    
                    <!-- Primary table end -->
                    <!-- Danh sách công ty -->
                    <div class="col-12 mt-5">

                        <div class="card">
                            <div class="card-body">
                                <a href="../add/congty.php" ><input class="btn btn-warning mb-3 " type="reset" value="Thêm công ty" ></a>
                                
                                <a href="../delete/congty.php"><input class="btn btn-danger mb-3" type="reset" value="Xóa công ty" disabled=""></a>
                                <h4 class="header-title">Danh sách công ty trong hệ thống</h4>
                                <div class="data-tables">
                                    
                                    <table id="dataTable" class="text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên công ty</th>
                                                <th>Địa chỉ</th>
                                                <th>Username</th>
                                               
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $t->AdSV3("select * from  congty"); ?>
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
                                
                            
            
            <!-- page title area end -->
            
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
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
    
</body>

</html>
