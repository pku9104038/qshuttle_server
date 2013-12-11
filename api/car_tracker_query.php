<?php


header("content-type;text/html;charset=utf-8");

function filename(){ 
	$dir_file = $_SERVER['SCRIPT_NAME']; 
	$filename = basename($dir_file,"php"); 
	return $filename; 
} 

require('../libs/dbproxy.php');

$device_imei = $_REQUEST['device_imei'];

$db = new DBProxy();
$api = "API";
$apifile = DBProxy::apiname();

$success = "Success";

if($db->open()){

	$car_number = $db->queryCarNumber($device_imei);
	$carPos = $db->queryCarRoute($car_number);
	$carPosObj = json_decode($carPos);
	$array = Array($api => $apifile, $success => true, DBProxy::API_JSON_CAR_POS_ARRAY => $carPosObj);
	echo json_encode($array);
}
else{
	
	$array = Array($api => $apifile, $success => false, DBProxy::API_JSON_CAR_POS_ARRAY => $carPosObj);
	echo json_encode($array);
}

#file_put_contents("car_tracker.json",json_encode($array));

$db->close();


?>

