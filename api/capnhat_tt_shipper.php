<?php
	header("Content-type: application/json");
	require('conect.php');

	if(isset($_POST['TaiKhoan']))
	{
		$TaiKhoan = $_POST['TaiKhoan'];
		$TenShipper = $_POST['TenShipper'];
		$DiaChi = $_POST['DiaChi'];
		$MatKhau = $_POST['MatKhau'];
		$LAT = $_POST['LAT'];
		$LON = $_POST['LON'];
		$AnhShipper = $_POST['AnhShipper'];
		$Gcm_ID = $_POST['Gcm_ID'];
		$DanhGia = $_POST['DanhGia'];
		$SDT = $_POST['SDT'];
		
		$sqlcheckSdt = "select * from tbl_Shipper where SDT = '".$SDT."'";
		$checkSdt = mysqli_query($conn,$sqlcheckSdt);
		if(mysqli_num_rows($checkSdt)<0)
		{
			$sql = "UPDATE `tbl_Shipper` SET TenShipper='".$TenShipper."', DiaChi='".$DiaChi."', MatKhau = '".$MatKhau."' , LAT = '".$LAT."' , LON = '".$LON."' , AnhShipper = '".$AnhShipper."' , Gcm_ID = '".$Gcm_ID."', DanhGia = '".$DanhGia."' , SDT = '".$SDT."' 
			where TaiKhoan = '".$TaiKhoan."' ";
			(int)$affected = mysqli_query($conn,$sql);
			//echo $affected;
			//exit();
			if($affected == 1)
			{
				$selectSql = "select * from tbl_Shipper where TaiKhoan = '".$TaiKhoan."'";
				$resultObj = mysqli_query($conn,$selectSql);
			    $resultArray = mysqli_fetch_array($resultObj, MYSQL_ASSOC);//mysqli_fetch_array chuyển object sang mảng từ trả về từ câu lệnh select khi chạy mysql_query
				$dataResultApi['code'] = 0;
				$dataResultApi['message'] = "Sửa thành công";
				$dataResultApi['result'] = $resultArray;
				echo json_encode($dataResultApi, JSON_NUMERIC_CHECK);
				exit();
			}
			else 
			{
			    $dataResultApi['code']=1;
				$dataResultApi['message']="Có lỗi xảy ra, mời bạn nhập lại thông tin!";
				echo json_encode($dataResultApi);
			}
		}
		else 
		{
		    $dataResultApi['code']=1;
			$dataResultApi['message']="Số điện thoại này đã được sử dụng!";
			echo json_encode($dataResultApi);
		}

	}
	else
	{
		$dataResultApi['code']=1;
		$dataResultApi['message']="Có lỗi xảy ra";
		echo json_encode($dataResultApi);
	}
?>