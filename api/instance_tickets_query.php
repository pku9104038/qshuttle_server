<?php


header("content-type;text/html;charset=utf-8");

require('../libs/dbproxy.php');

$device_imei = $_REQUEST['device_imei'];

$db = new DBProxy();
$api = "API";
$apifile = DBProxy::apiname();

$success = "Success";

if($db->open()){

	$instance_tickets = $db->queryInstanceTickets($device_imei);
	$obj = json_decode($instance_tickets);
	$array = Array($api => $apifile, $success => true, DBProxy::API_JSON_SHUTTLE_ARRAY => $obj);
	echo json_encode($array);
}
else{
	
	$array = Array($api => $apifile, $success => false, DBProxy::API_JSON_SHUTTLE_ARRAY => $obj);
	echo json_encode($array);
}

$db->close();


?>

