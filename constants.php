<?php
#header("content-type;text/html;charset=utf-8");

define("DB_USER",     "qshuttleusr");
define("DB_PWD",     "qshuttleusr");

define("DB_NAME",     "qshuttle");

define('DB_TABLE_CAR_TRACKER', 'car_tracker');
define('DB_COLUMN_CAR_NUMBER', 'car_number');
define('DB_COLUMN_CAR_POS_LATE6', 'car_pos_late6');
define('DB_COLUMN_CAR_POS_LONGE6', 'car_pos_longe6');
define('DB_COLUMN_CAR_POS_STAMP', 'car_pos_stamp');
define('DB_COLUMN_CAR_POS_PROVIDER', 'car_pos_provider');

define('API_JSON_CAR_POS_ARRAY', 'car_pos_array');

define('DB_TABLE_DEVICE_REGISTER', 'device_register');
define('DB_COLUMN_DEVICE_SERIAL', 'device_serial');
define('DB_COLUMN_DEVICE_IMEI', 'device_imei');
define('DB_COLUMN_DEVICE_WIFI_MAC', 'device_wifi_mac');
define('DB_COLUMN_DEVICE_IMSI', 'device_imsi');
define('DB_COLUMN_DEVICE_UPDATE_STAMP', 'device_update_stamp');

define('DB_TABLE_DRIVER_REGISTER', 'driver_register');
define('DB_COLUMN_DRIVER_SERIAL', 'driver_serial');
define('DB_COLUMN_DRIVER_NAME', 'driver_name');
define('DB_COLUMN_DRIVER_CELLPHONE', 'driver_cellphone');


define('DB_TABLE_LINE_OPERATION', 'line_operation');
define('DB_COLUMN_LINE_SERIAL', 'line_serial');
define('DB_COLUMN_LINE_DESCRIPTION', 'line_description');
define('DB_COLUMN_LINE_START_ADDRESS', 'line_start_address');
define('DB_COLUMN_LINE_START_LATE6', 'line_start_late6');
define('DB_COLUMN_LINE_START_LONGE6', 'line_start_longe6');
define('DB_COLUMN_LINE_STOP_ADDRESS', 'line_stop_address');
define('DB_COLUMN_LINE_STOP_LATE6', 'line_stop_late6');
define('DB_COLUMN_LINE_STOP_LONGE6', 'line_stop_longe6');

define('DB_TABLE_LINE_SCHEDULE', 'line_schedule');
define('DB_COLUMN_SCHEDULE_SERIAL', 'schedule_serial');
define('DB_COLUMN_SCHEDULE_DEPARTURE_TIME', 'schedule_departure_time');
define('DB_COLUMN_SCHEDULE_ARRIVE_TIME', 'schedule_arrive_time');

define('DB_TABLE_SHUTTLE_INSTANCE', 'shuttle_instance');
define('DB_COLUMN_INSTANCE_SERIAL', 'instance_serial');
define('DB_COLUMN_INSTANCE_STATE', 'instance_state');
define('DB_COLUMN_INSTANCE_DATE', 'instance_date');
define('DB_COLUMN_INSTANCE_UPDATE_STAMP', 'instance_update_stamp');

define('DB_TABLE_TICKET_LIST', 'ticket_list');
define('DB_COLUMN_TICKET_SEAT_NUMBER', 'ticket_seat_number');
define('DB_COLUMN_TICKET_PASSENGER_NAME', 'ticket_passenger_name');
define('DB_COLUMN_TICKET_PASSENGER_PHONE', 'ticket_passenger_phone');
define('DB_COLUMN_TICKET_PASSENGER_ADDRESS', 'ticket_passenger_address');
define('DB_COLUMN_TICKET_PASSENGER_LATE6', 'ticket_passenger_late6');
define('DB_COLUMN_TICKET_PASSENGER_LONGE6', 'ticket_passenger_longe6');

define('DB_TABLE_ORDER_LIST', 'order_list');
define('DB_COLUMN_ORDER_SERIAL', 'order_serial');


define('API_JSON_TICKET_ARRAY', 'ticket_array');
define('API_JSON_SHUTTLE_ARRAY', 'shuttle_array');

?>
