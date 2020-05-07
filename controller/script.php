 <!--  Trang nào nhúng script thì trang đó chính là nơi đầu đường dẫn-->
<?php
include 'connect.php';

class guest {

	function showkhoa($sql) {
		$ketqua = mysql_query("$sql");
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {
			while ($row = mysql_fetch_array($ketqua)) {
				$idkhoa = $row['idnganh'];
				$tennganh = $row['TenNganh'];
				echo '

				<li class="menu-item"><a href="index.php?idkhoa=' . $idkhoa . '">' . $tennganh . '</a></li>';

			}
		} else {
			echo 'Không có dữ liệu';
		}
	}
	function showcongtyomain($sotin1trang)
	{
		$idkhoa=$_GET['idkhoa'];
		$ketqua = mysql_query("select  * from congty a join nganhcongtytuyendung b on a.id=b.idcty join nganhdaotao c on b.idnganh=c.iddt join khoa d on c.idkhoa=d.idnganh");
		$h = mysql_num_rows($ketqua);
		$tongsotrang=ceil($h/$sotin1trang);
		for($i=1;$i<=$tongsotrang;$i++)
		{
			if(isset($idkhoa))
			{
				echo ' <ul class="pagination pagination-lg">
					    
					    <li class="page-item"> <a href="?idkhoa='.$idkhoa.'&trang='.$i.'">'.$i.'</a></li>
					    
					  </ul>
					 
					  ';
			}
			else
			{
				echo '
					  <ul class="pagination pagination-lg">
					    
					    <li class="page-item"><a class="page-link" href="?trang='.$i.'">'.$i.'</a></li>
					    
					  </ul>
					';
			}
		}

	}
	function showcongtyomain_phantrang($sql) // show công ty ở vùng main
	{
		$ketqua = mysql_query("$sql");
		$i = mysql_num_rows($ketqua);
		
		if ($i > 0) {

			while ($row = mysql_fetch_array($ketqua)) {
				$id = $row['id'];
				$tencongty = $row['tencongty'];
				$khuvuc = $row['khuvuc'];
				$nghecantuyen = $row['nghecantuyen'];
				$nganhhocyeucau = $row['tennganhdaotao']; // đổi thành nganh dao tao bên cột nganhdaotao
				$hinh = $row['hinh'];

				echo '<div class="product-item col-md-3 col-sm-8 col-xs-12" style="margin-right:20px;margin-bottom:10px;margin-left:10px">
				<form action="" method="post">
				<a href="#"><img src="layout/img/home/congtythuctap/' . $hinh . '" width="96px" height="90px" ></a>
					<p style="hieght:40px"><a href="#" style="font-weight: bold;">' . $tencongty . '</a></p>
					<p><a href="#">Khu vực : ' . $khuvuc . '</a></p>
									<p class="price"><span style="color:black">Cần tuyển:</span> ' . $nghecantuyen . '</p>

									<div class="marsk">
										<a href="details.php?idnganh=' . $id . '#wrap-inner">Xem chi tiết</a>
									</div>
									</form></div>

						 ';
				// ?wrap-inner là đẩy về id wrap-inner
			}

		}
	}
	
function showchitietcongty($sql) {
		//Bước 1: lấy id của quản lí sinh viên đăng kí để xem sinh viên có đăng kí chưa nếu rồi thì disable nút submit và có thêm nút hủy đăng kí còn chưa thì thả nút submit
		$username=$_SESSION['username'];
		$idnganh=$_GET['idnganh'];
		
		$kiemtra2 = mysql_query("select *
from congty a
join nganhcongtytuyendung b on a.id = b.idcty
join nganhdaotao c on b.idnganh = c.iddt
join khoa d on c.idkhoa = d.idnganh
join qlsvdangki e on a.id = e.idcty
where e.idnganhtuyendung= '".$idnganh."'
and e.username = '".$username."' and b.id='".$idnganh."'");
		$i2 = mysql_num_rows($kiemtra2);
	
			while ($row2 = mysql_fetch_array($kiemtra2)) 
						{
								$idnganhtuyendung=$row2['idnganhtuyendung'];

						}
					

		//bước 2: lấy điểm của sinh viên
		$kiemtra3=mysql_query("select * from  ketquahoctap where idsv='$username'");
		
		while ($row3=mysql_fetch_array($kiemtra3)) {
			$diemheso4=$row3['diemheso4'];
		}
		//bước 3: lấy trạng thái
		 $kiemtra4=mysql_query("select distinct trangthai from  qlsvdangki where username='$username'");
		while ($row4=mysql_fetch_array($kiemtra4)) {
			
			$trangthai=$row4['trangthai'];
			
			
if($trangthai=='Y')
			{
				echo "<div><script>Swal.fire({
  title: 'THÔNG BÁO',
  icon: 'warning',
  confirmButtonText:'Đóng', 
  html:
    'Bạn đã có công ty đồng ý duyệt đi thực tập, ' +
    '<a href=yourself.php#skills>nhấp vào đây</a> ' +
    'để xem chi tiết!',
  
  

  
})
</script></div>";
				
			}
			}
		
			
		

		//bước **
		
		//bước 4:
		
