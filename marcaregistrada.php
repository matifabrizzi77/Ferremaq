<?php
/* 
 * Pagina asegurada
 */
require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
?>

	<html>
	<head>
	<link   href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/datepicker.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="js/main.js"></script>
    <script src="js/jquery-1.11.0.js"></script>
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
				<h2>Marcas</h2>
			</div>
			<div class="panel-body">			  
					<div class="well">
					<br>
					<?php 
					echo "La marca ha sido registrada correctamente";	
				?>
					<br><br>
					<a href="marcas.php" class="btn btn-primary">Volver</a>	
				</div>	
			</div>	
			<?php 
			include 'pie.php';
			?>
				
		</div>
				
</div> <!-- /container -->
</body>
</html>
