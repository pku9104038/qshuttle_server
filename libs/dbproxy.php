<?php

/******************************************************
 * Database Proxy
 * Author: 
 * Version: 
 * Web: 
 *
 *
 ******************************************************/

class DBProxy{

/*******************************************************
 * constant data
 *******************************************************/
	
	const DB_HOST = "localhost";
	
	const DB_USER = "qshuttleusr";
	const DB_PWD = "qshuttleusr";
	
	const DB_CHARSET = "utf8";
	
	const DB_NAME = "qshuttle";

	//car_tracker
 	const DB_TABLE_CAR_TRACKER = "car_tracker";
 
	const DB_COLUMN_CAR_NUMBER = "car_number";
	const DB_COLUMN_CAR_POS_STAMP = "car_pos_stamp";
	const DB_COLUMN_CAR_POS_LATE6 = "car_pos_late6";
	const DB_COLUMN_CAR_POS_LONGE6 = "car_pos_longe6";
	const DB_COLUMN_CAR_POS_SPEEDE6 = "car_pos_speede6";
	const DB_COLUMN_CAR_POS_BEARINGE6 = "car_pos_bearinge6";
	const DB_COLUMN_CAR_POS_ACCURACY = "car_pos_accuracy";
	const DB_COLUMN_CAR_POS_PROVIDER = "car_pos_provider";
	
	const API_JSON_CAR_POS_ARRAY = "car_pos_array";

	//device_register
	const DB_TABLE_DEVICE_REGISTER = "device_register";
	const DB_COLUMN_DEVICE_SERIAL = "device_serial";
	const DB_COLUMN_DEVICE_IMEI = "device_imei";
	const DB_COLUMN_DEVICE_SIM_IMSI = "device_sim_imsi";
	const DB_COLUMN_DEVICE_BRAND = "device_brand";
	const DB_COLUMN_DEVICE_MODEL = "device_model";
	const DB_COLUMN_DEVICE_OS = "device_os";
	const DB_COLUMN_DEVICE_SIM_NUMBER = "device_sim_number";
	const DB_COLUMN_DEVICE_SIM_CARRIER = "device_sim_carrier";
	const DB_COLUMN_DEVICE_UPDATE_STAMP = "device_update_stamp";
	

	//driver_register
	const DB_TABLE_DRIVER_REGISTER = "driver_register";
	const DB_COLUMN_DRIVER_SERIAL = "driver_serial";
	const DB_COLUMN_DRIVER_NAME = "driver_name";
//define('DB_COLUMN_DRIVER_CELLPHONE', 'driver_cellphone');


	//line_operation
	const DB_TABLE_LINE_OPERATION = "line_operation";
	const DB_COLUMN_LINE_SERIAL = "line_serial";
	const DB_COLUMN_LINE_DESCRIPTION = "line_description";
	const DB_COLUMN_LINE_START_ADDRESS = "line_start_address";
	const DB_COLUMN_LINE_START_LATE6 = "line_start_late6";
	const DB_COLUMN_LINE_START_LONGE6 = "line_start_longe6";
	const DB_COLUMN_LINE_TERMINAL_ADDRESS = "line_terminal_address";
	const DB_COLUMN_LINE_TERMINAL_LATE6 = "line_terminal_late6";
	const DB_COLUMN_LINE_TERMINAL_LONGE6 = "line_terminal_longe6";
	const DB_COLUMN_LINE_OPERATION_TYPE = "line_operation_type";
	
	//line_schedule
	const DB_TABLE_LINE_SCHEDULE = "line_schedule";
	const DB_COLUMN_SCHEDULE_SERIAL = "schedule_serial";
	const DB_COLUMN_SCHEDULE_DEPARTURE_TIME = "schedule_departure_time";
	const DB_COLUMN_SCHEDULE_ARRIVE_TIME = "schedule_arrive_time";

