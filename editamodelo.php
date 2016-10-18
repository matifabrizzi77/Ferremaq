<?php
/* 
 * Pagina asegurada
 */
require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
?>

<?php 
	
	require 'database.php';

	$codmodelo = null;
	if ( !empty($_GET['codmodelo'])) {
		$codmodelo = $_REQUEST['codmodelo'];
	}
	
	if ( null==$codmodelo ) {
		header("Location: modelos.php");
	}
	
	if ( !empty($_POST)) {
		// keep track validation errors
		$descmodeloError = null;
		
		// keep track post values
		$descmodelo = $_POST['descmodelo'];
		
		// validate input
		$valid = true;
		if (empty($descmodelo)) {
			$descmodeloError = 'Por favor ingrese el campo Modelo correctamente';
			$valid = false;
		}
		
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE modelos set descmodelo = ? WHERE codmodelo = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($descmodelo,$codmodelo));
			Database::disconnect();
			header("Location: modelos.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM modelos where codmodelo = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($codmodelo));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$descmodelo = $data['descmodelo'];
		Database::disconnect();
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
<title>Ferremaq</title>
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$(".btn").click(function(){
			$("#myModal").modal('show');
		});
	});
	</script>
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
				<h2>Modelos</h2>
			 </div>
			  <div class="panel-body">
			  <a href="nuevomodelo.php"><img src="img/agregarmodelos.png"></a>
				<br>
				<label for="inputPassword" class="control-label">Modelos</label>	
				<br><br>
				<form class="form-horizontal" action="editamodelo.php?codmodelo=<?php echo $codmodelo?>" method="post">
				<div class="well">

					<!-- nombre y apellido -->
					  <div class="control-group <?php echo !empty($descmodeloError)?'error':'';?>">
						<div class="form-group">
							<label for="inputEmail" class="control-label col-xs-3">Modelo:</label>
							<div class="col-xs-5">
								<input name="descmodelo" class="form-control" type="text"  placeholder="Nombre modelo" value="<?php echo !empty($descmodelo)?$descmodelo:'';?>">
								<?php if (!empty($descmodeloError)): ?>
									<span class="help-inline"><?php echo $descmodeloError;?></span>
								<?php endif; ?>
							</div>
						</div>
					  </div>

					  <br>
					  <!-- /Botones -->  
						<div class="col-xs-offset-3 col-xs-6">
						 
						  <a href="#" class="btn btn-primary">Guardar</a>
						  <a href="modelos.php" class="btn btn-primary">Volver</a>
						  
						</div>

<div id="myModal" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Confirmación</h4>
									</div>
									<div class="modal-body">
										<p>Seguro que desea modificar modelo?</p>
										<p class="text-warning"><small>Para confirmar, ingrese en Guardar cambios</small></p>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary">Guardar cambios</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>										
									</div>
								</div>
							</div>
						</div>
						<br><br>
					</form>
				</div>
				<?php 
				include 'pie.php';
				?>
				</div>
			</div>
		</div>
    </div> <!-- /container -->
  </body>
</html>
