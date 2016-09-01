<?php
	header("Content-type: application/json");
	require('conect.php');

	if(isset($_POST['TaiKhoanKH']))
	{
		$TaiKhoanKH = $_POST['TaiKhoanKH'];
		$tenKH = $_POST['tenKH'];
		$SdtKH = $_POST['SdtKH'];
		$MatKhauKH = $_POST['MatKhauKH'];
		$LATKH = $_POST['LATKH'];
		$LONKH = $_POST['LONKH'];
		$AnhKH = $_POST['AnhKH'];
		$Gcm_ID = $_POST['Gcm_ID'];
		$DiaChiKH = $_POST['DiaChiKH'];
		$sqlcheckSdt = "select * from tbl_KhachHang where SdtKH = '".$SdtKH."'";
		$checkSdt = mysqli_query($conn,$sqlcheckSdt);
		if(mysqli_num_rows($checkSdt)<0)
		{
			$sql = "UPDATE `tbl_KhachHang` SET tenKH='".$tenKH."', SdtKH='".$SdtKH."', MatKhauKH = '".$MatKhauKH."' , LATKH = '".$LATKH."' , LONKH = '".$LONKH."' , AnhKH = '".$AnhKH."' , Gcm_ID = '".$Gcm_ID."' , DiaChiKH = '".$DiaChiKH."' 
			where TaiKhoanKH = '".$TaiKhoanKH."' ";
			(int)$affected = mysqli_query($conn,$sql);
			//echo $affected;
			//exit();
			if($affected == 1)
			{
				$selectSql = "select * from tbl_KhachHang where TaiKhoanKH = '".$TaiKhoanKH."'";
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