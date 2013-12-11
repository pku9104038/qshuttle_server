<?php


header("content-type;text/html;charset=utf-8");


require('../libs/dbproxy.php');

$device_imei = $_REQUEST['device_imei'];
$ticket_serial = $_REQUEST['ticket_serial'];

$ticket_serve_confirm = $_REQUEST['ticket_serve_confirm'];

$db = new DBProxy();

$api = "API";
$apifile = DBProxy::apiname();

$success = "Success";
$result = false;

if($db->open()){
	$result = $db->updateTicketServeConfirm($ticket_serial, $ticket_serve_confirm);
}
	
$array = Array($api => $apifile, $success => $result, "ticket_serial" => $ticket_serial, "pickup" => $ticket_serve_confirm);
echo json_encode($array);


$db->close();


?>

