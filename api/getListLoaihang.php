<?php
	header("Content-type: application/json");
    require 'conect.php';
	$sql = "select * from tbl_LoaiHang";
	$rs = mysqli_query($conn,$sql);
	while ($rowLoaiHang = mysqli_fetch_array($rs, MYSQL_ASSOC)) {
		$listLoaiHang[] = $rowLoaiHang;
	}
	$dataResultApi['code']=1;
	$dataResultApi['message']="Thành công";
	$dataResultApi['result'] = $listLoaiHang;
	echo json_encode($dataResultApi);
	
?>