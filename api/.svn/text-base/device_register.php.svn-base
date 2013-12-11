<?php
header("content-type;text/html;charset=utf-8");

require('../libs/dbproxy.php');

$device_imei = $_REQUEST['device_imei'];
$device_brand = $_REQUEST['device_brand'];
$device_model = $_REQUEST['device_model'];
$device_os = $_REQUEST['device_os'];
$device_sim_imsi = $_REQUEST['device_sim_imsi'];
$device_sim_number = $_REQUEST['device_sim_number'];
$device_sim_carrier = $_REQUEST['device_sim_carrier'];

$db = new DBProxy();
$api = "API";
$apifile = DBProxy::apiname();;
$success = "Success";

if($db->open()){
	$result = $db->registDevice($device_imei, $device_brand, $device_model, $device_os, $device_sim_imsi, $device_sim_number, $device_sim_carrier);
}
else{
	echo mysql_error();
	$result = false;
}

$array = Array($api => $apifile, $success => $result);
echo json_encode($array);

$db->close();


?>