	//shuttle_instance
	const DB_TABLE_SHUTTLE_INSTANCE = "shuttle_instance";
	const DB_COLUMN_INSTANCE_SERIAL = "instance_serial";
//	const DB_COLUMN_INSTANCE_STATE = "instance_state";
	const DB_COLUMN_INSTANCE_DATE = "instance_date";
//define('DB_COLUMN_INSTANCE_UPDATE_STAMP', 'instance_update_stamp');

	//tickat_list
	const DB_TABLE_TICKET_LIST = "ticket_list";
	const DB_COLUMN_TICKET_SERIAL = "ticket_serial";
	const DB_COLUMN_TICKET_SEAT_NUMBER = "ticket_seat_number";
	const DB_COLUMN_TICKET_PASSENGER_NAME = "ticket_passenger_name";
	const DB_COLUMN_TICKET_PASSENGER_PHONE = "ticket_passenger_phone";
	const DB_COLUMN_TICKET_PASSENGER_ADDRESS = "ticket_passenger_address";
	const DB_COLUMN_TICKET_PASSENGER_LATE6 = "ticket_passenger_late6";
	const DB_COLUMN_TICKET_PASSENGER_LONGE6 = "ticket_passenger_longe6";
	const DB_COLUMN_TICKET_SERVE_CONFIRM = "ticket_serve_confirm";
	const DB_COLUMN_TICKET_PRICE = "ticket_price";
	const DB_COLUMN_TICKET_STATUS = "ticket_status";
	
	const DB_VALUE_TICKET_STATUS_SOLD = "售出";
	
	//order_list
	const DB_TABLE_ORDER_LIST = "order_list";
	const DB_COLUMN_ORDER_SERIAL = "order_serial";


	const API_JSON_TICKET_ARRAY = "ticket_array";
	const API_JSON_SHUTTLE_ARRAY = "shuttle_array";
	
/*******************************************************
 * private data
 *******************************************************/    
    private $con = NULL;
    
    private $line_serial = 0;
    private $line_description = NULL;
    private $line_start_address = NULL;
    private $line_start_late6 = 0;
    private $line_start_longe6 = 0;
    private $line_terminal_address = NULL;
    private $line_terminal_late6 = 0;
    private $line_terminal_longe6 = 0;
    private $line_operation_type = NULL;
    
    private $schedule_departure_time = NULL;
    private $schedule_arrive_time = NULL;
    



//----------------------
//----------------------

    public static function apiname(){ 
		$dir_file = $_SERVER['SCRIPT_NAME']; 
		$filename = basename($dir_file,".php"); 
		return $filename; 
	} 
	public function connect($host = self::DB_HOST, $user = self::DB_USER, $pwd = self::DB_PWD){
		
		$this->con = mysql_connect($host,$user,$pwd);
		if($this->con != false){
			$result = mysql_set_charset(self::DB_CHARSET, $this->con);
//			echo "DB connected ".$this->con."<br/>";
//			return true;
		}
		else{
//			echo "DB not connected";
//			return false;
		}
		return $result;
		
	}
	
	public function select($db_name = self::DB_NAME){
		
		$result = mysql_select_db($db_name,$this->con);
		if($result){
//			echo "table selected!".$db_name."<br/>";
		}
		else{
//			echo "table not selected ".$db_name."<br/>";
		}
		return $result;
		
	}

	public function open(){
		if($this->connect()){
			return $this->select();
		}
		else{
			return false;
		}
	}
	
