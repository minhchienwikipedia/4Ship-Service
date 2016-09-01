<?php
	header("Content-type: application/json");
	require('conect.php');

	if(isset($_POST['TaiKhoanKH']))
	{
		
		$taiKhoanKH = $_POST['TaiKhoanKH'];
		$matKhauKH = $_POST['MatKhauKH'];
		$sql = "select * from tbl_KhachHang where TaiKhoanKH = '".$taiKhoanKH."' and MatKhauKH = '".$matKhauKH."'";
		$checkLogin = mysqli_query($conn,$sql);
		if(mysqli_num_rows($checkLogin)>0)
		{
			$resultArray = mysqli_fetch_array($checkLogin, MYSQL_ASSOC);
			$dataResultApi['code'] = 0;
			$dataResultApi['message'] = "đăng nhập thành công";
			$dataResultApi['result'] = $resultArray;
			echo json_encode($dataResultApi, JSON_NUMERIC_CHECK);
			exit();
		}
		else
		{
			$dataResultApi['code'] = 1;
			$dataResultApi['message'] = "Tên tài khoản hoặc mật khẩu không đúng!";
			echo json_encode($dataResultApi);
		}
	}
	else
	{
		$dataResultApi['code']=1;
		$dataResultApi['message']="Tài khoản này không tồn tại!";
		echo json_encode($dataResultApi);
	}
?>