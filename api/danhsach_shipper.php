<?php
	header("Content-type: application/json");
    require 'conect.php';

	$selectSql_Shipper = "select * from tbl_Shipper";
	$resultObj = mysqli_query($conn,$selectSql_Shipper);
	
	while($rowLop = mysqli_fetch_array($resultObj, MYSQL_ASSOC))
	{
		$listLop[] = $rowLop;
	}

	foreach($listLop as $k=>$v)
	{
		$sqlGetListSv = "select * from tbl_Shipper where PK_ShipperID = '".$v['PK_ShipperID']."'";
		$objSinhvien = mysqli_query($conn,$sqlGetListSv);
		while($rowSv = mysqli_fetch_array($objSinhvien, MYSQL_ASSOC))
		{
			$listSv[] = $rowSv;
		}
		// $listLop[$k]['shipper'] = $listSv;
		$listSv = '';
	}

    $dataResultApi['code']=0;
	$dataResultApi['message']="Thành công";
	$dataResultApi['result'] = $listLop;
	echo json_encode($dataResultApi);
	exit();
		
?>