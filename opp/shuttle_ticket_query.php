<?php

#header("content-type;text/html;charset=utf-8");

$device_imei = $_REQUEST['device_imei'];

require_once "..\db_conn.php";
mysql_select_db(DB_NAME,$con);

$device_serial = $_GET['device_serial'];

mysqli_query($con, "SET character_set_client = gbk");
mysqli_query($con, "SET character_set_results = gbk");
mysqli_query($con, "SET character_set_connection = gbk");

$table=DB_TABLE_DEVICE_REGISTER;
$order = DB_COLUMN_DEVICE_UPDATE_STAMP;
#$query=" SELECT * FROM $table WHERE device_imei = '$device_imei' ORDER BY $order ASC LIMIT 1 ";
$query=" SELECT * FROM $table WHERE device_serial = $device_serial ORDER BY $order ASC LIMIT 1 ";

#echo $query;

$result=mysql_query($query);

$num=mysql_numrows($result);

#echo " num = ";
#echo $num;

if($num>0){

	$device_serial=mysql_result($result,0,DB_COLUMN_DEVICE_SERIAL);
	$car_number=mysql_result($result,0,DB_COLUMN_CAR_NUMBER);
	
#	file_put_contents("car_number.str",$car_number);		
	
	echo "query: ";
	echo " car_number = ".$car_number;
	echo " hex = ".bin2hex($car_number);

	echo " convert UTF-8 : ";
	$convert = mb_convert_encoding($car_number,"UTF-8");
	echo " car_number = ".$convert;
	echo " hex = ".bin2hex($convert);
	echo "<br>";

	echo " convert GBK : ";
	$convert = mb_convert_encoding($car_number,"GBK");
	echo " car_number = ".$convert;
	echo " hex = ".bin2hex($convert);
	echo "\n";


	echo " convert ISO-8859-1 : ";
	$convert = mb_convert_encoding($car_number,"ISO-8859-1");
	echo " car_number = ".$convert;
	echo " hex = ".bin2hex($convert);
	echo "<br>";

	$table=DB_TABLE_SHUTTLE_INSTANCE;
	$order = DB_COLUMN_INSTANCE_UPDATE_STAMP;
	$query=" SELECT * FROM $table WHERE device_serial = '$device_serial' ORDER BY $order ";
	$result_shuttle=mysql_query($query);
	$num_shuttle=mysql_numrows($result_shuttle);

#	echo $query;
#	echo " num_shuttle = ";
#	echo $num_shuttle;

	
	$i=0;
	while($i<$num_shuttle){
	
		$car_number=mysql_result($result_shuttle,$i,DB_COLUMN_CAR_NUMBER);
		$instance_date=mysql_result($result_shuttle,$i,DB_COLUMN_INSTANCE_DATE);
		$instance_state=mysql_result($result_shuttle,$i,DB_COLUMN_INSTANCE_STATE);
		
		$driver_serial=mysql_result($result_shuttle,$i,DB_COLUMN_DRIVER_SERIAL);
		$line_serial=mysql_result($result_shuttle,$i,DB_COLUMN_LINE_SERIAL);
		$schedule_serial=mysql_result($result_shuttle,$i,DB_COLUMN_SCHEDULE_SERIAL);
		$instance_serial=mysql_result($result_shuttle,$i,DB_COLUMN_INSTANCE_SERIAL);

#		echo " instance_date = ";
#		echo $instance_date;
		
		$table=DB_TABLE_LINE_OPERATION;
		$query=" SELECT * FROM $table WHERE line_serial = '$line_serial' ";
		$result=mysql_query($query);
		$num=mysql_numrows($result);

#		echo $query;
#		echo " num = ";
#		echo $num;


		if($num>0){
		
			$line_description=mysql_result($result,0,DB_COLUMN_LINE_DESCRIPTION);
			$line_start_address=mysql_result($result,0,DB_COLUMN_LINE_START_ADDRESS);
			$line_start_late6=mysql_result($result,0,DB_COLUMN_LINE_START_LATE6);
			$line_start_longe6=mysql_result($result,0,DB_COLUMN_LINE_START_LONGE6);
			$line_stop_address=mysql_result($result,0,DB_COLUMN_LINE_STOP_ADDRESS);
			$line_stop_late6=mysql_result($result,0,DB_COLUMN_LINE_STOP_LATE6);
			$line_stop_longe6=mysql_result($result,0,DB_COLUMN_LINE_STOP_LONGE6);
			
#			echo " description = ";
#			echo $line_description;
			
		}


		$table=DB_TABLE_LINE_SCHEDULE;
		$query=" SELECT * FROM $table WHERE schedule_serial = '$schedule_serial' ";
		$result=mysql_query($query);
		$num=mysql_numrows($result);
		
#		echo $query;
#		echo " num = ";
#		echo $num;


		if($num>0){
			$schedule_departure_time=mysql_result($result,0,DB_COLUMN_SCHEDULE_DEPARTURE_TIME);
			$schedule_arrive_time=mysql_result($result,0,DB_COLUMN_SCHEDULE_ARRIVE_TIME);

#			echo " schedule_departure_time = ";
#			echo $schedule_departure_time;
			
			
		}
		
		
		$table=DB_TABLE_DRIVER_REGISTER;
		$query=" SELECT * FROM $table WHERE driver_serial = '$driver_serial' ";
		$result=mysql_query($query);
		$num=mysql_numrows($result);
		
#		echo $query;
#		echo " num = ";
#		echo $num;

		if($num>0){
			$driver_name=mysql_result($result,0,DB_COLUMN_DRIVER_NAME);
			$driver_cellphone=mysql_result($result,0,DB_COLUMN_DRIVER_CELLPHONE);
			
#			echo " driver_name = ";
#			echo $driver_name;
#			echo " driver_cellphone = ";
#			echo $driver_cellphone;
			
		}

		
		$table=DB_TABLE_TICKET_LIST;
		$order = DB_COLUMN_TICKET_SEAT_NUMBER;
		$query=" SELECT * FROM $table WHERE instance_serial = '$instance_serial' ORDER BY $order ";
		$result=mysql_query($query);
		$num=mysql_numrows($result);
		
#		echo $query;
#		echo " num = "; 
#		echo $num;

		$j=0;
		while($j<$num){
			$ticket_passenger_name=mysql_result($result,$j,DB_COLUMN_TICKET_PASSENGER_NAME);
			$ticket_passenger_phone=mysql_result($result,$j,DB_COLUMN_TICKET_PASSENGER_PHONE);
			$ticket_passenger_address=mysql_result($result,$j,DB_COLUMN_TICKET_PASSENGER_ADDRESS);
			$ticket_passenger_late6=mysql_result($result,$j,DB_COLUMN_TICKET_PASSENGER_LATE6);
			$ticket_passenger_longe6=mysql_result($result,$j,DB_COLUMN_TICKET_PASSENGER_LONGE6);
			
			$array = Array(DB_COLUMN_TICKET_PASSENGER_NAME=>$ticket_passenger_name, DB_COLUMN_TICKET_PASSENGER_PHONE=>$ticket_passenger_phone,DB_COLUMN_TICKET_PASSENGER_ADDRESS=>$ticket_passenger_address,DB_COLUMN_TICKET_PASSENGER_LATE6=>$ticket_passenger_late6,DB_COLUMN_TICKET_PASSENGER_LONGE6=>$ticket_passenger_longe6);			
			
			
			$ticket_decode[$j] =  json_encode($array);
			$ticket_encode[$j] = json_decode($ticket_decode[$j]);

			$j++;
			
#			echo json_encode($array);

		}

		
		
		$array = Array(DB_COLUMN_INSTANCE_DATE=>$instance_date,DB_COLUMN_LINE_DESCRIPTION=>$line_description,DB_COLUMN_LINE_START_ADDRESS=>$line_start_address,DB_COLUMN_LINE_START_LATE6=>$line_start_late6,DB_COLUMN_LINE_START_LONGE6=>$line_start_longe6,DB_COLUMN_LINE_STOP_ADDRESS=>$line_stop_address,DB_COLUMN_LINE_STOP_LATE6=>$line_stop_late6,DB_COLUMN_LINE_STOP_LONGE6=>$line_stop_longe6,DB_COLUMN_SCHEDULE_DEPARTURE_TIME=>$schedule_departure_time,DB_COLUMN_SCHEDULE_ARRIVE_TIME=>schedule_arrive_time,DB_COLUMN_CAR_NUMBER=>$car_number,DB_COLUMN_DRIVER_NAME=>$driver_name,DB_COLUMN_DRIVER_CELLPHONE=>$driver_cellphone,DB_COLUMN_DEVICE_SERIAL=>$device_serial,API_JSON_TICKET_ARRAY=>$ticket_encode);

		$shuttle_decode[$i] = json_encode($array);
		$shuttle_encode[$i] =  json_decode($shuttle_decode[$i]);	

#		echo json_encode($array);
		
		$i++;
			
	}
	
	$array = Array(API_JSON_SHUTTLE_ARRAY=>$shuttle_encode);
	echo json_encode($array);
	file_put_contents("shuttle_ticket_array.json",json_encode($array));
	

}

mysql_close();

?>

