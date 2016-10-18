<?php
/* 
 * Pagina asegurada
 */
require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
?>

<?php 
	require 'database.php';
	$codequipo = 0;
	
	if ( !empty($_GET['codequipo'])) {
		$codequipo = $_REQUEST['codequipo'];
	}
	
	if ( !empty($_POST)) {
		// keep track post values
		$codequipo = $_POST['codequipo'];
		
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM equipos  WHERE codequipo = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($codequipo));
		Database::disconnect();
		header("Location: equipos.php");
		
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
		 <br><br><br><br>
		 <div class="panel panel-info">
			<div class="panel-heading">
				<h2>Equipos</h2>
			</div>
			
			<div class="panel-body">
				<form class="form-horizontal" action="eliminaequipos.php" method="post">			  
					<div class="well">
					<br>
					<center>					
	    			  <input type="hidden" name="codequipo" value="<?php echo $codequipo;?>"/>
					  <label for="inputEmail" class="control-label">¿Desea eliminar el equipo?</label>
					<br><br>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger">Confirmar</button>
						  <a href="equipos.php" class="btn btn-primary">Cancelar</a>
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
