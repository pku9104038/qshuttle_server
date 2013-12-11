<?php
header("content-type;text/html;charset=utf-8");

echo "post test";

#action - q:query; i:insert; u:update; d:delete
$action = $_REQUEST['action'];
echo ",".$action;


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

echo ",".$action;


$car_vin =  $_REQUEST['car_vin'];
$car_number = $_REQUEST['car_number'];

echo ",".$car_vin.",".$car_number;

#$update_time = date("Y-m-d H:i:s ");

#require_once "..\db_conn.php";
#mysql_select_db(DB_NAME,$con);
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$db_selected = mysql_select_db("qshuttle", $con);
if (!$db_selected)
  {
  die ("Can\'t use qshuttle : " . mysql_error());
  }
echo ",".$db_selected;

$table = car_register;
echo ",".$table;


# insert new values into table
if(isset($action) && $action == 'i') {
	$query = "INSERT INTO $table ( car_vin, car_number) " . 
         "VALUES('$car_vin', '$car_number')";

	echo ",".$query;
	
	$result = mysql_query($query,$con)
	or die("Invalid query: " . mysql_error());
	
	echo ",".$result;

}

mysql_close($con);


?>