<?php
/* 
 * Pagina asegurada
 */
require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    		<!-- menu -->
		<?php 
		include 'menu.php';
		?>
		 <!-- /menu -->
		 <br><br><br><br><br>
		 <div class="panel panel-info">
			<div class="panel-heading">
				<h2>Servicios</h2>
			</div>
			<div class="panel-body">
				<h3>El servicio fue Eliminado</h3>	
<br>
<a href="clientes.php" class="btn btn-primary">Volver</a>					
			</div>
			

		</div>	
		<?php 
		include 'pie.php';
		?>			
    </div> <!-- /container -->
  </body>
</html>