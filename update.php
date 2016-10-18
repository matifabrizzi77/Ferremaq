<?php
/* 
 * Pagina asegurada
 */
require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
?>

<?php 
	
	require 'database.php';

	$codcliente = null;
	if ( !empty($_GET['codcliente'])) {
		$codcliente = $_REQUEST['codcliente'];
	}
	
	if ( null==$codcliente ) {
		header("Location: clientes.php");
	}
	
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
				
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE clientes set nombreapellido = ?, empresa = ?, domicilio = ?, localidad = ?, telefono = ?, mail = ? WHERE codcliente = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($nombreapellido,$empresa,$domicilio,$localidad,$telefono,$mail,$codcliente));
			Database::disconnect();
			header("Location: clientes.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM clientes where codcliente = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($codcliente));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$nombreapellido = $data['nombreapellido'];
		$empresa = $data['empresa'];
		$domicilio = $data['domicilio'];
		$localidad = $data['localidad'];
		$telefono = $data['telefono'];
		$mail = $data['mail'];
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
			  <a href="create.php"><img src="img/nuevocliente.png"></a>
				<br>
				<label for="inputPassword" class="control-label">Nuevo Cliente</label>	
				<br><br>
				<form class="form-horizontal" action="update.php?codcliente=<?php echo $codcliente?>" method="post">
				<div class="well">

					<!-- nombre y apellido -->
					  <div class="control-group <?php echo !empty($nombreApellidoError)?'error':'';?>">
						<div class="form-group">
							<label for="inputEmail" class="control-label col-xs-3">Nombre y apellido:</label>
							<div class="col-xs-5">
								<input name="nombreapellido" class="form-control" type="text" value="<?php echo !empty($nombreapellido)?$nombreapellido:'';?>">
								<?php if (!empty($nombreApellidoError)): ?>
									<span class="help-inline"><?php echo $nombreApellidoError;?></span>
								<?php endif; ?>
							</div>
						</div>
					  </div>
					  
					  <!-- empresa -->
					  <div class="control-group">
						<div class="form-group">
							<label for="inputEmail" class="control-label col-xs-3">Empresa:</label>					  
							<div class="col-xs-5">
								<input name="empresa" class="form-control" type="text"  value="<?php echo !empty($empresa)?$empresa:'';?>">
							</div>						
						</div>
					  </div>
					  
					  <!-- domicilio -->
					  <div class="control-group">
						<div class="form-group">
							<label for="inputEmail" class="control-label col-xs-3">Domicilio:</label>	
							<div class="col-xs-5">
								<input name="domicilio" class="form-control" type="text" value="<?php echo !empty($domicilio)?$domicilio:'';?>">
							</div>
						</div>
					  </div>
					  
					  <!-- localidad -->
					  <div class="control-group <?php echo !empty($localidadError)?'error':'';?>">
						<div class="form-group">
							<label for="inputEmail" class="control-label col-xs-3">Localidad:</label>	
							<div class="col-xs-5">
								<input name="localidad" class="form-control" type="text" value="<?php echo !empty($localidad)?$localidad:'';?>">
								<?php if (!empty($localidadError)): ?>
									<span class="help-inline"><?php echo $localidadError;?></span>
								<?php endif; ?>
							</div>
						</div>
					  </div>
					  
					  <!-- telefono -->					  
					  <div class="control-group <?php echo !empty($telefonoError)?'error':'';?>">
						<div class="form-group">
							<label for="inputEmail" class="control-label col-xs-3">Télefono:</label>
							<div class="col-xs-5">
								<input name="telefono" class="form-control" type="text"  placeholder="Telefono" value="<?php echo !empty($telefono)?$telefono:'';?>">
								<?php if (!empty($telefonoError)): ?>
									<span class="help-inline"><?php echo $telefonoError;?></span>
								<?php endif;?>
							</div>
						</div>
					  </div>
					  
					  <!-- mail -->	
					  <div class="control-group">
						<div class="form-group">
							<label for="inputEmail" class="control-label col-xs-3">Mail:</label>
							<div class="col-xs-5">
								<input name="mail" class="form-control" type="text" placeholder="Mail" value="<?php echo !empty($mail)?$mail:'';?>">
							</div>
						</div>
					  </div>	
					  <br>
					  <!-- /Botones -->  
						<div class="col-xs-offset-3 col-xs-6">
						  <button type="submit" class="btn btn-primary">Guardar</button>
						  <a href="clientes.php" class="btn btn-primary">Volver</a>
						  
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
