<?php
header("content-type;text/html;charset=utf-8");
$mysql_server_name='127.0.0.1';
$mysql_username='root';
$mysql_password='root';
$mysql_database='qshuttle';
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);//,$mysql_database);
$sql='select d.car_number from device_register d where d.device_serial=20';
mysql_query("set names 'UTF8'");
mysql_select_db($mysql_database,$conn);
//mysql_query($sql);
//$test = oci_parse($conn, $sql);
//oci_execute($test);
/*
$result = mysql_query($sql);
if ($result){
	$row = mysql_fetch_array($result);
            $region=$row[0];
#			print_r($region);
			echo $region;
        }
*/

$result=mysql_query($query);

$num=mysql_numrows($result);

#echo " num = ";
#echo $num;

if($num>0){

	$device_serial=mysql_result($result,0,DB_COLUMN_DEVICE_SERIAL);
	$car_number=mysql_result($result,0,DB_COLUMN_CAR_NUMBER);

	echo " car_number = ";
	echo $car_number;
	echo bin2hex($car_number);
	}
mysql_close($conn);
?>