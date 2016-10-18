<?php
include 'conexion.php';
$r=$_POST['r'];
$con=conexion();
$sql="select * from modelos where descmodelo LIKE '".$r."%' LIMIT 0 , 5";
$res=mysql_query($sql,$con);
if(mysql_num_rows($res)==0){
echo '<b>No hay sugerencias</b>';
}else{
while($fila=mysql_fetch_array($res)){
echo '<div class="sugerencias" onclick="mifuncion('.$fila["codmodelo"].')">'.$fila['descmodelo'].'</div>';
}
}
?>