	public function close(){
		mysql_close($this->con);
	}
	
	
	public function queryCarNumber($device_imei){
		
		$table = self::DB_TABLE_DEVICE_REGISTER;
		$order = self::DB_COLUMN_DEVICE_UPDATE_STAMP;
		$where = self::DB_COLUMN_DEVICE_IMEI." = '$device_imei'";
		$query = "SELECT * FROM $table WHERE $where ORDER BY $order DESC LIMIT 1";
		$result = mysql_query($query,$this->con);
		$num = mysql_numrows($result);
		
		$car_number = "QK";
	
		if($num > 0){
			$car_number = mysql_result($result,0,self::DB_COLUMN_CAR_NUMBER);
		}
		else {
			$car_number .= substr($device_imei,strlen($device_imei)-5);

			date_default_timezone_set('Asia/Shanghai'); //系统时间差8小时问题
			$device_update_stamp =  date("Y-m-d H:i:s");
			$table = self::DB_TABLE_DEVICE_REGISTER;
			$query = "INSERT INTO $table (car_number, device_imei, device_update_stamp) " . 
    		     "VALUES('$car_number', '$device_imei', '$device_update_stamp')";
			mysql_query($query,$this->con);
					
		}
		
		return $car_number;

	}

	public function queryDeviceSerial($device_imei){
		
		$table = self::DB_TABLE_DEVICE_REGISTER;
		$order = self::DB_COLUMN_DEVICE_UPDATE_STAMP;
		$where = self::DB_COLUMN_DEVICE_IMEI." = '$device_imei'";
		$query = "SELECT * FROM $table WHERE $where ORDER BY $order DESC LIMIT 1";
		$result = mysql_query($query,$this->con);
		$num = mysql_numrows($result);
		
		if($num > 0){
			$device_serial = mysql_result($result,0,self::DB_COLUMN_DEVICE_SERIAL);
		}
		else {
			$device_serial = 0;
		}
		
		return $device_serial;

	}
	
	public function queryDriverSerial($device_serial){
		
		$table = self::DB_TABLE_DEVICE_REGISTER;
		$where = self::DB_COLUMN_DEVICE_SERIAL." = '$device_serial'";
		$query = "SELECT * FROM $table WHERE $where";
		$result = mysql_query($query,$this->con);
		$num = mysql_numrows($result);
		
		if($num > 0){
			$driver_serial = mysql_result($result,0,self::DB_COLUMN_DRIVER_SERIAL);
		}
		
		return $driver_serial;

	}
	
	
	

	public function queryDriverName($device_imei){

		$device_serial = $this->queryDeviceSerial($device_imei);
		$driver_serial = $this->queryDriverSerial($device_serial);
		
		$table = self::DB_TABLE_DRIVER_REGISTER;
		$where = self::DB_COLUMN_DRIVER_SERIAL." = '$driver_serial'";
		$query = "SELECT * FROM $table WHERE $where";
		$result = mysql_query($query,$this->con);
		$num = mysql_numrows($result);
		
		if($num > 0){
			$driver_name = mysql_result($result,0,self::DB_COLUMN_DRIVER_NAME);
		}
		
		return $driver_name;

	}
	
	public function queryDriverNameBySerial($driver_serial){

		$table = self::DB_TABLE_DRIVER_REGISTER;
		$where = self::DB_COLUMN_DRIVER_SERIAL." = '$driver_serial'";
		$query = "SELECT * FROM $table WHERE $where";
		$result = mysql_query($query,$this->con);
		$num = mysql_numrows($result);
		
		if($num > 0){
			$driver_name = mysql_result($result,0,self::DB_COLUMN_DRIVER_NAME);
		}
		
		return $driver_name;

	}
	
