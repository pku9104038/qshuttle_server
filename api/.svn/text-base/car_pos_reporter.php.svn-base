<?php
header("content-type;text/html;charset=utf-8");



$table = car_tracker;

$car_number = $_REQUEST['car_number'];
$car_pos_late6 = $_REQUEST['car_pos_late6'];
$car_pos_longe6 = $_REQUEST['car_pos_longe6'];
$car_pos_provider = $_REQUEST['car_pos_provider'];
$car_pos_stamp = $_REQUEST['car_pos_stamp'];
$car_pos_speede6 = $_REQUEST['car_pos_speede6'];
$car_pos_bearinge6 = $_REQUEST['car_pos_bearinge6'];
$car_pos_accuracy = $_REQUEST['car_pos_accuracy'];

#$car_number = "苏EQK003";
#$car_number = mb_convert_encoding($car_number,'GBK','UTF-8');

# insert new values into table
$sql = "INSERT INTO $table (car_number, car_pos_late6, car_pos_longe6,car_pos_stamp,car_pos_provider,car_pos_speede6,car_pos_bearinge6,car_pos_accuracy) " . 
         "VALUES('$car_number',$car_pos_late6, $car_pos_longe6,'$car_pos_stamp','$car_pos_provider',$car_pos_speede6,$car_pos_bearinge6,$car_pos_accuracy)";



require_once "..\db_conn.php";
mysql_select_db(DB_NAME,$con);

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "Success!";

mysql_close($con)

?>

