<?php
header("content-type;text/html;charset=utf-8");
$username="root";
$password="root";
mysql_connect(localhost,$username,$password);

$database="qshuttle";
@mysql_select_db($database) or die( "Unable to select database");

$table="car_tracker";
$order = "car_posstamp";
$query="SELECT * FROM $table ORDER BY $order DESC LIMIT 100";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

$i=0;

while ($i < $num) {

$car_number=mysql_result($result,$i,"car_number");
$car_late6=mysql_result($result,$i,"car_late6");
$car_longe6=mysql_result($result,$i,"car_longe6");
$car_posstamp=mysql_result($result,$i,"car_posstamp");
$car_postype=mysql_result($result,$i,"car_postype");

$arr = Array('car_late6'=>$car_late6, 'car_longe6'=>$car_longe6,'car_posstamp'=>$car_posstamp,'car_postype'=>$car_postype);

$carPos[$i] =  json_encode($arr);
$carPosObj[$i] = json_decode($carPos[$i]);

$i++;

}



$array = Array('car_number'=>$car_number,'car_posarray'=>$carPosObj);
echo json_encode($array);



?>