	public function queryLineInformation($line_serial){
		
		$table = self::DB_TABLE_LINE_OPERATION;
		$where = self::DB_COLUMN_LINE_SERIAL." = '$line_serial'";
		$query = "SELECT * FROM $table WHERE $where";
		$result = mysql_query($query,$this->con);
		$num = mysql_numrows($result);
		
		if($num > 0){
			$this->line_description = mysql_result($result,0,self::DB_COLUMN_LINE_DESCRIPTION);
			$this->line_operation_type = mysql_result($result, 0, self::DB_COLUMN_LINE_OPERATION_TYPE);
			$this->line_start_address = mysql_result($result, 0, self::DB_COLUMN_LINE_START_ADDRESS);
			$this->line_start_late6 = mysql_result($result, 0, self::DB_COLUMN_LINE_START_LATE6);
			$this->line_start_longe6 = mysql_result($result, 0, self::DB_COLUMN_LINE_START_LONGE6);
			$this->line_terminal_address = mysql_result($result, 0, self::DB_COLUMN_LINE_TERMINAL_ADDRESS);
			$this->line_terminal_late6 = mysql_result($result, 0, self::DB_COLUMN_LINE_TERMINAL_LATE6);
			$this->line_terminal_longe6 = mysql_result($result, 0, self::DB_COLUMN_LINE_TERMINAL_LONGE6);
			return true;
		}
		else{
			return false;
		}

	}

	public function queryScheduleTime($schedule_serial){
		
		$table = self::DB_TABLE_LINE_SCHEDULE;
		$where = self::DB_COLUMN_SCHEDULE_SERIAL." = '$schedule_serial'";
		$query = "SELECT * FROM $table WHERE $where";
		$result = mysql_query($query,$this->con);
		$num = mysql_numrows($result);
		
		if($num > 0){
			$this->schedule_departure_time = mysql_result($result,0,self::DB_COLUMN_SCHEDULE_DEPARTURE_TIME);
			$this->schedule_arrive_time = mysql_result($result, 0, self::DB_COLUMN_SCHEDULE_ARRIVE_TIME);
			return true;
		}
		else{
			return false;
		}

	}
	