		$kiemtra = mysql_query("$sql");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {

				$id = $row['id'];
				$tencongty = $row['tencongty'];
				$hinh = $row['hinh'];
				$nghecantuyen = $row['nghecantuyen'];
				$tennganhdaotao = $row['tennganhdaotao'];
				$thoigianlam = $row['thoigianlam'];
				$luong = $row['luong'];
				$diachi = $row['diachi'];
				$soluong = $row['soluong'];
				$chitietcongty = $row['chitietcongty'];
				$lienhe = $row['lienhe'];
				$hannop = $row['ngayhethan'];
				$motacongviec = $row['motacongviec'];
				 //ngày hết hạn nộp hồ sơ

				if($trangthai=='OK')
				{
					echo '<div id="product-info">
							<div class="clearfix"></div>
							<h3 style="font-weight: bold;">' . $tencongty . '</h3>
							<div class="row">
								<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
									<img src="layout/img/home/congtythuctap/' . $hinh . '" style="margin-top: 130px; margin-left: 10px;" width="155px" height="115">
								</div>
								<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
									<p>Việc làm : <span class="price">' . $nghecantuyen . '</span></p>
									<p>Ngành học yêu cầu : ' . $tennganhdaotao . '</p>
									<p>Thời gian : ' . $thoigianlam . '</p>
									<p>Mức lương : ' . $luong . '</p>
									<p>Hạn nộp hồ sơ: ' . $hannop . '</p>
									<p>Địa chỉ : ' . $diachi . '</p>
									<p>Số lượng : ' . $soluong . ' </p>
									<center><button type="button" class="btn btn-danger btn-lg" style="opacity:1" data-toggle="tooltip" data-placement="top">Bạn đang đi thực tập không được phép đăng kí</button></center>

								</div>
							</div>
					</div>
					<br>
						<p><span style="color:red;font-weight:bold;margin-left:40px;">' . $nghecantuyen . '</span>&#160;&#160;&#160;' . $motacongviec . '</p>

					<div id="product-detail">
							<h3>Chi tiết về công ty</h3>
							<p class="text-justify" style="margin-left:10px" align="left">' . $chitietcongty . '</p>
						</div>

						<div id="comment">
							<h3>Liên hệ công ty</h3><span style="margin-left:10px">' . $lienhe . ' <span>

						</div>';
				}
				elseif ($trangthai=='P'||$trangthai=='F') {
					echo '<div id="product-info">
							<div class="clearfix"></div>
							<h3 style="font-weight: bold;">' . $tencongty . '</h3>
							<div class="row">
								<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
									<img src="layout/img/home/congtythuctap/' . $hinh . '" style="margin-top: 130px; margin-left: 10px;" width="155px" height="115">
								</div>
								<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
									<p>Việc làm : <span class="price">' . $nghecantuyen . '</span></p>
									<p>Ngành học yêu cầu : ' . $tennganhdaotao . '</p>
									<p>Thời gian : ' . $thoigianlam . '</p>
									<p>Mức lương : ' . $luong . '</p>
									<p>Hạn nộp hồ sơ: ' . $hannop . '</p>
									<p>Địa chỉ : ' . $diachi . '</p>
									<p>Số lượng : ' . $soluong . ' </p>
									<center><button type="button" class="btn btn-danger btn-lg" style="opacity:1" data-toggle="tooltip" data-placement="top">KHÔNG ĐƯỢC ĐĂNG KÍ</button>
									<h3 style="color:red">Vì bạn đã thực tập xong. Nếu bạn muốn cải thiện điểm cũng như kinh nghiệm vui lòng liên hệ với giảng viên chủ quản!</h3>
									<a href="yourself.php#skills">Nhấp vào đây để xem chi tiết</a>
									</center>

								</div>
							</div>
					</div>
					<br>
						<p><span style="color:red;font-weight:bold;margin-left:40px;">' . $nghecantuyen . '</span>&#160;&#160;&#160;' . $motacongviec . '</p>

					<div id="product-detail">
							<h3>Chi tiết về công ty</h3>
							<p class="text-justify" style="margin-left:10px" align="left">' . $chitietcongty . '</p>
						</div>

						<div id="comment">
							<h3>Liên hệ công ty</h3><span style="margin-left:10px">' . $lienhe . ' <span>

						</div>';
				}
				else
				 {
				 	echo '<div id="product-info">
							<div class="clearfix"></div>
							<h3 style="font-weight: bold;">' . $tencongty . '</h3>
							<div class="row">
								<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
									<img src="layout/img/home/congtythuctap/' . $hinh . '" style="margin-top: 130px; margin-left: 10px;" width="155px" height="115">
								</div>
								<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
									<p>Việc làm : <span class="price">' . $nghecantuyen . '</span></p>
									<p>Ngành học yêu cầu : ' . $tennganhdaotao . '</p>
									<p>Thời gian : ' . $thoigianlam . '</p>
									<p>Mức lương : ' . $luong . '</p>
									<p>Hạn nộp hồ sơ: ' . $hannop . '</p>
									<p>Địa chỉ : ' . $diachi . '</p>
									<p>Số lượng : ' . $soluong . ' </p>';
									
									if(isset($idnganhtuyendung))
									{
										echo '<p class="text-center"><input type="submit" placeholder="Đã đăng kí" value="BẠN ĐÃ ĐĂNG KÍ" class="btn btn-default btn-lg disabled"></p>
										<form  method="post"><center><input type="submit" class="btn btn-danger btn-lg" value="HỦY ĐĂNG KÍ" name="huydangki"></center></form>

								</div>
							</div>
					</div>
					<br>
						<p><span style="color:red;font-weight:bold;margin-left:40px;">' . $nghecantuyen . '</span>&#160;&#160;&#160;' . $motacongviec . '</p>

					<div id="product-detail">
							<h3>Chi tiết về công ty</h3>
							<p class="text-justify" style="margin-left:10px" align="left">' . $chitietcongty . '</p>
						</div>

						<div id="comment">
							<h3>Liên hệ công ty</h3><span style="margin-left:10px">' . $lienhe . ' <span>

						</div>';
									}
									
									
									elseif(isset($diemheso4))
									{
										if ($diemheso4<2 && $diemheso4>0) {
												echo '<center><button type="button" class="btn btn-danger btn-lg" style="opacity:1" data-toggle="tooltip" data-placement="top" title="Không được phép đăng kí vì điểm của bạn chưa đủ để thực tập. Xin cảm ơn!" >Đăng kí</button></center>
										

								</div>
							</div>
					</div>
					<br>
						<p><span style="color:red;font-weight:bold;margin-left:40px;">' . $nghecantuyen . '</span>&#160;&#160;&#160;' . $motacongviec . '</p>

					<div id="product-detail">
							<h3>Chi tiết về công ty</h3>
							<p class="text-justify" style="margin-left:10px" align="left">' . $chitietcongty . '</p>
						</div>

						<div id="comment">
							<h3>Liên hệ công ty</h3><span style="margin-left:10px">' . $lienhe . ' <span>

						</div>';
											}
											else
											{
												echo '<p class="add-cart text-center"><a href="dangki.php?idnganh=' . $id . '" name="link">Đăng kí</a></p>
								</div>
							</div>
					</div>
					<br>
						<p><span style="color:red;font-weight:bold;margin-left:40px;">' . $nghecantuyen . '</span>&#160;&#160;&#160;' . $motacongviec . '</p>

					<div id="product-detail">
							<h3>Chi tiết về công ty</h3>
							<p class="text-justify" style="margin-left:10px" align="left">' . $chitietcongty . '</p>
						</div>

						<div id="comment">
							<h3>Liên hệ công ty</h3><span style="margin-left:10px">' . $lienhe . ' <span>

						</div>';
											}
										
									}
									else
									{
										echo '<p class="add-cart text-center"><a href="dangki.php?idnganh=' . $id . '" name="link">Đăng kí</a></p>
								</div>
							</div>
					</div>
					<br>
						<p><span style="color:red;font-weight:bold;margin-left:40px;">' . $nghecantuyen . '</span>&#160;&#160;&#160;' . $motacongviec . '</p>

					<div id="product-detail">
							<h3>Chi tiết về công ty</h3>
							<p class="text-justify" style="margin-left:10px" align="left">' . $chitietcongty . '</p>
						</div>

						<div id="comment">
							<h3>Liên hệ công ty</h3><span style="margin-left:10px">' . $lienhe . ' <span>

						</div>';
									}
									
			}
		}
	}
		//end bước 4
		
		// end ngoặc bước 3
		
	}
	// ĐĂNG NHẬP
	// ĐĂNG NHẬP
	function dangnhapvaohethong($username, $password, $phanquyen) {
		if (!$username or !$password) {
			echo "<script language='javascript'>alert('Chưa nhập đủ thông tin')</script>";
			exit();
		}

		$kiemtra = mysql_query("select username,password,phanquyen from user where username='$username'");
		if (mysql_num_rows($kiemtra) == 0) {
			echo "<script language='javascript'>alert('Sinh viên chưa tồn tại hoặc giảng viên chưa cập nhật')</script>";
			exit();
		}
		$password = md5($password);
		$row = mysql_fetch_array($kiemtra);
		if ($password != $row['password']) {
			echo "<script language='javascript'>alert('Mật khẩu sai')</script>";
			exit();
		}
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['phanquyen'] = $phanquyen;

		// neu username va matkhau dung thi day qua trang index
		echo "<script>window.location='index.php'</script>";

		die();
	}
