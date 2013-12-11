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
$car_brand = $_REQUEST['car_brand'];
$car_model = $_REQUEST['car_model'];
$car_color = $_REQUEST['car_color'];
$car_lisence = $_REQUEST['car_lisence'];
$car_owner = $_REQUEST['car_owner'];

$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("qshuttle", $con);

$table = car_register;

# insert new values into table
if(isset($action) && $action == 'i') {
	$query = "INSERT INTO $table ( car_number, car_brand, car_model, car_color, car_lisence,car_owner) " . 
         "VALUES('$car_number', '$car_brand', '$car_model', '$car_color', '$car_lisence', '$car_owner')";

	echo $query;
	echo "<br/>";
   	$result = mysql_query($query)
	or die("Invalid query: " . mysql_error());

}

mysql_close($con);


?>