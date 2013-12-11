<?php
header("content-type;text/html;charset=utf-8");

//echo json_encode(Array("Success"=>true,DB_COLUMN_CAR_NUMBER=>'鑻�23456'));
	
require_once "..\db_conn.php";
mysql_select_db(DB_NAME,$con);

$table = device_register;

$device_imei = $_REQUEST['device_imei'];
#$device_wifi_mac = $_REQUEST['device_wifi_mac'];
$device_brand = $_REQUEST['device_brand'];
$device_model = $_REQUEST['device_model'];
$device_os = $_REQUEST['device_os'];

$device_sim_imsi = $_REQUEST['device_sim_imsi'];
#$device_sim_carrier = $_REQUEST['device_sim_carrier'];
#$device_sim_number = $_REQUEST['device_sim_number'];


$query = "SELECT * FROM $table WHERE device_imei = '$device_imei' LIMIT 1";

$result = mysql_query($query);
//echo 'result='.$result;

$num = mysql_numrows($result);
//echo 'num='.$num;

if($num==0)
{
	$car_number = '苏'.substr($device_imei,strlen($device_imei)-6);
	
//echo 'car_number='.$car_number;


	$sql = "INSERT INTO  $table (car_number,device_imei,device_brand,device_model,device_os,device_sim_imsi)VALUES('$car_number','$device_imei','$device_brand','$device_model','$device_os','$device_sim_imsi')";

	
	
	if (!mysql_query($sql,$con))
  	{
  		die(json_encode(Array('Success'=>false,'Error'=>mysql_error())));
  	}
	else{
	
		$array = Array("Success"=>true,DB_COLUMN_CAR_NUMBER=>$car_number);
		echo json_encode($array);
	}


}

else

{
	$car_number=mysql_result($result,0,DB_COLUMN_CAR_NUMBER);
	$array = Array("Success"=>true,DB_COLUMN_CAR_NUMBER=>$car_number);
	echo json_encode($array);
}

mysql_close($con)


?>

