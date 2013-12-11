<?php
header("content-type;text/html;charset=utf-8");

require('../libs/dbproxy.php');

$device_imei = $_REQUEST['device_imei'];

$db = new DBProxy();
$api = "API";
$apifile = "car_number_query.php";
$success = "Success";
$car_number = "QK";	
$device_serial = 0;

if($db->open()){

	$device_serial = $db->queryDeviceSerial($device_imei);
	$car_number = $db->queryCarNumber($device_imei);
	$driver_name = $db->queryDriverName($device_imei);
	$array = Array($api => $apifile, $success => true, DBProxy::DB_COLUMN_CAR_NUMBER => $car_number,
		DBProxy::DB_COLUMN_DRIVER_NAME => $driver_name, DBProxy::DB_COLUMN_DEVICE_SERIAL=> $device_serial );
	echo json_encode($array);
}
else{
	
	$car_number .= substr($device_imei,strlen($device_imei)-5);

	$array = Array($api => $apifile, $success => false, DB_COLUMN_CAR_NUMBER => $car_number,
		DBProxy::DB_COLUMN_DRIVER_NAME => "群凯司机", DBProxy::DB_COLUMN_DEVICE_SERIAL=> $device_serial);
	echo json_encode($array);
}

$db->close();


?>

