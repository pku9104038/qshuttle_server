<?php
header("content-type;text/html;charset=utf-8");


#action - q:query; i:insert; u:update; d:delete
$action = $_REQUEST['action'];
if ($_POST['action'] == 'query') { 
    $action = 'q';
} else if ($_POST['action'] == 'insert') { 
    $action = 'i'; 
} else if ($_POST['action'] == 'update') {
    $action = 'u';
} else if ($_POST['action'] == 'delete') {
    $action = 'd';
} else { 
    //invalid action! 
} 

# default action - query
if(!isset($action) || $action == '') {
   $action = 'q';
}


$car_number = $_REQUEST['car_number'];
$com_number = $_REQUEST['com_number'];
$device_id = $_REQUEST['device_id'];
$driver_id = $_REQUEST['driver_id'];
$shuttle_state = $_REQUEST['shuttle_state'];
$shuttle_seats = $_REQUEST['shuttle_seats'];

$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("qshuttle", $con);

$table = shuttle_config;

# insert new values into table
if(isset($action) && $action == 'i') {
	$query = "INSERT INTO $table ( car_number, com_number, device_id, driver_id, shuttle_state,shuttle_seats) " . 
         "VALUES('$car_number', '$com_number', '$device_id', '$driver_id', '$shuttle_state', $shuttle_seats)";

	echo $query;
   	$result = mysql_query($query)
	or die("Invalid query: " . mysql_error());

}

mysql_close($con);


?>