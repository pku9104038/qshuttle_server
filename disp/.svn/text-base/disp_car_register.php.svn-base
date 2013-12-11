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

#mysqli_query($con, "SET NAMES 'GBK'");
#echo "names gbk";
mysqli_query($con, "SET CHARACTER_SET 'UTF8'");
echo "character_set utf8";
mysqli_query($con, "SET CHARACTER_SET_RESULTS 'GBK'");
echo "character_set_results gbk";

$table="car_register";
$order = "car_number";
$query="SELECT * FROM $table ORDER BY $order DESC LIMIT 100";
$result=mysql_query($query,$con);

$num=mysql_numrows($result);


?>
<table border="0" cellspacing="2" cellpadding="2">
<tr>
<td><font face="Arial, Helvetica, sans-serif">#</font></td>
<td><font face="Arial, Helvetica, sans-serif">car_vin</font></td>
<td><font face="Arial, Helvetica, sans-serif">car_number</font></td>
<td><font face="Arial, Helvetica, sans-serif">car_brand</font></td>
<td><font face="Arial, Helvetica, sans-serif">car_model</font></td>
<td><font face="Arial, Helvetica, sans-serif">car_color</font></td>
</tr>

<?php
$i=0;
while ($i < $num) {

$f1=mysql_result($result,$i,"car_vin");
$f2=mysql_result($result,$i,"car_number");
$f3=mysql_result($result,$i,"car_brand");
$f4=mysql_result($result,$i,"car_model");
$f5=mysql_result($result,$i,"car_color");
?>

<tr>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $i; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f1; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo mb_convert_encoding($f2,'UTF-8','GBK'); ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f3; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f4; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f5; ?></font></td>

</tr>

<?php
$i++;
}

mysql_close();
?>

</body>
</html>
