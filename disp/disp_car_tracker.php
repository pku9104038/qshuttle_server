<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Display car_tracker data</title>
</head>

<body>


<h1>Display car_tracker data!</h1>

<?php
require_once "..\db_conn.php";
mysql_select_db(DB_NAME,$con);


$table="car_tracker";
$order = "car_reporter_stamp";
$query="SELECT * FROM $table ORDER BY $order DESC LIMIT 1,500";
$result=mysql_query($query,$con);

$num=mysql_numrows($result);

mysql_close();
?>
<table border="0" cellspacing="2" cellpadding="2">
<tr>
<td><font face="Arial, Helvetica, sans-serif">car_number</font></td>
<td><font face="Arial, Helvetica, sans-serif">car_pos_late6</font></td>
<td><font face="Arial, Helvetica, sans-serif">car_pos_longe6</font></td>
<td><font face="Arial, Helvetica, sans-serif">car_pos_stamp</font></td>
<td><font face="Arial, Helvetica, sans-serif">car_pos_provider</font></td>
<td><font face="Arial, Helvetica, sans-serif">car_pos_speede6</font></td>
<td><font face="Arial, Helvetica, sans-serif">car_pos_bearinge6</font></td>
<td><font face="Arial, Helvetica, sans-serif">car_pos_accuracy</font></td>
<td><font face="Arial, Helvetica, sans-serif">car_reporter_stamp</font></td>
</tr>

<?php
$i=0;
while ($i < $num) {

$f1=mysql_result($result,$i,"car_number");
$f2=mysql_result($result,$i,"car_pos_late6");
$f3=mysql_result($result,$i,"car_pos_longe6");
$f4=mysql_result($result,$i,"car_pos_stamp");
$f5=mysql_result($result,$i,"car_pos_provider");
$f6=mysql_result($result,$i,"car_pos_speede6");
$f7=mysql_result($result,$i,"car_pos_bearinge6");
$f8=mysql_result($result,$i,"car_pos_accuracy");
$f9=mysql_result($result,$i,"car_reporter_stamp");
?>

<tr>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f1; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f2; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f3; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f4; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f5; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f6; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f7; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f8; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f9; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $i; ?></font></td>
</tr>

<?php
$i++;
}
?>

</body>
</html>
