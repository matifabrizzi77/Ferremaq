<?php
/* 
 * Pagina asegurada
 */
require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
?>

<?php 
	
	require 'database.php';

	$codequipo = null;
	if ( !empty($_GET['codequipo'])) {
		$codequipo = $_REQUEST['codequipo'];
	}
	
	if ( null==$codequipo ) {
		header("Location: equipos.php");
	}
	
	if ( !empty($_POST)) {
		// keep track validation errors
		$descequipoError = null;
		
		// keep track post values
		$descequipo = $_POST['descequipo'];
		
		// validate input
		$valid = true;
		if (empty($descequipo)) {
			$descequipoError = 'Por favor ingrese el campo Equipo correctamente';
			$valid = false;
		}
		
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE equipos set descequipo = ? WHERE codequipo = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($descequipo,$codequipo));
			Database::disconnect();
			header("Location: equipos.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM equipos where codequipo = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($codequipo));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$descequipo = $data['descequipo'];
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
				<h2>Equipos</h2>
			 </div>
			  <div class="panel-body">
			  <a href="nuevoequipo.php"><img src="img/agregarequipos.png"></a>
				<br>
				<label for="inputPassword" class="control-label">Equipos</label>	
				<br><br>
				<form class="form-horizontal" action="editaequipos.php?codequipo=<?php echo $codequipo?>" method="post">
				<div class="well">

					  <div class="control-group <?php echo !empty($descequipoError)?'error':'';?>">
						<div class="form-group">
							<label for="inputEmail" class="control-label col-xs-3">Equipo:</label>
							<div class="col-xs-5">
								<input name="descequipo" class="form-control" type="text"  placeholder="Nombre equipo" value="<?php echo !empty($descequipo)?$descequipo:'';?>">
								<?php if (!empty($descequipoError)): ?>
									<span class="help-inline"><?php echo $descequipoError;?></span>
								<?php endif; ?>
							</div>
						</div>
					  </div>

					  <br>
					  <!-- /Botones -->  
						<div class="col-xs-offset-3 col-xs-6">
						 
						  <a href="#" class="btn btn-primary">Guardar</a>
						  <a href="equipos.php" class="btn btn-primary">Volver</a>
						  
						</div>

<div id="myModal" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Confirmación</h4>
									</div>
									<div class="modal-body">
										<p>Seguro que desea modificar equipo?</p>
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
