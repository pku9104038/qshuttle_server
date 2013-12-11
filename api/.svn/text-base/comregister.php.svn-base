<?php
header("content-type;text/html;charset=utf-8");

$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("qshuttle", $con);

$table = com_register;

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


$com_number = $_REQUEST['com_number'];
$com_carrier = $_REQUEST['com_carrier'];
$com_cardsn = $_REQUEST['com_cardsn'];
$com_state = $_REQUEST['com_state'];
$com_registdate = $_REQUEST['com_registdate'];
$com_updatedate = $_REQUEST['com_updatedate'];


# insert new values into table
if(isset($action) && $action == 'i') {
	$query = "INSERT INTO $table ( com_number, com_carrier, com_cardsn, com_state, com_registdate,com_updatedate) " . 
         "VALUES('$com_number', '$com_carrier', '$com_cardsn', '$com_state', '$com_registdate', '$com_updatedate')";

	echo $query;
	
   	$result = mysql_query($query)
	or die("Invalid query: " . mysql_error());

}

mysql_close($con);


?>