/*	function phanquyendangnhap($sql)
{
$kiemtra=mysql_query("$sql");
$i=mysql_num_rows($kiemtra);
if($i>0)
{
while ($row=mysql_fetch_array($kiemtra))
{

$phanquyen=$row['phanquyen'];
$_SESSION['phanquyen']=$phanquyen;

}

}
} */
	function confi_dangnhap($username, $password) {

		$sql = "select username from user where username='$username' and password='$password'  limit 1";
		$ketqua = mysql_query($sql);
		$i = mysql_num_rows($ketqua);
		if ($i != 1) {
			echo '<script>window.location="index.php"</script>';
		}

	}
	// THÔNG TIN CÁ NHÂN
	function cvavatar($sql) {
		$ketqua = mysql_query("$sql");
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {

			while ($row = mysql_fetch_array($ketqua)) {
				$idsv = $row['idsv'];
				$hinh = $row['hinh'];

				echo '<span class="d-none d-lg-block">
			        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="layout/img/avt/' . $hinh . '" alt="">
			      </span>';
			}

		}
	}
	function cvthongtincanhan($sql) {
		$ketqua = mysql_query("$sql");
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {

			while ($row = mysql_fetch_array($ketqua)) {
				$idsv = $row['idsv'];
				$tensv = $row['tensv'];
				$khoa = $row['khoa'];
				$email = $row['email'];

				echo ' <div class="w-100">
        <h1 class="mb-0">
          ' . $tensv . '
        </h1>
        <div class="subheading mb-5">Mssv: ' . $idsv . '
          <a href="#">Email : ' . $email . '</a>
        </div>
        <p class="lead mb-5">Sinh viên của Trường được trang bị năng lực ngoại ngữ và tin học cũng như các kiến thức bổ trợ: kỹ năng giao tiếp, ứng xử, kỹ năng làm chủ bản thân, kỹ năng quản lý thời gian, kỹ năng làm việc nhóm, phương pháp tự học, phương pháp nghiên cứu khoa học...</p>
        <div class="center">
                        <ul class="social-network social-circle">
                            <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="icoInstagram" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>

                        </ul>
                    </div>
      </div>';
				// ?wrap-inner là đẩy về id wrap-inner
			}

		}
	}
	function cvnganhhoc($sql) {
		$ketqua = mysql_query("$sql");
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {

			while ($row = mysql_fetch_array($ketqua)) {
				$idsv = $row['idsv'];

				$khoa = $row['khoa'];
				$idkhoa = $row['idkhoa'];
				$gioithieu = $row['gioithieu']; // bên bảng khoa

				echo '<div class="w-100">


        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0">Khoa chủ quản</h3>
            <div class="subheading mb-3" style="color:#bd5d38;font-wieght:bold">' . $khoa . '</div>
            <p>&#160;&#160;&#160;&#160;&#160;' . $gioithieu . '</p>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary">&hearts;&#160;&hearts;&#160;&hearts;</span>
          </div>
        </div>



						';
			}
		}
	}

	function cvnganhhoc2($sql) {

		$ketqua = mysql_query("$sql");
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {

			while ($row = mysql_fetch_array($ketqua)) {
				$iddt = $row['iddt'];

				$tennganhdaotao = $row['tennganhdaotao'];

				$gioithieu = $row['gioithieu']; // bên bảng khoa
				echo ' <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
	          <div class="resume-content">
	            <h3 class="mb-0">Ngành đào tạo</h3>
	            <div class="subheading mb-3" style="color:#bd5d38;font-wieght:bold">' . $tennganhdaotao . '</div>
	            <p>&#160;&#160;&#160;&#160;&#160;' . $gioithieu . '</p>
	          </div>
	          <div class="resume-date text-md-right">
	            <span class="text-primary">&hearts;&#160;&hearts;&#160;&hearts;</span>
	          </div>
	        </div>';

			}
		} else {
			echo 'Không có dữ liệu';
		}
	}
	function cvthanhtichhoctap1($sql) {
		$username=$_SESSION['username'];
		$query=mysql_query("select * from qlsvsauthuctap where idsv='$username'");
		$r=mysql_fetch_array($query);
		$diemthuctap=$r['diemthuctap'];
		$kiemtra = mysql_query("$sql");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {
				$idsv = $row['idsv'];
				$diemnam1 = $row['diemnam1'];
				$diemnam2 = $row['diemnam2'];
				$diemnam3 = $row['diemnam3'];
				$diemnam4 = $row['diemnam4'];
				$diemheso4 = $row['diemheso4'];
				
				if ($diemheso4 < 2) {
					echo '
				        <h2 class="mb-5">Điểm tích lũy hằng năm</h2>

				        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
				          <div class="resume-content">
				            <h3 class="mb-0">Năm 1</h3>
				            <div class="subheading mb-3"><span style="color: red">' . $diemnam1 . '</span> / 10</div>

				          </div>
				         <div class="resume-content">
				            <h3 class="mb-0">Năm 2</h3>
				            <div class="subheading mb-3"><span style="color: red">' . $diemnam2 . '</span> / 10</div>

				          </div>
				          <div class="resume-content">
				            <h3 class="mb-0">Năm 3</h3>
				            <div class="subheading mb-3"><span style="color: red">' . $diemnam3 . '</span> / 10</div>

				          </div>
				          <div class="resume-content">
				            <h3 class="mb-0">Năm 4</h3>
				            <div class="subheading mb-3"><span style="color: red">' . $diemnam4 . '</span> / 10</div>

				          </div>
				        </div>
				        <div class="resume-item d-flex flex-column flex-md-row justify-content-between">
				          <div class="resume-content">
				            <h2 class="mb-0">Điểm hệ số 4</h2>
				            <div class="subheading mb-3"><span style="color: red">' . $diemheso4 . '</span> / 4</div>
				            <div class="alert alert-danger" role="alert">
				              <strong style="font-weight: bold;"> &#8855; </strong> Điểm hệ số 4 không đủ để đăng kí thực tập
				            </div>
				          </div>

				        </div>';

				} else {
					echo '
				        <h2 class="mb-5">Điểm tích lũy hằng năm</h2>

				        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
				          <div class="resume-content">
				            <h3 class="mb-0">Năm 1</h3>
				            <div class="subheading mb-3"><span style="color: red">' . $diemnam1 . '</span> / 10</div>

				          </div>
				         <div class="resume-content">
				            <h3 class="mb-0">Năm 2</h3>
				            <div class="subheading mb-3"><span style="color: red">' . $diemnam2 . '</span> / 10</div>

				          </div>
				          <div class="resume-content">
				            <h3 class="mb-0">Năm 3</h3>
				            <div class="subheading mb-3"><span style="color: red">' . $diemnam3 . '</span> / 10</div>

				          </div>
				          <div class="resume-content">
				            <h3 class="mb-0">Năm 4</h3>
				            <div class="subheading mb-3"><span style="color: red">' . $diemnam4 . '</span> / 10</div>

				          </div>
				        </div>
				        <div class="resume-item d-flex flex-column flex-md-row justify-content-between">
				          <div class="resume-content">
				            <h2 class="mb-0">Điểm hệ số 4</h2>
				            <div class="subheading mb-3"><span style="color: red">' . $diemheso4 . '</span> / 4</div>

				          </div>

				        </div>';
				        if($diemthuctap<5&&$diemthuctap>0)
				        {
				        	echo '<div class="resume-content">
				            <h2 class="mb-0">Điểm thực tập</h2>
				            <div class="subheading mb-3"><span style="color: red">' . $diemthuctap . '</span> / 10</div>

				          </div>
				          <div class="alert alert-danger" role="alert">
				              <strong style="font-weight: bold;"> &#8855; </strong>Điểm thực tập chưa đủ để làm đồ án tốt nghiệp
				            </div>
				          '
				          ;

				        }
				        elseif($diemthuctap==0)
				        {
						echo 'Chưa có điểm thực tập';
				        }
				        else
				        {
				        echo '<div class="resume-content">
				            <h2 class="mb-0">Điểm thực tập</h2>
				            <div class="subheading mb-3"><span style="color: red">' . $diemthuctap . '</span> / 10</div>

				          </div>
				          <div class="alert alert-success" role="alert">
				              <strong style="font-weight: bold;"> &#8855; </strong>Điểm thực tập đã đủ để làm đồ án tốt nghiệp
				            </div>';
				        }
				}
			}
		}
	}

	//ĐỔI THÔNG TIN VÀ MẬT KHẨU
	function doithongtin($idsv, $tensinhvien, $hinh, $email) {

		$file_type = $_FILES['hinh']['type'];
		if ($file_type != 'image/jpeg') {
			echo ' <div class="alert alert-danger" role="alert">
				              <strong style="font-weight: bold;"> &#8855; </strong> Chỉ chọn file hình jpg
				  </div>';

		}

		if (isset($_FILES['hinh'])) {
			$loi = array();
			$file_name = $_FILES['hinh']['name'];
			$file_size = $_FILES['hinh']['size'];
			$file_tmp = $_FILES['hinh']['tmp_name'];
			$file_type = $_FILES['hinh']['type'];
			$file_ext = strtolower(end(explode('.', $_FILES['hinh']['name'])));
			$exp = array("jpg"); // phần này là đặt cái đuôi tệp vào ''
			if (in_array($file_ext, $exp) === false) {

			}

			if ($file_size > 2097152) {
				$loi[] = "<h3>Upload file lớn hơn</h3>";

			}
			if (empty($loi) == true) {
				move_uploaded_file($file_tmp, "layout/img/avt/" . $file_name); // giữ nguyên site map này để không bị lỗi

			} else {
				print_r($loi);
			}
		}
		if ($idsv && $tensinhvien && $hinh && $email) {
			$ketqua = mysql_query("UPDATE `sinhvien` SET `tensv`='$tensinhvien',`hinh`='$hinh',`email`='$email' WHERE `idsv`='$idsv'");
			if ($ketqua > 0) {
				echo '<div class="alert alert-primary"><strong>ĐỔI THÔNG TIN CÁ NHÂN THÀNH CÔNG</strong></div>';
			} else {
				echo "<div class='alert alert-danger' >ĐỔI THÔNG TIN CÁ NHÂN KHÔNG THÀNH CÔNG</div>";
			}
		}

	}
	function doimatkhau($username, $password, $matkhaumoi, $nhaplaimkm) // password là mật khẩu cũ
	{

		if (!$password || !$matkhaumoi || !$nhaplaimkm) {
			echo "<div class='alert alert-danger' >Chưa nhập đủ thông tin</div>";
			exit();
		}
		$kiemtra = mysql_query("select username,password from user where username='$username'");
		$password = md5($password);
		$row = mysql_fetch_array($kiemtra);
		if ($password != $row['password']) {
			echo "<div class='alert alert-danger' >MẬT KHẨU SAI</div>";
			exit();
		}

		if ($nhaplaimkm != $matkhaumoi) {
			echo "<div class='alert alert-danger'>Mật khẩu không khớp</div>";
			exit();
		}

		if ($username && $password && $matkhaumoi && $nhaplaimkm) {
			$ketqua = mysql_query("UPDATE `user` SET `password`=md5('$matkhaumoi') WHERE `username`='$username'");
			if ($ketqua > 0) {

				echo '<script language="javascript">alert("Thành công")</script>';

			} else {
				echo "<div class='alert alert-danger' >ĐỔI MẬT KHẨU KHÔNG THÀNH CÔNG</div>";
			}
		}

	}
	// ADMIN
	//SINH VIÊN
	// function AdSV là func show các dữ liệu của sinh viên ra bảng
	function AdSV($sql) {
		$kiemtra = mysql_query("$sql");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {
				$mssv = $row['idsv'];
				$tensv = $row['tensv'];
				$email = $row['email'];

				$khoa = $row['khoa'];
				$nganh = $row['tennganhdaotao'];
				$diemheso4 = $row['diemheso4'];
				echo '<tr>
						  <td  style="color: red; font-weight: bold;">' . $mssv . '</td>
	                      <td>' . $tensv . '</td>
	                      <td>' . $email . '</td>

	                      <td>' . $khoa . '</td>
	                      <td>' . $nganh . '</td>
	                  ';
				if ($diemheso4 < 2 ) {
					echo "<td style='color:red;font-weight:bold'>" . $diemheso4 . "
					<div>
						  Không được đăng kí thực tập
						</div>
	             	</td>

	             	";
				} else {
					echo "<td>" . $diemheso4 . "</td>";
				}
				echo '</tr>

                     ';

			}
		}
	}
	// fucntion AdSV1 là func show các dữ liệu của công ty đang tuyển dụng

	function AdSV1($sql) {
		$kiemtra = mysql_query("$sql");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {
				$idcongty = $row['id'];
				$tencongty = $row['tencongty'];
				$diachi = $row['diachi'];
				$nghecantuyen = $row['nghecantuyen'];

				$thoigianlam = $row['thoigianlam'];
				$luong = $row['luong'];
				$soluong = $row['soluong'];
				$lienhe = $row['lienhe'];
				$nganhhocyeucau = $row['tennganhdaotao'];

				echo '<tr>
                                                <td style="font-weight: bold;">' . $idcongty . '</td>
                                                <td style="color: red">' . $tencongty . '</td>
                                                <td>' . $diachi . '</td>
                                                <td>' . $nghecantuyen . '</td>
                                                <td>' . $thoigianlam . '</td>
                                                <td>' . $luong . '</td>
                                                <td>' . $soluong . '</td>
                                                <td>' . $lienhe . '</td>
                                                <td>' . $nganhhocyeucau . '</td>


                    </tr>';

			}
		}
	}
	// fucntion AdSV2 là func show các dữ liệu của công ty có trong hệ thống
	function AdSV2($sql) {
		$kiemtra = mysql_query("$sql");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {
				$idcongty = $row['id'];
				$tencongty = $row['tencongty'];
				$diachi = $row['diachi'];
				$khuvuc = $row['khuvuc'];

				$lienhe = $row['lienhe'];

				echo '<tr>
                                                <td style="font-weight: bold;">' . $idcongty . '</td>
                                                <td style="color: red">' . $tencongty . '</td>
                                                <td>' . $diachi . '</td>
                                                <td>' . $khuvuc . '</td>



                                                <td>' . $lienhe . '</td>



                    </tr>';

			}
		}
	}
	//Đổi mật khẩu cũng giống trên kia nhưng đổi kiểu thông báo
	function doimatkhau2($username, $password, $matkhaumoi, $nhaplaimkm) // password là mật khẩu cũ
	{

		if (!$password || !$matkhaumoi || !$nhaplaimkm) {
			echo "<script language='javascript'>alert('Chưa nhập đủ thông tin');</script>";
			exit();
		}
		$kiemtra = mysql_query("select username,password from user where username='$username'");
		$password = md5($password);
		$row = mysql_fetch_array($kiemtra);
		if ($password != $row['password']) {
			echo "<script language='javascript'>alert('Mật khẩu sai');</script>";

			exit();
		}

		if ($nhaplaimkm != $matkhaumoi) {
			echo "<script language='javascript'>alert('Mật khẩu nhập lại không khớp');</script>";
			exit();
		}

		if ($username && $password && $matkhaumoi && $nhaplaimkm) {
			$ketqua = mysql_query("UPDATE `user` SET `password`=md5('$matkhaumoi') WHERE `username`='$username'");
			if ($ketqua > 0) {

				echo "<script language='javascript'>alert('ĐỔI MẬT KHẨU THÀNH CÔNG');</script>";

			} else {
				echo "<script language='javascript'>alert('ĐỔI MẬT KHẨU KHÔNG THÀNH CÔNG');</script>";
			}
		}

	}
	// THÊM
	//CÔNG TY
	function addcongty($username, $password, $tencongty, $hinh, $diachi, $khuvuc, $chitietcongty, $lienhe) {
		if (!$username || !$password || !$tencongty || !$hinh || !$diachi || !$khuvuc || !$chitietcongty || !$lienhe) {
			echo "<script language='javascript'>alert('Chưa thành công xem lỗi ở dưới');</script>";
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Bạn chưa nhập đủ thông tin</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="fa fa-times"></span>
                                            </button>
                  </div>';
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'><a href='javascript: history.go(-1)'><strong>&#8594; Trở lại thông tin đã nhập tại đây 	&#8592;</strong>
                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span class='fa fa-times'></span>
                                            </button>
                  ";
			exit();
		}
		$kiemtra = mysql_query("select username,password from user where username='$username'");
		if (mysql_num_rows($kiemtra) > 0) {
			echo "<script language='javascript'>alert('Chưa thành công xem lỗi ở dưới');</script>";
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Đã tồn tại username công ty này</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="fa fa-times"></span>
                                            </button>
                  </div>';
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'><a href='javascript: history.go(-1)'><strong>&#8594; Trở lại thông tin đã nhập tại đây 	&#8592;</strong>
                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span class='fa fa-times'></span>
                                            </button>
                  ";
			exit();
		}
		//kiểm tra username về độ dài và số

		// kiểm tra hình

		$file_type = $_FILES['hinh']['type'];
		if ($file_type != 'image/jpeg') {
			echo "<script language='javascript'>alert('Chưa thành công xem lỗi ở dưới');</script>";
			echo ' <div class="alert alert-danger" role="alert">
				              <strong style="font-weight: bold;"> &#8855; </strong> Chỉ chọn file hình jpg
				  </div>';
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'><a href='javascript: history.go(-1)'><strong>&#8594; Trở lại thông tin đã nhập tại đây 	&#8592;</strong>
                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span class='fa fa-times'></span>
                                            </button>
                  ";

			exit();

		}

		if (isset($_FILES['hinh'])) {
			$loi = array();
			$file_name = $_FILES['hinh']['name'];
			$file_size = $_FILES['hinh']['size'];
			$file_tmp = $_FILES['hinh']['tmp_name'];
			$file_type = $_FILES['hinh']['type'];
			$file_ext = strtolower(end(explode('.', $_FILES['hinh']['name'])));
			$exp = array("jpg"); // phần này là đặt cái đuôi tệp vào ''
			if (in_array($file_ext, $exp) === false) {

			}

			if ($file_size > 2097152) {
				$loi[] = "<h3>Upload file lớn hơn</h3>";

			}
			if (empty($loi) == true) {
				move_uploaded_file($file_tmp, "../../../layout/img/home/congtythuctap/" . $file_name); // giữ nguyên site map này để không bị lỗi

			} else {
				print_r($loi);
			}
		}

		if ($username && $password && $tencongty && $hinh && $diachi && $khuvuc && $chitietcongty && $lienhe) {
			$ketqua1 = mysql_query("insert into congty(tencongty,diachi,khuvuc,hinh,chitietcongty,lienhe,username)
				values('" . $tencongty . "','" . $diachi . "','" . $khuvuc . "','" . $hinh . "','" . $chitietcongty . "','" . $lienhe . "','" . $username . "')");
			$ketqua = mysql_query("insert into user(username,password,phanquyen)
				values('" . $username . "',md5('" . $password . "'),'4')");

			if ($ketqua > 0 && $ketqua1 > 0) {

				echo "<script language='javascript'>alert('THÊM THÀNH CÔNG');</script>";
			} else {
				echo "<script language='javascript'>alert('THÊM KHÔNG THÀNH CÔNG');</script>";
			}

		}
	}
	//XÓA
	//CÔNG TY
	function AdSV3($sql) {
		$kiemtra = mysql_query("$sql");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {
				$idcongty = $row['id'];
				$tencongty = $row['tencongty'];
				$diachi = $row['diachi'];

				$username = $row['username'];

				echo '<tr>
                                                <td style="font-weight: bold;">' . $idcongty . '</td>
                                                <td style="color: red">' . $tencongty . '</td>
                                                <td>' . $diachi . '</td>
                                                <td>' . $username . '</td>
                                                 <td><form action="" method="post"><a href="actiondelete.php?idcongty=' . $idcongty . '"><i class="ti-trash"></i></form></td>

                    </tr>';

			}
		}
	}
	//XÓA
	//CÔNG TY
	//action
	function showtenxoa($sql) {

		$kiemtra = mysql_query("$sql");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {

				$tencongty = $row['tencongty'];
				echo $tencongty;

			}
		}
	}
	function xoacongty($idcongty) {
		$kiemtra = mysql_query("DELETE `user`,`congty`  FROM `user`  INNER JOIN `congty` ON `user`.`username`=`congty`.`username`  WHERE `congty`.`id` = '$idcongty'");
		$kiemtra2 = mysql_query("DELETE  FROM `nganhcongtytuyendung`    WHERE `nganhcongtytuyendung`.`idcty` = '$idcongty'");
		if ($kiemtra = 2 && $kiemtra2 = 1) {
			echo "<script language='javascript'>alert('Bạn đã xóa thành công');</script>";
			echo "<script>window.location='congty.php'</script>";
		} else {echo "<h1>Sai</h1>";}
	}
	//GIẢNG VIÊN
	//	CHỨC NĂNG XEM GIẢNG VIÊN CỦA ADMIN

	function AdGV($sql) {

		$kiemtra = mysql_query("$sql");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {
				$idgiangvien = $row['id'];
				$tengiangvien = $row['tengiangvien'];
				$tenkhoachuquan = $row['TenNganh'];
				$lienhe = $row['lienhe'];

				echo '<tr>
                                                <td style="font-weight: bold;">' . $idgiangvien . '</td>
                                                <td style="color: red">' . $tengiangvien . '</td>
                                                <td>' . $tenkhoachuquan . '</td>
                                                <td>' . $lienhe . '</td>



                    </tr>';

			}
		}
	}
	//show khoa
	function khoaGV($sql) {
		$ketqua = mysql_query("$sql");
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {
			while ($row = mysql_fetch_array($ketqua)) {
				$id = $row['idnganh'];
				$tennganh = $row['TenNganh'];
				$_SESSION['idnganh'] = $idnganh;

				echo "<option value='" . $id . "'>" . $tennganh . "
				</option>"
				;
			}
		} else {
			echo "không có dữ liệu";
		}
	}

	//THÊM GIẢNG VIÊN
	function addgiangvien($username, $password, $tengiangvien, $hinh, $idkhoa, $lienhe) {
		if (!$username || !$password || !$tengiangvien || !$hinh || !$idkhoa || !$lienhe) {
			echo "<script language='javascript'>alert('Chưa thành công xem lỗi ở dưới');</script>";
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Bạn chưa nhập đủ thông tin</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="fa fa-times"></span>
                                            </button>
                  </div>';
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'><a href='javascript: history.go(-1)'><strong>&#8594; Trở lại thông tin đã nhập tại đây 	&#8592;</strong>
                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span class='fa fa-times'></span>
                                            </button>
                  ";
			exit();
		}
		$kiemtra = mysql_query("select username,password from user where username='$username'");
		if (mysql_num_rows($kiemtra) > 0) {
			echo "<script language='javascript'>alert('Chưa thành công xem lỗi ở dưới');</script>";
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Đã tồn tại username này</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="fa fa-times"></span>
                                            </button>
                  </div>';
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'><a href='javascript: history.go(-1)'><strong>&#8594; Trở lại thông tin đã nhập tại đây 	&#8592;</strong>
                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span class='fa fa-times'></span>
                                            </button>
                  ";
			exit();
		}
		//kiểm tra username về độ dài và số

		// kiểm tra hình

		$file_type = $_FILES['hinh']['type'];
		if ($file_type != 'image/jpeg') {
			echo "<script language='javascript'>alert('Chưa thành công xem lỗi ở dưới');</script>";
			echo ' <div class="alert alert-danger" role="alert">
				              <strong style="font-weight: bold;"> &#8855; </strong> Chỉ chọn file hình jpg
				  </div>';
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'><a href='javascript: history.go(-1)'><strong>&#8594; Trở lại thông tin đã nhập tại đây 	&#8592;</strong>
                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span class='fa fa-times'></span>
                                            </button>
                  ";

			exit();

		}

		if (isset($_FILES['hinh'])) {
			$loi = array();
			$file_name = $_FILES['hinh']['name'];
			$file_size = $_FILES['hinh']['size'];
			$file_tmp = $_FILES['hinh']['tmp_name'];
			$file_type = $_FILES['hinh']['type'];
			$file_ext = strtolower(end(explode('.', $_FILES['hinh']['name'])));
			$exp = array("jpg"); // phần này là đặt cái đuôi tệp vào ''
			if (in_array($file_ext, $exp) === false) {

			}

			if ($file_size > 2097152) {
				$loi[] = "<h3>Upload file lớn hơn</h3>";

			}
			if (empty($loi) == true) {
				move_uploaded_file($file_tmp, "../../../layout/img/avt/" . $file_name); // giữ nguyên site map này để không bị lỗi

			} else {
				print_r($loi);
			}
		}

		if ($username && $password && $tengiangvien && $hinh && $idkhoa && $lienhe) {
			$ketqua1 = mysql_query("insert into giangvien(tengiangvien,lienhe,hinh,idkhoa,username)
				values('" . $tengiangvien . "','" . $lienhe . "','" . $hinh . "','" . $idkhoa . "','" . $username . "')");
			$ketqua = mysql_query("insert into user(username,password,phanquyen)
				values('" . $username . "',md5('" . $password . "'),'3')");

			if ($ketqua > 0 && $ketqua1 > 0) {

				echo "<script language='javascript'>alert('THÊM THÀNH CÔNG');</script>";
			} else {
				echo "<script language='javascript'>alert('THÊM KHÔNG THÀNH CÔNG');</script>";
			}

		}
	}
	function AdGV3($sql) {
		$kiemtra = mysql_query("$sql");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {
				$idgiangvien = $row['id'];
				$tengiangvien = $row['tengiangvien'];
				$lienhe = $row['lienhe'];

				$username = $row['username'];

				echo '<tr>
                                                <td style="font-weight: bold;">' . $idgiangvien . '</td>
                                                <td style="color: red">' . $tengiangvien . '</td>
                                                <td>' . $lienhe . '</td>
                                                <td>' . $username . '</td>
                                                 <td><a href="actiondelete.php?idgiangvien=' . $idgiangvien . '"><i class="ti-trash"></i></a></td>


                    </tr>';

			}
		}
	}
	//xóa giảng viên (khi xóa công ty thì bảng user cũng bị xóa theo)
	function xoagiangvien($idgiangvien) {
		$kiemtra = mysql_query("DELETE `user`,`giangvien`  FROM `user`  INNER JOIN `giangvien` ON `user`.`username`=`giangvien`.`username`  WHERE `giangvien`.`id` = '$idgiangvien'");
		if ($kiemtra = 2) {
			echo "<script language='javascript'>alert('Bạn đã xóa thành công');</script>";
			echo "<script>window.location='giangvien.php'</script>";
		} else {echo "<h1>Sai</h1>";}
	}
	//Đăng kí thực tập
	function dangkithuctap($username,$idcty,$idnganhtuyendung)
	{
		
				
				
					$insert=mysql_query("insert into qlsvdangki(username, idcty, idnganhtuyendung)
				values('" . $username . "','" . $idcty . "','" . $idnganhtuyendung . "')");
					
					
				
			
						echo "<script language='javascript'>alert('Đăng kí thành công');</script>";
						echo "<script>window.location='details.php?idnganh=".$_GET['idnganh']."#wrap-inner'</script>";

					
				

	}
	//hủy đăng kí thực tập
	function huydangkithuctap(){
		$idnganhtuyendung=$_GET['idnganh'];
		$username=$_SESSION['username'];
		$kiemtra = mysql_query("select * from qlsvdangki where idnganhtuyendung='$idnganhtuyendung' and username='$username'");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {
				$idql = $row['idql'];
				
			}
		}

			$kiemtra2 = mysql_query("DELETE  FROM `qlsvdangki`   WHERE `qlsvdangki`.`idql` = '$idql'");
		
			echo "<script language='javascript'>alert('Bạn đã xóa thành công');</script>";
			echo "<script>window.location='details.php?idnganh=$idnganhtuyendung'</script>";
		
	}
	//xác nhận điểm
// show cong ty đã đăng ky
	function congtydadangky(){
		$idnganhtuyendung=$_GET['idnganh'];
		$username=$_SESSION['username'];
		echo "<h1>".$idnganhtuyendung."</h1>";
		$ketqua = mysql_query("select *
from congty a
join qlsvdangki e ON a.id = e.idcty
join nganhcongtytuyendung c ON e.idnganhtuyendung = c.id

where e.username='$username'
LIMIT 0 , 30");
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {

			while ($row = mysql_fetch_array($ketqua)) {
				$idntd=$row['idnganhtuyendung'];
				$tennganhcantuyen=$row['nghecantuyen'];
				$luong=$row['luong'];
				$thoigianlam=$row['thoigianlam'];
				$tencongty=$row['tencongty'];
				$diachi=$row['diachi'];
				$hinh=$row['hinh'];
				$trangthai=$row['trangthai'];
				$lienhe=$row['lienhe'];
				
				
				echo '<div class="product-item col-md-5 col-sm-8 col-xs-12" style="border: 1px solid gray;margin-left:10px;margin-bottom:10px;" >
				<form action="" method="post">
				<center><img src="layout/img/home/congtythuctap/' . $hinh . '" width="96px" height="90px" ></center>
					<center><p style="hieght:40px">' . $tencongty. '</p></center>
					<p class="price"><span style="color:black">Địa chỉ : </span>' . $diachi. '</p>
									<p class="price"><span style="color:black">Liên hệ : </span> ' . $lienhe. '</p>
									<p class="price"><span style="color:black">Nghề đăng kí : </span> ' . $tennganhcantuyen. '</p>
									<p class="price"><span style="color:black">Lương : </span> ' . $luong. '</p>
									<p class="price"><span style="color:black">Thời gian làm : </span> ' . $thoigianlam. '</p>

									';
									if($trangthai=='Y')
									{
										echo '
									<form><p class="price" style="color:red"><span>Trạng thái : </span>Đã được chấp nhận đi thực tập, bạn cần xác nhận để chắc chắn sẽ đi thực tập! </p>
										<center>
										<a href="?idnganhtuyendung='.$idntd.'"" class="btn btn-success">Xác nhận</a>
											
									</center>
									</form></div>

								 ';


									}
									elseif($trangthai=='OK')
									{
										echo '
									<form><p class="price" style="color:red"><span>Trạng thái : </span>BẠN ĐANG ĐI THỰC TẬP Ở CÔNG TY NÀY </p>
										<center>
										
											
									</center>
									</form></div>

								 ';


									}
								   elseif($trangthai=='P')
								   {
								   	echo '
									<form><p class="price" style="color:red"><span>Trạng thái : </span>Đậu</p>
										<script>Swal.fire(
													  "Thông báo!",
													  "CHÚC MỪNG! Bạn đã hoàn thành xong kỳ thực tập của mình. Giờ bạn có thể tiến hành đi làm đồ án tốt nghiệp. Và có thể xem lại điểm thực tập ở mục KẾT QUẢ HỌC TẬP",
													  "success"
													)</script>
									</form></div>

								 ';
								   }
								   elseif($trangthai=='F')
								   {
								   	echo '
									<form><p class="price" style="color:red"><span>Trạng thái : </span>Rớt</p>
										
										<script>Swal.fire(
													  "Thông báo!",
													  "Dù bạn đã thực tập xong nhưng bạn chưa đủ điểm để vượt qua kì thực tập! Vui lòng liên hệ với giảng viên nếu muốn đi thực tập lại. Và có thể xem lại điểm thực tập ở mục KẾT QUẢ HỌC TẬP ",
													  "error"
													)</script>
									</form></div>

								 ';
								   }
									else
									{
										echo '
									<p class="price" style="color:red"><span>Trạng thái : </span>Đang chờ quyệt </p>
									</form></div>

								 ';}
			}
		}
	}
	function thongtincongtythuctap()
	{
		$idnql=$_GET['idnganhtuyendung'];
		
		$kiemtra=mysql_query("select * from congty a join nganhcongtytuyendung b on a.id=b.idcty where b.id='$idnql'");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {
				$tencongty=$row['tencongty'];
				$nghecantuyen=$row['nghecantuyen'];
				echo "<span style='color:red;font-weight:bold'>".$tencongty."</span> với nghề đi làm là <span style='color:red;font-weight:bold'>".$nghecantuyen."</span> này không?";
			}
		}

	}
	function xacnhanthuctap()
	{
		$username=$_SESSION['username'];
		$idnganhtuyendung=$_GET['idnganhtuyendung'];
		$query_1=mysql_query("UPDATE `qlsvdangki` SET `trangthai`='OK' WHERE `username`='$username' AND `idnganhtuyendung`='$idnganhtuyendung'");
		$query_2=mysql_query("DELETE FROM `qlsvdangki`WHERE `username` = '$username' AND `trangthai`='W'");
		$query_3=mysql_query("DELETE FROM `qlsvdangki`WHERE `username` = '$username' AND `trangthai`='Y'");
		
		if($query_1==1&&$query_3==1&&$query_2==1)
		{
			echo "<script>Swal.fire(
  'CHÚC MỪNG',
  'Bạn đã có công ty thực tập!',
  'success'
);setTimeout(function(){
    window.location='yourself.php';
}, 1500)
			</script>";
		}

	}
	
	

}
class congty {
	// INDEX.PHP
	// show các thông tin của công ty
	function thongtincty($sql) {
		$kiemtra = mysql_query("$sql");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {
				$idcongty = $row['id'];
				$tencongty = $row['tencongty'];
				$diachi = $row['diachi'];
				$lienhe = $row['lienhe'];
				$nghecantuyen = $row['nghecantuyen'];

				echo '
				<h3><span style="color: red">' . $tencongty . '</span></h3><br>
                                <p>' . $diachi . '</p><br>
                                <p>' . $lienhe . '</p><br>
			';

			}
		}
	}
	function shownganhcantuyen() {
		$kiemtra = mysql_query("$sql");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {
				$idcongty = $row['id'];

				$nghecantuyen = $row['nghecantuyen'];

				echo '
				<h3><span style="color: red">' . $tencongty . '</span></h3><br>
                                <p>' . $diachi . '</p><br>
                                <p>' . $lienhe . '</p><br>
			';

			}
		}
	}
	function danhsachcacnganhtuyendungtheocongty($sql) {
		$kiemtra = mysql_query("$sql");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {
				$idnganhtuyendung = $row['id'];
				$nghecantuyen = $row['nghecantuyen'];
				$soluong = $row['soluong'];
				$nganhhocyeucau = $row['tennganhdaotao'];

				echo '
				<tr>
                                                    <td>' . $idnganhtuyendung . '</td>
                                                    <td>' . $nghecantuyen . '</td>
                                                    <td>' . $soluong . '</td>
                                                    <td>' . $nganhhocyeucau . '</td>
                                                </tr>
			';

			}
		}
	}
	function nganhhocyeucau($sql) {
		$kiemtra = mysql_query("$sql");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {
				$idnganhhocyeucau = $row['iddt'];
				$tennganhhocyeucau = $row['tennganhdaotao'];
				echo '<option value="' . $idnganhhocyeucau . '">' . $tennganhhocyeucau . '</option>';

			}
		}
	}
	function Themnganhcantuyen($nghecantuyen, $luong, $thoigianlam, $soluong, $ngayhethan, $motacongviec, $idnganhhocyeucau, $idcongty, $username) {

		if (!$nghecantuyen || !$luong || !$thoigianlam || !$soluong || !$ngayhethan || !$motacongviec) {
			echo "<script language='javascript'>alert('Chưa thành công xem lỗi ở dưới');</script>";
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Bạn chưa nhập đủ thông tin</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="fa fa-times"></span>
                                            </button>
                  </div>';
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'><a href='javascript: history.go(-1)'><strong>&#8594; Trở lại thông tin đã nhập tại đây 	&#8592;</strong>
                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span class='fa fa-times'></span>
                                            </button>
                  ";
			exit();
		}
		$kiemtra = mysql_query("select nghecantuyen from congty a join nganhcongtytuyendung b on a.id=b.idcty where nghecantuyen='$nghecantuyen'");
		if (mysql_num_rows($kiemtra) > 0) {
			echo "<script language='javascript'>alert('Chưa thành công xem lỗi ở dưới');</script>";
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Đã tồn tại công việc này</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="fa fa-times"></span>
                                            </button>
                  </div>';
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'><a href='javascript: history.go(-1)'><strong>&#8594; Trở lại thông tin đã nhập tại đây 	&#8592;</strong>
                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span class='fa fa-times'></span>
                                            </button>
                  ";
			exit();
		}

		if ($nghecantuyen && $luong && $thoigianlam && $soluong && $ngayhethan && $motacongviec && $idcongty && $idnganhhocyeucau) {
			$ketqua1 = mysql_query("insert into nganhcongtytuyendung(nghecantuyen, luong, thoigianlam, ngayhethan,motacongviec, soluong,idcty,idnganh)
				values('" . $nghecantuyen . "','" . $luong . "','" . $thoigianlam . "','" . $ngayhethan . "','" . $motacongviec . "','" . $soluong . "','" . $idcongty . "','" . $idnganhhocyeucau . "')");

			if ($ketqua1 > 0) {

				echo "<script language='javascript'>alert('THÊM THÀNH CÔNG');</script>";
				echo "<script>window.location='../index.php'</script>";
			} else {
				echo "<script language='javascript'>alert('THÊM KHÔNG THÀNH CÔNG');</script>";
			}

		} else {echo "<script language='javascript'>alert('THẤT BẠI');</script>";}
	}
	// CÔNG TY
	// update thay doi
	//thongtinchung.php
	// show cong ty
	function xemcongty($sql) {
		$kiemtra = mysql_query("$sql");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {
				$tencongty = $row['tencongty'];
				$idcongty = $row['id'];
				$diachi = $row['diachi'];
				$khuvuc = $row['khuvuc'];
				$hinh = $row['hinh'];
				$chitietcongty = $row['chitietcongty'];
				$lienhe = $row['lienhe'];
				$username = $row['username'];
				echo "<tr>

						<td>" . $tencongty . "</td>
						<td>" . $diachi . "</td>
						<td>" . $khuvuc . "</td>
						<td><img src='../../../layout/img/home/congtythuctap/" . $hinh . "' alt=''></td>
						<td width='300px'>" . $chitietcongty . "</td>
						<td>" . $lienhe . "</td>
						<td>" . $username . "</td>
						<td>" . $idcongty . "</td>
					</tr>";

			}
		}
	}
	function checkbox($check) {
		if (isset($check)) {
			$checklist = array('1' => "<div style='font-weight:bold'>Tên :</div>  <form action='thongtinchung.php' method='post'><input type='text' name='ten' class='w3-input w3-border'><br>",
				'2' => "<div style='font-weight:bold'>Địa chỉ :</div><form action='thongtinchung.php' method='post'> <input type='text' name='diachi'><br>",
				'3' => "<div style='font-weight:bold'>Khu vực :</div><form action='thongtinchung.php' method='post'> <input type='text' name='khuvuc'><br>",
				'4' => "<div style='font-weight:bold'><br>Hình :<br> </div><form action='thongtinchung.php' method='post' enctype='multipart/form-data'><input type='file' name='hinh'><br>",
				'5' => "<div style='font-weight:bold'><br>Chi tiết công ty :</div><form action='thongtinchung.php' method='post'> <textarea name='chitietcongty' id= cols='50%' rows='10'></textarea><br>",
				'6' => "<br><div style='font-weight:bold'>Liên hệ : </div><form action='thongtinchung.php' method='post'><input type='text' name='lienhe'><br>",

			);
			echo "<center><h4 style='margin-top:20px;color:red'>Đổi thông tin</h4></center>";
			foreach ($check as $value) {

				echo $checklist[$value];

			}
			echo '<form action="" method="post"><input type="submit" value="Xác nhận" name="xacnhandoi" class="btn btn-primary"  style="margin-top:20px"></form>
';
		}
	}
	function laydulieusaukhicheckbox($ten, $diachi, $khuvuc, $hinh, $chitietcongty, $lienhe, $usernameold) {
		if (isset($hinh)) {
			$file_type = $_FILES['hinh']['type'];
			if ($file_type != 'image/jpeg') {
				echo "<script language='javascript'>alert('Chưa thành công xem lỗi ở dưới');</script>";
				echo ' <div class="alert alert-danger" role="alert">
					              <strong style="font-weight: bold;"> &#8855; </strong> Chỉ chọn file hình jpg
					  </div>';
				echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'><a href='javascript: history.go(-1)'><strong>&#8594; Trở lại thông tin đã nhập tại đây 	&#8592;</strong>
	                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                                                <span class='fa fa-times'></span>
	                                            </button>
	                  ";

			}

			if (isset($_FILES['hinh'])) {
				$loi = array();
				$file_name = $_FILES['hinh']['name'];
				$file_size = $_FILES['hinh']['size'];
				$file_tmp = $_FILES['hinh']['tmp_name'];
				$file_type = $_FILES['hinh']['type'];
				$file_ext = strtolower(end(explode('.', $_FILES['hinh']['name'])));
				$exp = array("jpg"); // phần này là đặt cái đuôi tệp vào ''
				if (in_array($file_ext, $exp) === false) {

				}

				if ($file_size > 2097152) {
					$loi[] = "<h3>Upload file lớn hơn</h3>";

				}
				if (empty($loi) == true) {
					move_uploaded_file($file_tmp, "../../../layout/img/home/congtythuctap/" . $hinh . "" . $file_name); // giữ nguyên site map này để không bị lỗi

				} else {
					print_r($loi);
				}
			}
			$hinhck = mysql_query("UPDATE `congty` SET `hinh`='$hinh' WHERE `username`='$usernameold'");

		}
		if (isset($ten)) {
			$tenck = mysql_query("UPDATE `congty` SET `tencongty`='$ten' WHERE `username`='$usernameold'");

		}
		if (isset($diachi)) {
			$diachick = mysql_query("UPDATE `congty` SET `diachi`='$diachi' WHERE `username`='$usernameold'");

		}
		if (isset($khuvuc)) {
			$khuvucck = mysql_query("UPDATE `congty` SET `khuvuc`='$khuvuc' WHERE `username`='$usernameold'");

		}

		if (isset($chitietcongty)) {
			$ctctck = mysql_query("UPDATE `congty` SET `chitietcongty`='$chitietcongty' WHERE `username`='$usernameold'");

		}
		if (isset($lienhe)) {
			$lienhe = mysql_query("UPDATE `congty` SET `lienhe`='$lienhe' WHERE `username`='$usernameold'");

		}

	}
	// CÔNG TY
	// update thay doi
	//matkhau.php

	function doimatkhau($username, $password, $matkhaumoi, $nhaplaimkm) // password là mật khẩu cũ
	{

		if (!$password || !$matkhaumoi || !$nhaplaimkm) {
			echo "<script language='javascript'>alert('Chưa thành công xem lỗi ở dưới');</script>";
			echo "<div class='alert alert-danger' >Chưa nhập đủ thông tin</div>";
			exit();
		}
		$kiemtra = mysql_query("select username,password from user where username='$username'");
		$password = md5($password);
		$row = mysql_fetch_array($kiemtra);
		if ($password != $row['password']) {
			echo "<script language='javascript'>alert('Chưa thành công xem lỗi ở dưới');</script>";
			echo "<div class='alert alert-danger' >MẬT KHẨU SAI</div>";
			exit();
		}

		if ($nhaplaimkm != $matkhaumoi) {
			echo "<script language='javascript'>alert('Chưa thành công xem lỗi ở dưới');</script>";
			echo "<script>window.location='#loi'</script>";
			echo "<div class='alert alert-danger'>Mật khẩu không khớp</div>";
			exit();
		}

		if ($username && $password && $matkhaumoi && $nhaplaimkm) {
			$ketqua = mysql_query("UPDATE `user` SET `password`=md5('$matkhaumoi') WHERE `username`='$username'");
			if ($ketqua > 0) {

				echo '<script language="javascript">alert("Thành công")</script>';

			} else {
				echo "<script language='javascript'>alert('Chưa thành công xem lỗi ở dưới');</script>";
				echo "<div class='alert alert-danger' >ĐỔI MẬT KHẨU KHÔNG THÀNH CÔNG</div>";
			}
		}

	}
	// CÔNG TY
	// update thay doi
	//nganhdangtuyendung.php
	// show nganh nghe cong ty dang tuyen
	function shownganhnghecongtydangtuyen($sql) {
		$kiemtra = mysql_query("$sql");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {
				$nghecantuyen = $row['nghecantuyen'];
				$luong = $row['luong'];
				$thoigianlam = $row['thoigianlam'];
				$ngayhethan = $row['ngayhethan'];
				$soluong = $row['soluong'];
				$motacongviec = $row['motacongviec'];
				$tennganhdaotao = $row['tennganhdaotao'];
				$id = $row['id'];
				echo "<tr>
						<td style='color:red;font-weight:bold'><a href='?idcongty=" . $id . "#hashtag'>" . $id . "</a></td>
						<td>" . $nghecantuyen . "</td>
						<td>" . $luong . "</td>
						<td>" . $thoigianlam . "</td>
						<td>" . $ngayhethan . "</td>
						<td>" . $soluong . "</td>
						<td width='300px'>" . $motacongviec . "</td>

						<td>" . $tennganhdaotao . "</td>

					</tr>";

			}
		}
	}

	function shownganhhocyeucau($sql) {
		$kiemtra = mysql_query("$sql");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {

				$id = $row['iddt'];
				$tennganhdaotao = $row['tennganhdaotao'];
				echo "<option value=" . $id . ">" . $tennganhdaotao . "</option>";

			}
		}
	}
	function doithongtinnganhcantuyen($id, $nghecantuyen, $luong, $thoigianlam, $ngayhethan, $soluong, $motacongviec, $idnganhhocyeucau) {
		if (isset($id)) {
			if (isset($nghecantuyen)) {
				$up1 = mysql_query("UPDATE `nganhcongtytuyendung` SET `nghecantuyen`='$nghecantuyen' WHERE `id`='$id'");
			}
			if (isset($luong)) {
				$up2 = mysql_query("UPDATE `nganhcongtytuyendung` SET `luong`='$luong' WHERE `id`='$id'");
			}
			if (isset($thoigianlam)) {
				$up3 = mysql_query("UPDATE `nganhcongtytuyendung` SET `thoigianlam`='$thoigianlam' WHERE `id`='$id'");
			}
			if (isset($ngayhethan)) {
				$up4 = mysql_query("UPDATE `nganhcongtytuyendung` SET `ngayhethan`='$ngayhethan' WHERE `id`='$id'");
			}
			if (isset($soluong)) {
				$up5 = mysql_query("UPDATE `nganhcongtytuyendung` SET `soluong`='$soluong' WHERE `id`='$id'");
			}
			if (isset($motacongviec)) {
				$up6 = mysql_query("UPDATE `nganhcongtytuyendung` SET `motacongviec`='$motacongviec' WHERE `id`='$id'");
			}
			if (isset($idnganhhocyeucau)) {
				$up7 = mysql_query("UPDATE `nganhcongtytuyendung` SET `idnganh`='$idnganhhocyeucau' WHERE `id`='$id'");
			}
			echo "<script>window.location='nganhdangtuyendung.php'</script>";
		} else {
			echo "<script language='javascript'>alert('Không tồn tại username');</script>";
		}
	}
	function shownganhdangtuyendung()
	{	$username=$_SESSION['username'];
		$kiemtra = mysql_query("select a.id,nghecantuyen from nganhcongtytuyendung a join congty b on a.idcty=b.id where username='$username'");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {

				$id = $row['id'];
				$nghecantuyen = $row['nghecantuyen'];
				echo "	
				<tr>

						<td><a href='?idnganh=".$id."' style='color:black'>".$nghecantuyen."</a></td>
						</tr>";

			}
		}
	}
	function danhsachdangki($sql)
	{
		$idnganh=$_GET['idnganh'];
		$username=$_SESSION['username'];

		$kiemtra = mysql_query("$sql
");

		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {
				$idql=$row['idql'];
				$nghecantuyen=$row['nghecantuyen'];
				$tensinhvien=$row['tensv'];
				$trangthai=$row['trangthai'];
				$idsinhvien=$row['idsv'];
				

				echo '<tr>
						<td>'.$idql.'</td>
						<td>'.$nghecantuyen.'</td>
						<td><a style="color:red"  href="?idsinhvien='.$idsinhvien.'" >'.$tensinhvien.'</a></td>
						';
						if ($trangthai==W) {
							echo "<td>Đang chờ xét duyệt</td>
								  <td><center><form action='' method='post'>
									<a class='btn btn-success' href='?idql=".$idql."'>Duyệt</a>
									<a class='btn btn-danger' href='?idql2=".$idql."'>Bỏ qua</a>
								  </form></center></td>
								
							";
						}
						if($trangthai==Y) {
							echo "<td><span style='color:red;font-weight:bold'>Đã duyệt</span></td>
								  <td><center><form action='' method='post'>
									<input type='submit' value='&#10003;' class='btn btn-warning disabled' style='opacity:1' disabled>
									
								  </form></center></td>
								
							";
						}
						if($trangthai==OK) {
							echo "<td><span style='color:red;font-weight:bold'>ĐANG THỰC TẬP</span></td>
								  <td><center><form action='' method='post'>
									<a class='btn btn-warning' href='?idql3=".$idql."'>Đánh giá</a>
									
									
								  </form></center></td>
								
							";

						}
						if($trangthai==F) {
							echo "<td><span style='color:red;font-weight:bold'>Thực tập xong nhưng điểm chưa đủ!</span></td>
								  <td><center><form action='' method='post'>
									
									
									
								  </form></center></td>
								
							";

						}
						if($trangthai==P) {
							echo "<td><span style='color:red;font-weight:bold'>Thực tập xong điểm đã đủ!</span></td>
								  <td><center><form action='' method='post'>
									
									
									
								  </form></center></td>
								
							";

						}
						

				echo 	  '</tr>';

			}
		}

	}
	function showpopup()
	{
		
		$idsinhvien=$_GET['idsinhvien'];
		$kiemtra = mysql_query("select * from sinhvien a join ketquahoctap b on a.idsv=b.idsv where a.idsv='$idsinhvien'");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {
						$tensinhvien=$row['tensv'];
						$diemheso4=$row['diemheso4'];
						$email=$row['email'];
						$hinh=$row['hinh'];
						echo'<tr>
                                                    <td rowspan="4" width="130px" height="150px"><img src="../../layout/img/avt/'.$hinh.'"  alt=""></td>
                                                    <td><span style="font-weight:bold">Họ tên : </span>'.$tensinhvien.'</td>
                                                </tr>
                                                <tr>
                                                    <td><span style="font-weight:bold">Email : </span>'.$email.'</td>
                                                </tr>
                                                <tr>
                                                    <td><span style="font-weight:bold">Điểm tổng hệ số 4 : </span>'.$diemheso4.' </td>
                                                </tr>';

			}
		}
	}
	function showpopupB()
	{
		
		$idsinhvien=$_GET['idsv'];
		$kiemtra = mysql_query("select * from sinhvien a join ketquahoctap b on a.idsv=b.idsv where a.idsv='$idsinhvien'");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {
						$tensinhvien=$row['tensv'];
						$diemheso4=$row['diemheso4'];
						$email=$row['email'];
						$hinh=$row['hinh'];
						echo'<tr>
                                                    <td rowspan="4" width="130px" height="150px"><img src="../../layout/img/avt/'.$hinh.'"  alt=""></td>
                                                    <td><span style="font-weight:bold">Họ tên : </span>'.$tensinhvien.'</td>
                                                </tr>
                                                <tr>
                                                    <td><span style="font-weight:bold">Email : </span>'.$email.'</td>
                                                </tr>
                                                <tr>
                                                    <td><span style="font-weight:bold">Điểm tổng hệ số 4 : </span>'.$diemheso4.' </td>
                                                </tr>';

			}
		}
	}
	function dongythuctap()
	{
		$idql=$_GET['idql'];//username của sinh viên
		$ketqua = mysql_query("UPDATE `qlsvdangki` SET `trangthai`='Y' WHERE `idql`='$idql'");
		if($ketqua==1)
		{
			
			echo "<script language='javascript'>alert('Bạn đã duyệt!');</script>";
			echo "<script>window.location='danhsachdangki.php'</script>";
		}


	}
	function boquathuctap()
	{
		$idql2=$_GET['idql2'];
		$ketqua=mysql_query("DELETE FROM `qlsvdangki` WHERE `qlsvdangki`.`idql` = '$idql2'");
		if ($ketqua==1) {
			echo "<script language='javascript'>alert('Bạn đã bỏ qua thành công');</script>";
			echo "<script>window.location='danhsachdangki.php'</script>";
		}
	}
	function quatrinhthuctap($diem,$nhanxet)
	{
		$idql3=$_GET['idql3'];
		
		$kiemtra = mysql_query("select * from qlsvdangki where idql='$idql3'");
		$i = mysql_num_rows($kiemtra);
		if ($i > 0) {
			while ($row = mysql_fetch_array($kiemtra)) {
					$username=$row['username'];
					$idnganhtuyendung=$row['idnganhtuyendung'];


			}
		}
		$query=mysql_query("INSERT INTO qlsvsauthuctap(idsv,diemthuctap,idqlsv,nhanxet)
			VALUES('".$username."','".$diem."','".$idql3."','".$nhanxet."')");
		
		if($diem<5)
		{
			$query2=mysql_query("UPDATE `qlsvsauthuctap` SET `trangthai`='F' WHERE `idsv`='$username'");
			$query2b=mysql_query("UPDATE `qlsvdangki` SET `trangthai`='F' WHERE `idql`='$idql3'");
		}
		else
		{
			$query3=mysql_query("UPDATE `qlsvsauthuctap` SET `trangthai`='P' WHERE `idsv`='$username'");
			$query3b=mysql_query("UPDATE `qlsvdangki` SET `trangthai`='P' WHERE `idql`='$idql3'");
		}
		if(($query==1&&$query2==1&&$query2b==1)||($query==1&&$query3==1&&$query3b==1))
		{
			echo "<script language='javascript'>alert('Xác nhận thành công');
			window.location='danhsachdangki.php';
			</script>";
		}
		else{echo "Sai";}
	}
	
	/*select *
from congty a
join qlsvdangki e ON a.id = e.idcty
join nganhcongtytuyendung c ON e.idnganhtuyendung = c.id
where e.username='$username'*/
}
?>


<!--UPDATE `phpthuan`.`sinhvien` SET `idsv` = '17029621',
`tensv` = 'Trần Đăng Khoa',
`khoa` = 'Công nghệ Hóa học' WHERE `sinhvien`.`idsv` =170296 LIMIT 1 ;
"DELETE `user`,`congty`  FROM `user`  INNER JOIN `congty` ON `user`.`username`=`congty`.`username`  WHERE `user`.`username` = '$idcongty'"
  -->

