<?php
function conexion(){
$con = mysql_connect("localhost","ferremaqonline","central2447");
if (!$con){
die('Could not connect: ' . mysql_error());
}
mysql_select_db("ferremaqonline_dbferremaq", $con);
return($con);
}
?>