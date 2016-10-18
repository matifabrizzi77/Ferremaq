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
    <title>Ferremaq</title>	
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	
	    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <link href="css/round-about.css" rel="stylesheet">
</head>

<body>
    <div class="container">
	    <!-- menu -->
		<?php 
		include 'menu.php';
		?>
		 <!-- /menu -->
		 <br><br><br>
		 <div class="panel panel-info">
			 <div class="panel-heading">
				<h2>Servicios</h2>
			 </div>
			  <div class="panel-body">
				Contenido del panel
			  </div>
			  <div class="panel-footer"><br>Ferremaq Industrial SRL - Avellaneda 35 bis</div>
		</div>
		 
		<?php 
		include 'pie.php';
		?>
    </div> <!-- /container -->
  </body>
</html>
