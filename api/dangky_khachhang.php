<?php
	header("Content-type: application/json");
	require('conect.php');

	if(isset($_POST['TaiKhoanKH']))
	{
		$PK_KHID = time();
		$taiKhoanKH = $_POST['TaiKhoanKH'];
		$matKhauKH = $_POST['MatKhauKH'];
		
		if(strlen($MatKhau)>=6)
		{
			$sql = "INSERT INTO `tbl_KhachHang`(`PK_KHID`,`TaiKhoanKH`, `MatKhauKH`) 
				VALUES ('".$PK_KHID."','".$taiKhoanKH."','".$matKhauKH."')";
			(int)$affected = mysqli_query($conn,$sql);
			if($affected == 1)
			{
				$selectSql = $PK_KHID;
			    $dataResultApi['code'] = 0;
				$dataResultApi['message'] = "Đăng kí thành công";
				$dataResultApi['result'] = $selectSql;
				echo json_encode($dataResultApi);
				exit();
			}
			else
			{
				$dataResultApi['code']=1;
				$dataResultApi['message']="Mời bạn đăng kí tài khoản lại";
				echo json_encode($dataResultApi);
			}
		}
		else
		{
			$dataResultApi['code']=1;
			$dataResultApi['message']="Yêu cầu mật khẩu ít nhất 6 kí tự!";
			echo json_encode($dataResultApi);
		}
	}
	else
	{
		$dataResultApi['code']=1;
		$dataResultApi['message']="Mời bạn đăng kí tài khoản lại";
		echo json_encode($dataResultApi);
	}
?>