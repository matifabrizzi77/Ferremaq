<?php
/* 
 * Pagina asegurada
 */
require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
?>

<?php 
	
	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$nombreApellidoError = null;
		$localidadError = null;
		$telefonoError = null;
		
		// keep track post values
		$nombreapellido = $_POST['nombreapellido'];
		$empresa = $_POST['empresa'];
		$domicilio = $_POST['domicilio'];
		$localidad = $_POST['localidad'];
		$telefono = $_POST['telefono'];
		$mail = $_POST['mail'];
		
		// validate input
		$valid = true;
		if (empty($nombreapellido)) {
			$nombreApellidoError = 'Por favor ingrese Nombre y Apellido';
			$valid = false;
		}
		
		
		if (empty($localidad)) {
			$localidadError = 'Por favor ingrese Localidad';
			$valid = false;
		}
		
		if (empty($telefono)) {
			$telefonoError = 'Por favor ingrese Telefono';
			$valid = false;
		}

		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO clientes (nombreapellido,empresa,domicilio,localidad,telefono,mail) values(?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($nombreapellido,$empresa,$domicilio,$localidad,$telefono,$mail));
			Database::disconnect();
			header("Location: clientes.php");
		}
		

	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
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
	<style type="text/css">
		.bs-example{
			margin: 20px;
		}
	</style>
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
				<h2>Clientes</h2>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="create.php" method="post">				  
					<div class="well">
					<br>
						<!-- /Nombre y apellido -->
						<div class="control-group <?php echo !empty($nombreApellidoError)?'error':'';?>">
							<div class="form-group">
								<label for="inputEmail" class="control-label col-xs-3">Cliente:</label>
								<div class="col-xs-5">
									<input name="nombreapellido" class="form-control" type="text"  value="<?php echo !empty($nombreapellido)?$nombreapellido:'';?>">
									<?php if (!empty($nombreApellidoError)): ?>
										<span class="help-inline"><?php echo $nombreApellidoError;?></span>
									<?php endif; ?>
								</div>
							</div>
						</div>
						
						<!-- /Empresa -->
						<div class="control-group">
							<div class="form-group">
								<label for="inputEmail" class="control-label col-xs-3">Empresa:</label>
								<div class="col-xs-5">
									<input name="empresa" class="form-control" type="text"  value="<?php echo !empty($empresa)?$empresa:'';?>">
								</div>
							</div>
						</div>
						
						<!-- /Domicilio -->
						<div class="control-group">
							<div class="form-group">
								<label for="inputEmail" class="control-label col-xs-3">Domicilio:</label>
								<div class="col-xs-5">
									<input name="domicilio" class="form-control" type="text"  value="<?php echo !empty($domicilio)?$domicilio:'';?>">
								</div>
							</div>
						</div>
						
						<!-- /Localidad -->
						<div class="control-group <?php echo !empty($localidadError)?'error':'';?>">
							<div class="form-group">
								<label for="inputEmail" class="control-label col-xs-3">Localidad:</label>
								<div class="col-xs-5">
									<input name="localidad" class="form-control" type="text"  value="<?php echo !empty($domicilio)?$domicilio:'';?>">
									<?php if (!empty($localidadError)): ?>
										<span class="help-inline"><?php echo $localidadError;?></span>
									<?php endif; ?>
								</div>
							</div>
						</div>
						
						<!-- /Telefono -->
						<div class="control-group <?php echo !empty($telefonoError)?'error':'';?>">
							<div class="form-group">
								<label for="inputEmail" class="control-label col-xs-3">Telefono:</label>
								<div class="col-xs-5">
									<input name="telefono" class="form-control" type="text"  value="<?php echo !empty($telefono)?$telefono:'';?>">
									<?php if (!empty($telefonoError)): ?>
										<span class="help-inline"><?php echo $telefonoError;?></span>
									<?php endif; ?>
								</div>
							</div>
						</div>
						
						<!-- /Mail -->
						<div class="control-group">
							<div class="form-group">
								<label for="inputEmail" class="control-label col-xs-3">Mail:</label>
								<div class="col-xs-5">
									<input name="mail" class="form-control" type="text"  value="<?php echo !empty($mail)?$mail:'';?>">
								</div>
							</div>
						</div>
						
						<br>
						<!-- /Botones -->  
						<div class="col-xs-offset-3 col-xs-6">
						  <a href="#" class="btn btn-primary">Registrar</a>
						  <a href="clientes.php" class="btn btn-primary">Volver</a>
						</div>
						
						
						<!-- Modal HTML -->
						<div id="myModal" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Confirmación</h4>
									</div>
									<div class="modal-body">
										<p>Seguro que desea ingresar un nuevo cliente?</p>
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
			</div>	
			<?php 
			include 'pie.php';
			?>
				
		</div>
				
</div> <!-- /container -->
</body>
</html>