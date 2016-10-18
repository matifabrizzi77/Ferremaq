<?php
/* 
 * Pagina asegurada
 */
require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
?>

<?php 
	require 'database.php';
	$codservicio = 0;
	
	if ( !empty($_GET['codservicio'])) {
		$codservicio = $_REQUEST['codservicio'];
	}
	
	if ( !empty($_POST)) {
		// keep track post values
		$codservicio = $_POST['codservicio'];
		
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM servicios  WHERE codservicio = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($codservicio));
		Database::disconnect();
		header("Location: servicioeliminado.php");
		
	} 
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
				<form class="form-horizontal" action="eliminaservicio.php" method="post">			  
					<div class="well">
					<br>
					<center>					
	    			  <input type="hidden" name="codservicio" value="<?php echo $codservicio;?>"/>
					  <label for="inputEmail" class="control-label">¿Desea eliminar el servicio?</label>
					<br><br>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger">Confirmar</button>
						  <a href="clientes.php" class="btn btn-primary">Cancelar</a>
						</div>
						</center>
						<br>
					</div>
				</form>					
			</div>
		</div>	
		<?php 
		include 'pie.php';
		?>			
    </div> <!-- /container -->
  </body>
</html>