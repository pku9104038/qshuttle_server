<?php
header("content-type;text/html;charset=utf-8");

$car_number = $_REQUEST['car_number'];
$car_route_start_stamp = $_REQUEST['car_route_start_stamp'];

require_once "..\db_conn.php";
mysql_select_db(DB_NAME,$con);

$table=DB_TABLE_CAR_TRACKER;
$order = DB_COLUMN_CAR_POS_STAMP;
#$query="SELECT * FROM $table WHERE car_number = '$car_number' ORDER BY $order DESC LIMIT 500";
$query="SELECT * FROM $table ORDER BY $order DESC LIMIT 500";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

$i=0;

while ($i < $num) {

//	$car_number=mysql_result($result,$i,DB_COLUMN_CAR_NUMBER);
	$car_late6=mysql_result($result,$i,DB_COLUMN_CAR_POS_LATE6);
	$car_longe6=mysql_result($result,$i,DB_COLUMN_CAR_POS_LONGE6);
	$car_pos_stamp=mysql_result($result,$i,DB_COLUMN_CAR_POS_STAMP);
//	$car_pos_provider=mysql_result($result,$i,DB_COLUMN_CAR_POS_PROVIDER);

	$arr = Array(DB_COLUMN_CAR_POS_LATE6=>$car_late6, DB_COLUMN_CAR_POS_LONGE6=>$car_longe6,DB_COLUMN_CAR_POS_STAMP=>$car_pos_stamp
//	,DB_COLUMN_CAR_POS_PROVIDER=>$car_pos_provider
	);

	$carPos[$i] =  json_encode($arr);
	$carPosObj[$i] = json_decode($carPos[$i]);

	$i++;

}

$array = Array(DB_COLUMN_CAR_NUMBER=>$car_number,API_JSON_CAR_POS_ARRAY=>$carPosObj);
echo json_encode($array);



?>

