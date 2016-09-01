<?php
	header("Content-type: application/json");
	require('conect.php');

	if(isset($_POST['TaiKhoan']))
	{
		$PK_ShipperID = time();
		$TaiKhoan = $_POST['TaiKhoan'];
		$MatKhau = $_POST['MatKhau'];
		if(strlen($MatKhau)>=6)
		{
			$sql = "INSERT INTO `tbl_Shipper`(`PK_ShipperID`,`TaiKhoan`, `MatKhau`) 
				VALUES ('".$PK_ShipperID."','".$TaiKhoan."','".$MatKhau."')";
			(int)$affected = mysqli_query($conn,$sql);
			if($affected == 1)
			{
				$selectSql = $PK_ShipperID;
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