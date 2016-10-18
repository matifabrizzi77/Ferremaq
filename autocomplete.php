<?php
	$q=$_GET['q'];
	$my_data=mysql_real_escape_string($q);
	$mysqli=mysqli_connect('localhost','ferremaqonline','central2447','ferremaqonline_dbferremaq') or die("Database Error");
	$sql="SELECT codcliente,nombreapellido FROM clientes WHERE nombreapellido LIKE '%$my_data%' ORDER BY nombreapellido";
	$result = mysqli_query($mysqli,$sql) or die(mysqli_error());
	
	if($result)
	{
		while($row=mysqli_fetch_array($result))
		{	
			
			echo $row['codcliente']. "-"['nombreapellido']. "\n";
		}
	}
?>
