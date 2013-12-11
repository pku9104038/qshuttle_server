<?php
#header("content-type;text/html;charset=utf-8");

$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("qshuttle", $con);

$table = device_register;

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


$device_imei = $_REQUEST['device_imei'];
$car_number = $_REQUEST['car_number'];

/*
$device_brand = $_REQUEST['device_brand'];
$device_model = $_REQUEST['device_model'];
$device_state = $_REQUEST['device_state'];
$device_registdate = $_REQUEST['device_registdate'];
$device_updatedate = $_REQUEST['device_updatedate'];
*/

# insert new values into table
if(isset($action) && $action == 'i') {
/*
	$query = "INSERT INTO $table ( device_id, device_brand, device_model, device_state, device_registdate,device_updatedate) " . 
         "VALUES('$device_id', '$device_brand', '$device_model', '$device_state', '$device_registdate', '$device_updatedate')";
*/
	$query = "INSERT INTO $table ( device_imei, car_number) " . 
         "VALUES('$device_imei', '$car_number')";

	echo $query;
	file_put_contents("query.str",$query);			 	
   	
	$result = mysql_query($query)
	or die("Invalid query: " . mysql_error());

}

mysql_close($con);


?>