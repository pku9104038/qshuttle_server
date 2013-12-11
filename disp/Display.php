<?php
header("content-type;text/html;charset=utf-8");





# print html/head
print('<html>');
print('<meta http-equiv="Content-Type"'.
    ' content="text/html; charset=utf-8"/>');
print('<body>');

# limit number of record to display
$limit = $_REQUEST['limit'];

$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("qshuttle", $con);

# DevRegister table
echo "<h3>car_tracker Table</h3>";
$table = car_tracker;
$sql = "select * from 'car_tracker'"; 
if(isset($limit)) {
   $query .= " LIMIT $limit ";
}

$result = mysql_query($sql,$con);
#if (!($result = mysql_query($sql,$con)))
#{
#   die("Could not query the database: <br />" . $sql . "<br /> " .mysql_error());
#}

$fields = array("car_number", "car_late6", "car_longe6", "car_posstamp","car_postype");
echo "<table border='1'>";
echo "<tr> ";
for($i=0; $i < count($fields); $i++) {
   echo "<th>$fields[$i]</th> ";
}
echo "</tr>";
while ($row = mysql_fetchrow($result)) {
   echo "<tr> ";
   for($i=0; $i < count($fields); $i++) {
      $fieldName = $fields[$i];
      $fieldValue = $row["$fieldName"];
      echo "<td>$fieldValue</td> ";
   }
   echo "</tr>";
}
echo "</table>";


mysql_close($con);

print('</body>');
print('</html>');
?>

