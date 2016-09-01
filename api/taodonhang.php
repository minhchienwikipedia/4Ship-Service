<?php
	header("Content-type: application/json");
    require 'conect.php';

	if(isset($_POST['TenHang']))//kiểm tra xem có param post key là username được truyền lên không?
	{//nếu có pram truyền lên
		$PK_GoiHangID = time();
		$TenHang = $_POST['TenHang'];
		$NoiGui = $_POST['NoiGui'];
		$NoiNhan = $_POST['NoiNhan'];
		$SdtNguoiNhan = $_POST['SdtNguoiNhan'];
		$GhiChu = $_POST['GhiChu'];
		$tg_Nhan = $_POST['tg_Nhan'];
		$tg_Tao = $_POST['tg_Tao'];
		$tg_ShipNhan = $_POST['tg_ShipNhan'];
		$tg_NhanDuKien = $_POST['tg_NhanDuKien'];
		$CanNang = $_POST['CanNang'];
		$KichThuoc = $_POST['KichThuoc'];
		$KhangCach = $_POST['KhangCach'];
		$Gia = $_POST['Gia'];
		$TrangThai = $_POST['TrangThai'];
		$LAT_Gui = $_POST['LAT_Gui'];
		$LON_Gui = $_POST['LON_Gui'];
		$LAT_Nhan = $_POST['LAT_Nhan'];
		$LON_Nhan = $_POST['LON_Nhan'];
		$FK_KHID = $_POST['FK_KHID'];
		$FK_LoaiHangID = $_POST['FK_LoaiHangID'];
		$FK_HinhThucID = $_POST['FK_HinhThucID'];
		if($TenHang == null || $NoiGui == null  || $NoiNhan == null  || $SdtNguoiNhan == null  || $GhiChu == null  || $tg_Nhan == null  || $tg_Tao == null  || $tg_ShipNhan == null  || $tg_NhanDuKien == null  || $CanNang == null  || $KichThuoc == null  || $KhangCach == null  || $Gia == null  || $TrangThai == null  || $LAT_Gui == null  || $LON_Gui == null  || $LAT_Nhan == null  || $LON_Nhan == null  || $FK_KHID == null  || $FK_LoaiHangID == null  || $FK_HinhThucID == null )
		{

			$dataResultApi['code'] = 1;
			$dataResultApi['message'] = "Bạn cần nhập đầy đủ thông tin!";
			echo json_encode($dataResultApi);
			
		}
		else
		{
			$sql = "INSERT INTO `tbl_GoiHang` (`PK_GoiHangID` ,`FK_LoaiHangID` ,`TenHang` ,`NoiGui` ,`LAT_Gui` ,`LON_Gui` ,`NoiNhan` ,`LAT_Nhan` ,`LON_Nhan` ,`FK_KHID` ,`SdtNguoiNhan` ,`GhiChu` ,`tg_Nhan` ,`tg_Tao` ,`tg_ShipNhan` ,`tg_NhanDuKien` ,`CanNang` ,`KichThuoc` ,`KhoangCach` ,`Gia` ,`TrangThai` ,`FK_HinhThucID` ,`HienMap`)
					VALUES ('".$PK_GoiHangID."','".$FK_LoaiHangID."','".$TenHang."','".$NoiGui."','".$LAT_Gui."','".$LON_Gui."','".$NoiNhan."','".$LAT_Nhan."','".$LON_Nhan."','".$FK_KHID."','".$SdtNguoiNhan."','".$GhiChu."','".$tg_Nhan."','".$tg_Tao."','".$tg_ShipNhan."','".$tg_NhanDuKien."','".$CanNang."','".$KichThuoc."','".$KhangCach."','".$Gia."','".$TrangThai."','".$FK_HinhThucID."','".$HienMap."')";
			(int)$affected = mysqli_query($conn,$sql);// câu lệnh sql tác động đến database insert, update, delete kết quả trả về là số bản ghi bị tác động
			
			if ($affected == 1) //chỗ này là sao
			{
				$selectSql = "select * from tbl_GoiHang where PK_GoiHangID = '".$PK_GoiHangID."'";
				$resultObj = mysqli_query($conn,$selectSql);
			    $resultArray = mysqli_fetch_array($resultObj, MYSQL_ASSOC);//mysqli_fetch_array chuyển object sang mảng từ trả về từ câu lệnh select khi chạy mysql_query
				$dataResultApi['code'] = 0;
				$dataResultApi['message'] = "Tạo thành công";
				$dataResultApi['result'] = $resultArray;
				echo json_encode($dataResultApi);
				exit();
			} 
			else 
			{
			 //    $dataResultApi['code'] = 1;
				// $dataResultApi['message'] = "Có lỗi xảy ra! 1";
				// echo json_encode($dataResultApi);

			    echo "Lỗi: " . $sql . "<br>" . $conn->error;
			}
		}
		
	}
	else
	{//nếu ko có
		$dataResultApi['code'] = 1;
		$dataResultApi['message'] = "Có lỗi xảy ra!";
		echo json_encode($dataResultApi);
	}
	
?>

