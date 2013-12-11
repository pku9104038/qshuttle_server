<?php
header("content-type;text/html;charset=utf-8");


require_once "db_conn.php";
mysql_select_db(DB_NAME,$con);

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

$car_vin =  $_REQUEST['car_vin'];
$car_number = $_REQUEST['car_number'];

mysql_select_db(DB_NAME, $con);

$table = car_register;

# insert new values into table
if(isset($action) && $action == 'i') {
	$query = "INSERT INTO $table ( car_vin, car_number) " . 
         "VALUES('$car_vin', '$car_number')";

	echo $query;
	echo "<br/>";
   	$result = mysql_query($query)
	or die("Invalid query: " . mysql_error());
	echo $result;

}

mysql_close($con);


?>