	public function insertCarPosition($car_number, $car_pos_late6, $car_pos_longe6, $car_pos_provider, 
		$car_pos_stamp, $car_pos_speede6, $car_pos_bearinge6, $car_pos_accuracy){

		date_default_timezone_set('Asia/Shanghai'); //系统时间差8小时问题
		$car_reporter_stamp =  date("Y-m-d H:i:s");
			
			
		$table = self::DB_TABLE_CAR_TRACKER;
#		$car_number = $this->queryCarNumber($device_imei);
#		echo $car_number;
#		$order = self::DB_COLUMN_DEVICE_UPDATE_STAMP;
#		$where = self::DB_COLUMN_DEVICE_IMEI." = '$device_imei'";
#		$query = "SELECT * FROM $table WHERE $where ORDER BY $order DESC LIMIT 1";
		$query = "INSERT INTO $table (car_number, car_pos_late6, car_pos_longe6, car_pos_stamp, car_pos_provider,
			car_pos_speede6, car_pos_bearinge6, car_pos_accuracy, car_reporter_stamp) " . 
         "VALUES('$car_number', $car_pos_late6, $car_pos_longe6, '$car_pos_stamp', '$car_pos_provider',
			$car_pos_speede6, $car_pos_bearinge6, $car_pos_accuracy, '$car_reporter_stamp')";
		
		$result = mysql_query($query,$this->con);

		return $result;

	}
	
	public function queryCarRoute($car_number){
		
#		$car_number = $this->queryCarNumber($device_imei);
		
		$table = self::DB_TABLE_CAR_TRACKER;
		$order = self::DB_COLUMN_CAR_POS_STAMP;
		$where = self::DB_COLUMN_CAR_NUMBER." = '$car_number'";
		$query = "SELECT * FROM $table WHERE $where ORDER BY $order DESC LIMIT 500";
#		$query = "SELECT * FROM $table ORDER BY $order DESC LIMIT 500";
		$result = mysql_query($query,$this->con);
		$num = mysql_numrows($result);
		
		
		if($num > 0){
			$i = 0;
			while($i < $num){
				$car_number = mysql_result($result, $i, self::DB_COLUMN_CAR_NUMBER);
				#$car_number =  mb_convert_encoding($car_number,'GBK','UTF-8');
				#$car_number =  mb_convert_encoding($car_number,'UTF-8','GBK');
				$car_pos_late6 = mysql_result($result, $i, self::DB_COLUMN_CAR_POS_LATE6);
				$car_pos_longe6 = mysql_result($result, $i, self::DB_COLUMN_CAR_POS_LONGE6);
				$car_pos_stamp = mysql_result($result, $i, self::DB_COLUMN_CAR_POS_STAMP);
				$car_pos_provider = mysql_result($result, $i, self::DB_COLUMN_CAR_POS_PROVIDER);		
				$car_pos_speede6 = mysql_result($result, $i, self::DB_COLUMN_CAR_POS_SPEEDE6);	
				$car_pos_bearinge6 = mysql_result($result, $i, self::DB_COLUMN_CAR_POS_BEARINGE6);
				$car_pos_accuracy = mysql_result($result, $i, self::DB_COLUMN_CAR_POS_ACCURACY);

				$arr = Array(self::DB_COLUMN_CAR_POS_LATE6 => $car_pos_late6, self::DB_COLUMN_CAR_POS_LONGE6 => $car_pos_longe6,
					self::DB_COLUMN_CAR_POS_STAMP => $car_pos_stamp, self::DB_COLUMN_CAR_NUMBER => $car_number,
					self::DB_COLUMN_CAR_POS_PROVIDER => $car_pos_provider, self::DB_COLUMN_CAR_POS_ACCURACY => $car_pos_accuracy,
					self::DB_COLUMN_CAR_POS_BEARINGE6 => $car_pos_bearinge6, self::DB_COLUMN_CAR_POS_SPEEDE6 => $car_pos_speede6);
				
				$carPos[$i] =  json_encode($arr);
				$carPosObj[$i] = json_decode($carPos[$i]);
					
				$i++;
			}
			
		}
		else {

		}
		
		$array = Array(self::DB_COLUMN_CAR_NUMBER => $car_number, self::API_JSON_CAR_POS_ARRAY => $carPosObj);
		
		return json_encode($array);
		
	}
	
	
	
	public function queryInstanceTickets($device_imei){
		
#		$car_number = $this->queryCarNumber($device_imei);
		$device_serial = $this->queryDeviceSerial($device_imei);
		
#		echo $device_serial;
		
		$table = self::DB_TABLE_SHUTTLE_INSTANCE;
		$order = self::DB_COLUMN_INSTANCE_SERIAL;
		date_default_timezone_set('Asia/Shanghai'); //系统时间差8小时问题
		$date = date('y-m-d');
		$where = self::DB_COLUMN_INSTANCE_DATE." = '$date' AND ".self::DB_COLUMN_DEVICE_SERIAL." = '$device_serial'";
		$query = "SELECT * FROM $table WHERE $where ORDER BY $order";
		$result_instance = mysql_query($query,$this->con);
		$num_instance = mysql_numrows($result_instance);
		
		
		if($num_instance > 0){
			
			$i = 0;
			$index = 0;
			while($i < $num_instance){

				$line_serial = mysql_result($result_instance, $i, self::DB_COLUMN_LINE_SERIAL);
				$this->queryLineInformation($line_serial);
#				echo $line_serial;
				
				$schedule_serial = mysql_result($result_instance, $i, self::DB_COLUMN_SCHEDULE_SERIAL);
				$this->queryScheduleTime($schedule_serial);
				
				$driver_serial = mysql_result($result_instance, $i, self::DB_COLUMN_DRIVER_SERIAL);
				$driver_name = $this->queryDriverNameBySerial($driver_serial);
#				echo $driver_name;
				$car_number = mysql_result($result_instance, $i, self::DB_COLUMN_CAR_NUMBER);

				$instance_serial = mysql_result($result_instance,$i,self::DB_COLUMN_INSTANCE_SERIAL);
				
				
				$table = self::DB_TABLE_TICKET_LIST;
				$order = self::DB_COLUMN_TICKET_SEAT_NUMBER;
				$ticket_sold = self::DB_VALUE_TICKET_STATUS_SOLD;
				$where = self::DB_COLUMN_INSTANCE_SERIAL." = $instance_serial"." AND "
					.self::DB_COLUMN_TICKET_STATUS." = '$ticket_sold'";
				$query = "SELECT * FROM $table WHERE $where ORDER BY $order";
				$result_tickets = mysql_query($query,$this->con);
				$num_tickets = mysql_numrows($result_tickets);
				
				$j = 0;
				$ticket = null;
				$ticketObj = null;
				while ($j < $num_tickets){
				
				
    				$passenger_name = mysql_result($result_tickets, $j, self::DB_COLUMN_TICKET_PASSENGER_NAME);
    				$passenger_phone = mysql_result($result_tickets, $j, self::DB_COLUMN_TICKET_PASSENGER_PHONE);
    				$passenger_address = mysql_result($result_tickets, $j, self::DB_COLUMN_TICKET_PASSENGER_ADDRESS);
    				$passenger_late6 = mysql_result($result_tickets, $j, self::DB_COLUMN_TICKET_PASSENGER_LATE6);
   					$passenger_longe6 = mysql_result($result_tickets, $j, self::DB_COLUMN_TICKET_PASSENGER_LONGE6);					
					$serve_confirm = mysql_result($result_tickets, $j, self::DB_COLUMN_TICKET_SERVE_CONFIRM);					
					$ticket_price = mysql_result($result_tickets, $j, self::DB_COLUMN_TICKET_PRICE);					
					$ticket_serial = mysql_result($result_tickets, $j, self::DB_COLUMN_TICKET_SERIAL);					
					
					$arr = Array(self::DB_COLUMN_TICKET_SERIAL => $ticket_serial,
						self::DB_COLUMN_TICKET_PASSENGER_NAME => $passenger_name, 
						self::DB_COLUMN_TICKET_PASSENGER_PHONE => $passenger_phone,
						self::DB_COLUMN_TICKET_PASSENGER_ADDRESS => $passenger_address, 
						self::DB_COLUMN_TICKET_PASSENGER_LATE6 => $passenger_late6,
						self::DB_COLUMN_TICKET_PASSENGER_LONGE6 => $passenger_longe6,
						self::DB_COLUMN_TICKET_SERVE_CONFIRM => $serve_confirm,
						self::DB_COLUMN_TICKET_PRICE => $ticket_price
						);
				
				
					$ticket[$j] =  json_encode($arr);
				
					$ticketObj[$j] = json_decode($ticket[$j]);
					
					$j++;
				}
				
				if($ticketObj != null){
					$arr = Array(
						self::DB_COLUMN_LINE_DESCRIPTION => $this->line_description,
						self::DB_COLUMN_LINE_OPERATION_TYPE => $this->line_operation_type,
						self::DB_COLUMN_LINE_START_ADDRESS => $this->line_start_address,
						self::DB_COLUMN_LINE_START_LATE6 => $this->line_start_late6,
						self::DB_COLUMN_LINE_START_LONGE6 => $this->line_start_longe6,
						self::DB_COLUMN_LINE_TERMINAL_ADDRESS => $this->line_terminal_address,
						self::DB_COLUMN_LINE_TERMINAL_LATE6 => $this->line_terminal_late6,
						self::DB_COLUMN_LINE_TERMINAL_LONGE6 => $this->line_terminal_longe6,
						self::DB_COLUMN_SCHEDULE_DEPARTURE_TIME => $this->schedule_departure_time,
						self::DB_COLUMN_SCHEDULE_ARRIVE_TIME => $this->schedule_arrive_time,
						self::DB_COLUMN_CAR_NUMBER => $car_number,
						self::DB_COLUMN_DRIVER_NAME => $driver_name,
						self::DB_COLUMN_INSTANCE_SERIAL => $instance_serial,
						self::API_JSON_TICKET_ARRAY => $ticketObj
						);
				
					$instance[$index] = json_encode($arr);
					$instanceObj[$index] = json_decode($instance[$index]);
					$index++;
				
				}
				
				$i++;
			}
		}
		else {

		}
		
		$array = Array(self::API_JSON_SHUTTLE_ARRAY => $instanceObj);
		
		return json_encode($array);
		
	}

	public function updateTicketServeConfirm($ticket_serial, $ticket_serve_confirm){
		
		$table = self::DB_TABLE_TICKET_LIST;
#		$order = self::DB_COLUMN_DEVICE_UPDATE_STAMP;
		date_default_timezone_set('Asia/Shanghai'); //系统时间差8小时问题
		$ticket_update_stamp =  date("Y-m-d H:i:s");
		$where = self::DB_COLUMN_TICKET_SERIAL." = '$ticket_serial'";
		$query = "UPDATE $table SET ticket_serve_confirm = '$ticket_serve_confirm', ticket_update_stamp = '$ticket_update_stamp' WHERE $where";
		$result = mysql_query($query, $this->con);

		return $result;

	}

	public function registDevice($device_imei, $device_brand, $device_model, $device_os,
		$device_sim_imsi, $device_sim_number, $device_sim_carrier){
		
		$table = self::DB_TABLE_DEVICE_REGISTER;
		date_default_timezone_set('Asia/Shanghai'); //系统时间差8小时问题
		$device_update_stamp =  date("Y-m-d H:i:s");
		$driver_serial = 3;
		
		$device_serial = $this->queryDeviceSerial($device_imei);
		
		if($device_serial > 0){
			
			$where = self::DB_COLUMN_DEVICE_SERIAL." = $device_serial";
			
			$set = self::DB_COLUMN_DEVICE_BRAND." = '$device_brand', ".
				self::DB_COLUMN_DEVICE_MODEL." = '$device_model', ".
				self::DB_COLUMN_DEVICE_OS." = '$device_os', ".
				self::DB_COLUMN_DEVICE_SIM_IMSI." = '$device_sim_imsi', ".
				self::DB_COLUMN_DEVICE_SIM_NUMBER." = '$device_sim_number', ".
				self::DB_COLUMN_DEVICE_SIM_CARRIER." = '$device_sim_carrier', ".
				self::DB_COLUMN_DEVICE_UPDATE_STAMP." = '$device_update_stamp'";
			
			$query = "UPDATE $table SET $set WHERE $where";
#			echo $query;
			
			$result = mysql_query($query, $this->con);
			
			if(!$result){
				echo mysql_error($this->con);
			}
		
		}
		else {
		
			$columns = 	self::DB_COLUMN_DEVICE_IMEI.", ".
						self::DB_COLUMN_DEVICE_BRAND.", ".
						self::DB_COLUMN_DEVICE_MODEL.", ".
						self::DB_COLUMN_DEVICE_OS.", ".
						self::DB_COLUMN_DEVICE_SIM_IMSI.", ".
						self::DB_COLUMN_DEVICE_SIM_NUMBER.", ".
						//self::DB_COLUMN_DRIVER_SERIAL.", ".
						
						self::DB_COLUMN_DEVICE_SIM_CARRIER.", ".
						self::DB_COLUMN_DEVICE_UPDATE_STAMP;
						
			$values = 	"'$device_imei', ".
						"'$device_brand', ".
						"'$device_model', ".
						"'$device_os', ".
						"'$device_sim_imsi', ".
						"'$device_sim_number', ".
						//"$driver_serial, ".
						
						"'$device_sim_carrier', ".
						"'$device_update_stamp'";
						
			$query = "INSERT INTO $table ($columns) VALUES ($values)";
#			echo $query;
			$result = mysql_query($query, $this->con);
			
			if(!$result){
				
				echo mysql_error($this->con);
			
			}
			
		}
		return $result;

	}
	
	
	
}

?>