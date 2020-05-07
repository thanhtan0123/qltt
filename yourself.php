
<?php
error_reporting(0);
session_start();

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
if(isset($_SESSION['username'])&& isset($_SESSION['password']))
{
  include ("controller/script.php");
  $t=new guest();
  $t->confi_dangnhap($_SESSION['username'],$_SESSION['password']);
   
  
  
}
else
{
  
  echo "<script language='javascript'>alert('Không thể trang vào khi chưa đăng nhập')</script>";
  echo '<script language="javascript">window.location="index.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $_SESSION['username']; ?></title>
  <link rel="shortcut icon" type="image/png" href="layout/img/home/fav.png"/>

  <!-- Bootstrap core CSS -->
  <link href="layout/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link rel="stylesheet" href="layout/css/all.min.css">

  <!-- Custom styles for this template -->
  <link href='layout/css/resume.min.css' rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  
<style>
    ul.social-network {
    list-style: none;
    display: inline;
    margin-left:0 !important;
    padding: 0;
}
ul.social-network li {
    display: inline;
    margin: 0 5px;
}


/*footer social icons */
.social-network a.icoRss:hover {
    background-color: #F56505;
}
.social-network a.icoFacebook:hover {
    background-color:#3B5998;
}
.social-network a.icoTwitter:hover {
    background-color:#33ccff;
}
.social-network a.icoGoogle:hover {
    background-color:#BD3518;
}
.social-network a.icoVimeo:hover {
    background-color:#0590B8;
}
.social-network a.icoLinkedin:hover {
    background-color:#007bb7;
}
.social-network a.icoInstagram:hover {
    background-color: orangered;
}
.social-network a.icoRss:hover i, .social-network a.icoFacebook:hover i, .social-network a.icoTwitter:hover i,
.social-network a.icoGoogle:hover i, .social-network a.icoVimeo:hover i, .social-network a.icoLinkedin:hover i, .social-network a.icoInstagram:hover i {
    color:#fff;
}
a.socialIcon:hover, .socialHoverClass {
    color:#44BCDD;
}

.social-circle li a {
    display:inline-block;
    position:relative;
    margin:0 auto 0 auto;
    -moz-border-radius:50%;
    -webkit-border-radius:50%;
    border-radius:50%;
    text-align:center;
    width: 50px;
    height: 50px;
    font-size:20px;
}
.social-circle li i {
    margin:0;
    line-height:50px;
    text-align: center;
}

.social-circle li a:hover i, .triggeredHover {
    -moz-transform: rotate(360deg);
    -webkit-transform: rotate(360deg);
    -ms--transform: rotate(360deg);
    transform: rotate(360deg);
    -webkit-transition: all 0.2s;
    -moz-transition: all 0.2s;
    -o-transition: all 0.2s;
    -ms-transition: all 0.2s;
    transition: all 0.2s;
}
.social-circle i {
    color: black;
    -webkit-transition: all 0.8s;
    -moz-transition: all 0.8s;
    -o-transition: all 0.8s;
    -ms-transition: all 0.8s;
    transition: all 0.8s;
}


</style>
</head>

<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
     
      <?php 
      $username=$_SESSION['username'];
        $t->cvavatar("select * from sinhvien where idsv='$username'");
       ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#about">Thông tin cá nhân</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#experience">Ngành học</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#education">Kết quả học tập</a> <!--education -->
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#skills">Công ty đã đăng kí</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#interests">đổi thông tin, mật khẩu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php"> &#8594; Về Trang Chủ &#8592;</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid p-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
      <?php 
    $username=$_SESSION['username']; // cách lấy session
     if(isset($username))
     {
      $t->cvthongtincanhan("select * from sinhvien where idsv='$username'");
       
     }
     
      ?>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="experience">
      <div class="w-100">
       <?php 
    $username=$_SESSION['username'];
     if(isset($username))
     {
      $t->cvnganhhoc("select * from sinhvien a join khoa b on a.idkhoa=b.idnganh where idsv='$username'");
       
     }
     
      ?>
      <?php 
    $username=$_SESSION['username'];
     if(isset($username))
     {
      $t->cvnganhhoc2("select * from sinhvien a join nganhdaotao b on a.idndt=b.iddt where idsv='$username'");
       
     }
     
      ?>
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="education">
      <div class="w-100">
         <?php 
    $username=$_SESSION['username'];
     if(isset($username))
     {
      $t->cvthanhtichhoctap1("select * from ketquahoctap where idsv='$username'");
       
     }
     else
     {
      echo "<h1></h1>";
     }
      ?>
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="skills">
    
        
        <div id="wrap-inner">
            <div class="products">
             <h2>Đã đăng kí</h2>
             <h6 style="color: red"><i>* Lưu ý: mỗi sinh viên chỉ có thể chấp nhận thực tập ở 1 nơi, nếu bạn đã được công ty duyệt được phép đi thực tập thì hãy cân nhắc trước khi chấp nhận với hệ thống nhé!</i></h6>
              <div class="product-list row">
                <?php $t->congtydadangky(); ?>
              </div>
            </div>
          </div>
      <div></div>

    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="interests">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="w-100" style="border-right: black">
          <h2 class="mb-5">Đổi thông tin cá nhân</h2>
          <div class="form-group" width="200px">
            <label for="usr">Tên </label>
            <input type="text" class="form-inline" name="tensinhvien" >
          </div>
          <div class="form-group" width="200px">
            <label for="usr">Hình </label>
            <input type="file" class="form-inline" name="hinh" >
          </div>
          <div class="form-group">
            <label for="pwd">Email </label>
            <input type="email" class="form-inline" name="email">
          </div> <br>
          <div class="form-check">
            <input type="submit" class="btn btn-secondary" value="Xác nhận" name="submit1">
          </div>
        </div>
      </form>
      <?php 
          $idsv=$_SESSION['username'];
          $tensinhvien=$_POST['tensinhvien'];
          $email=$_POST['email'];
          $hinh=$_FILES['hinh']['name'];
          switch ($_POST['submit1']) {
            case 'Xác nhận':
              
              {
                $t->doithongtin($idsv,$tensinhvien,$hinh,$email);
                break;
              }
          }
       ?>
      <form action="" method="post">
         <div class="w-100" style="margin-left: 180px;" >
          <h2 class="mb-5">Đổi mật khẩu</h2>
          <div class="form-group" width="200px">
            <label for="usr">Mật khẩu cũ</label>
            <input type="password" class="form-inline" name="password" >
          </div>
          <div class="form-group">
            <label for="pwd">Mật khẩu mới</label>
            <input type="password" class="form-inline" name="matkhaumoi">
          </div> 
          <div class="form-group">
            <label for="pwd">Nhập lại mật khẩu mới</label>
            <input type="password" class="form-inline" name="nhaplaimkm">
          </div>
          <div class="form-check">
            <input type="submit" class="btn btn-secondary" name="submit2" value="Xác nhận">
          </div>
        </div>
      </form>
      <?php 
          $username=$_SESSION['username'];
          $password=$_POST['password'];
          $matkhaumoi=$_POST['matkhaumoi'];
          $nhaplaimkm=$_POST['nhaplaimkm'];
          switch ($_POST['submit2']) {
            case 'Xác nhận':
              
              {
                $t->doimatkhau($username,$password,$matkhaumoi,$nhaplaimkm);
                break;
              }
          }
       ?>
    
    </section>

    <hr class="m-0">

    

  </div>


 

<div class="modal fade" id="exampleModalB" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
        <center><h4>Bạn có chắc chắn đồng ý đi thực tập ở <?php 
        $t->thongtincongtythuctap(); ?></h4></center><br>
        <h6 style="color: red"><center><i>* Lưu ý: mỗi sinh viên chỉ có thể duyệt vào 1 nghề thực tập nhất định</i></center></h6>
      </div>
      <div class="modal-footer">
        <form action="" method="post">
        <input type="submit" class="btn btn-danger" value="Đồng ý" name="duyet">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </form>
         <?php 
            $idntd=$_GET['idnganhtuyendung'];
            if (isset($idntd)) { ?>
                 <script>
       $(document).ready(function(){
            $('#exampleModalB').modal('show');
        }); 
    </script>
            <?php }
          ?>
          <?php 
            switch ($_POST['duyet']) {
                case 'Đồng ý':
                    {
                        $t->xacnhanthuctap();
                        
                    }
            }
           ?>
      </div>
    </div>
  </div>
</div>
</body>

</html>
