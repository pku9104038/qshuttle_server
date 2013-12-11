<?php
#header("content-type;text/html;charset=utf-8");
require_once "constants.php";

#$con = mysql_connect("localhost","root","root")or die('Could not connect: ' . mysql_error());
$con = mysql_connect("localhost",DB_USER,DB_PWD)or die('Could not connect: ' . mysql_error());

#mysqli_query($con, "SET NAMES 'UTF8'");
#mysqli_query($con, "SET NAMES 'GBK'");

#mysql_set_charset('uft8', $con);
#mysql_query("set name 'gbk'",$con) 
#mysql_set_charset('gb2312', $con);

?>

