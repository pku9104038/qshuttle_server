<?php


header("content-type;text/html;charset=utf-8");


require('../libs/dbproxy.php');

$device_imei = $_REQUEST['device_imei'];
$car_number = $_REQUEST['car_number'];

$car_pos_late6 = $_REQUEST['car_pos_late6'];
$car_pos_longe6 = $_REQUEST['car_pos_longe6'];
$car_pos_provider = $_REQUEST['car_pos_provider'];
$car_pos_stamp = $_REQUEST['car_pos_stamp'];
$car_pos_speede6 = $_REQUEST['car_pos_speede6'];
$car_pos_bearinge6 = $_REQUEST['car_pos_bearinge6'];
$car_pos_accuracy = $_REQUEST['car_pos_accuracy'];

$db = new DBProxy();

$api = "API";
$apifile = DBProxy::apiname();

$success = "Success";
$result = false;

$number = "car_number";

if($db->open()){
	$car_number = $db->queryCarNumber($device_imei);
	$result = $db->insertCarPosition($car_number, $car_pos_late6, $car_pos_longe6, $car_pos_provider, $car_pos_stamp, $car_pos_speede6, $car_pos_bearinge6, $car_pos_accuracy);
}
	
$array = Array($api => $apifile, $success => $result, $number => $car_number);
echo json_encode($array);


$db->close();


?>

