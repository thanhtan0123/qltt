<?php 
include '../../controller/script.php';
$t= new congty();
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
if($_SESSION['phanquyen']==2)
{
    echo "<script>window.location='../admin/index.php'</script>";
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
    <link rel="stylesheet" href="../admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../admin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="../admin/assets/css/metisMenu.css">
    <link rel="stylesheet" href="../admin/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../admin/assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../admin/assets/css/typography.css">
    <link rel="stylesheet" href="../admin/assets/css/default-css.css">
    <link rel="stylesheet" href="../admin/assets/css/styles.css">
    <link rel="stylesheet" href="../admin/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../admin/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Nhúng sweetalert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
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
    </style>
<body class="body-bg">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- main wrapper start -->
    <div class="horizontal-main-wrapper">
        <!-- main header area start -->
        <div class="mainheader-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.php"><h5>THM company</h5></a>
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
                                <img class="avatar user-thumb" src="../admin/assets/images/author/avatar.png" alt="avatar">
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['username']; ?><i class="fa fa-angle-down"></i></h4>
                                <div class="dropdown-menu">
                                    
                                    
                                    <a class="dropdown-item" href="../../controller/loggout.php">Log Out</a>
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
                    <div class="col-lg-12 d-none d-lg-block">
                        <div class="horizontal-menu">
                            <nav>
                                <ul id="nav_menu">
                                    
                                    <li class="">
                                        <a href="index.php"><i class="ti-layout-sidebar-left"></i><span>Dashboard
                                                </span></a>
                                        
                                    </li>
                                    <li>
                                        <a href="add/themtuyendung.php"><i class="ti-pie-chart"></i><span>Thêm tuyển dụng</span></a>
                                        
                                    </li>
                                    <li class="mega-menu">
                                        <a href="javascript:void(0)"><i class="ti-palette"></i><span>Đổi thông tin</span></a>
                                        <ul class="submenu">
                                            <li><a href="updatethaydoi/thongtinchung.php">Thông tin chung của công ty</a></li>
                                            <li><a href="updatethaydoi/nganhdangtuyendung.php">Thông tin về ngành đang tuyển dụng</a></li>
                                            <li><a href="updatethaydoi/matkhau.php">Mật khẩu</a></li>
                                            
                                        </ul>
                                    </li>
                                    <li class="mega-menu active" >
                                        <a href=""><i class="ti-layers-alt"></i> <span>Danh sách đăng kí</span></a>
                                        
                                    </li>
                                    <li>
                                        <a href="quanlisauthuctap.php"><i class="ti-slice"></i><span>Quản lí sau thực tập</span></a>
                                        
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
        <div class="main-content-inner">
            <div class="container">
                <div class="row">
                    <!-- seo fact area start -->
                    
                    <!-- Social Campain area end -->
                    <!-- Statistics area start -->
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                
                                
                                 <!-- show thông tin -->
                                
                              
                                
                            </div>
                                <div class="card-body">
                                <div><h4 style="color: #FD4343">Lọc theo ngành đang tuyển : </h4>
                                <table class="table-hover
                                " align="center">
                                    <tr><td><a href='danhsachdangki.php'>Tất cả</a></td></tr>
                                   <?php 
                                    $t->shownganhdangtuyendung(); ?>
                                </table>
                                </div>
                                <br><br><br>
                                   <div class="data-tables datatable-dark">
                                        <table id="customers" class="table-striped">
                                            <thead class="text-capitalize">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Ngành cần tuyển</th>
                                                    <th>Sinh viên đăng kí</th>
                                                    <th>Trạng thái</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php 
                                                $idnganh=$_GET['idnganh'];
                                                $username=$_SESSION['username'];
                                                // lấy id công ty ở bảng nghecongtycantuyen
                                                $kiemtra = mysql_query("select * from congty where username='$username'");
                                                $i = mysql_num_rows($kiemtra);
                                                if ($i > 0) {
                                                    while ($row = mysql_fetch_array($kiemtra)) {
                                                            $idcty=$row['id'];
                                                    }
                                                }
                                                //end
                                               if (isset($idnganh)) {
                                                   $t->danhsachdangki("select *
                                    FROM qlsvdangki a
                                    JOIN sinhvien b ON a.username = b.idsv
                                    JOIN nganhcongtytuyendung c ON a.idnganhtuyendung = c.id

                                    WHERE idnganhtuyendung ='$idnganh'");

                                               } 
                                               else
                                               {
                                                 $t->danhsachdangki("select *
                                                    FROM qlsvdangki a
                                                    JOIN sinhvien b ON a.username = b.idsv
                                                    JOIN nganhcongtytuyendung c ON a.idnganhtuyendung = c.id
                                                    WHERE c.idcty='$idcty'
                                                    ");  
                                               }
                                               ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    
                                  
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Statistics area end -->
                    <!-- Advertising area start -->
                    
                    <!-- Advertising area end -->
                    <!-- sales area start -->
                    
                    <!-- sales area end -->
                    <!-- timeline area start -->
                     
                    
                    <!-- timeline area end -->
                    <!-- map area start -->
                   
                    <!-- map area end -->
                    <!-- testimonial area start -->
                    
                    <!-- testimonial area end -->
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
    <script src="../admin/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../admin/assets/js/popper.min.js"></script>
    <script src="../admin/assets/js/bootstrap.min.js"></script>
    <script src="../admin/assets/js/owl.carousel.min.js"></script>
    <script src="../admin/assets/js/metisMenu.min.js"></script>
    <script src="../admin/assets/js/jquery.slimscroll.min.js"></script>
    <script src="../admin/assets/js/jquery.slicknav.min.js"></script>

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
<!--POPUP 1 -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="customers" class="table-warning">
                                            <thead class="text-capitalize">
                                                <tr><th colspan="4"><h3 align="center">Thông tin sinh viên</h3></th></tr>
                                                
                                            </thead>
                                            <tbody>
                                                <?php $t->showpopup() ?>
                                               
                                            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <?php 
            $idsv=$_GET['idsinhvien'];
            if (isset($idsv)) { ?>
                 <script>
       $(document).ready(function(){
            $('#exampleModal').modal('show');
        }); 
    </script>
            <?php }
          ?>
      </div>
    </div>
  </div>
</div>
<!-- END -->
<!--  POPUP 2-->
<div class="modal fade" id="exampleModalB" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
        <center><h3>Bạn có muốn xác nhận cho sinh viên này đi thực tập?</h3></center><br>
        <h6 style="color: red"><center><i>* Lưu ý: mỗi sinh viên chỉ có thể duyệt vào 1 nghề thực tập nhất định</i></center></h6>
      </div>
      <div class="modal-footer">
        <form action="" method="post">
        <input type="submit" class="btn btn-danger" value="Duyệt" name="duyet">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </form>
         <?php 
            $idql=$_GET['idql'];
            if (isset($idql)) { ?>
                 <script>
       $(document).ready(function(){
            $('#exampleModalB').modal('show');
        }); 
    </script>
            <?php }
          ?>
          <?php 
            switch ($_POST['duyet']) {
                case 'Duyệt':
                    {
                        $t->dongythuctap();
                    }
            }
           ?>
      </div>
    </div>
  </div>
</div>
<!--END -->
<!-- POPUP 3-->
<div class="modal fade" id="exampleModalC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
        <h3>Bạn có muốn bỏ qua sinh viên này?</h3>
      </div>
      <div class="modal-footer">
        <form action="" method="post">
        <input type="submit" class="btn btn-danger" value="Bỏ qua" name="boqua">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </form>
         <?php 
            $idql2=$_GET['idql2'];
            if (isset($idql2)) { ?>
                 <script>
       $(document).ready(function(){
            $('#exampleModalC').modal('show');
        }); 
    </script>
            <?php }
          ?>
          <?php 
            switch ($_POST['boqua']) {
                case 'Bỏ qua':
                    {
                        $t->boquathuctap();
                    }
            }
           ?>
      </div>
    </div>
  </div>
</div>
<!-- END -->
<!-- POPUP 4-->
<div class="modal fade" id="exampleModalD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <center> <h3>Quá trình thực tập?</h3></center>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class="modal-body">
        <span style="color: red;font-weight: bold"> <i>*Lưu ý: sau khi bạn xác nhận sinh viên sẽ xóa ra danh sách thực tập</i></span>
        
            <center><table>
                <form action="" method="post" style="border:none;">
                <tr>
                    <td>
                        <span style="font-weight: bold;">Điểm :</span> 
                    </td>
                    <td>
                        <input type="number" name="diem" min="0.1" max="10" step="0.01" > 
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="font-weight: bold;"> Nhận xét :</span> 
                    </td>
                    <td>
                        <textarea cols="50" rows="5" name="nhanxet"></textarea>
                    </td>
                </tr>
            </table></center>
       
                  
                
                    
                
                   
                
        
      </div>
      <div class="modal-footer">
        
        <input type="submit" class="btn btn-danger" value="Xác nhận" name="xn">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </form>
         <?php 
            $idql3=$_GET['idql3'];
            if (isset($idql3)) { ?>
                 <script>
       $(document).ready(function(){
            $('#exampleModalD').modal('show');
        }); 
    </script>
            <?php }
          ?>
          <?php 
          $diem=$_POST['diem'];
          $nhanxet=$_POST['nhanxet'];
            switch ($_POST['xn']) {
                case 'Xác nhận':
                    {
                        $t->quatrinhthuctap($diem,$nhanxet);
                    }
            }
           ?>
      </div>
    </div>
  </div>
</div>
<!-- END -->
</html>
