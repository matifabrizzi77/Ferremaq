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
		$descmarcaError = null;
		
		
		// keep track post values
		$descmarca = $_POST['descmarca'];
		
		// validate input
		$valid = true;
		if (empty($descmarca)) {
			$descmarcaError = 'Por favor ingrese el campo Marca correctamente';
			$valid = false;
		}
		
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO marcas (descmarca) values(?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($descmarca));
			Database::disconnect();
			header("Location: marcaregistrada.php");
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
				<h2>Marcas</h2>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="nuevamarca.php" method="post">				  
					<div class="well">
					<br>
						<!-- /Nombre y apellido -->
						<div class="control-group <?php echo !empty($descmarcaError)?'error':'';?>">
							<div class="form-group">
								<label for="inputEmail" class="control-label col-xs-3">Marca:</label>
								<div class="col-xs-5">
									<input name="descmarca" class="form-control" type="text"  placeholder="Nombre marca" value="<?php echo !empty($descmarca)?$descmarca:'';?>">
									<?php if (!empty($descmarcaError)): ?>
										<span class="help-inline"><?php echo $descmarcaError;?></span>
									<?php endif; ?>
								</div>
							</div>
						</div>
									
						<br>
						<!-- /Botones -->  
						<div class="col-xs-offset-3 col-xs-6">
						  <a href="#" class="btn btn-primary">Registrar</a>
						  <a href="marcas.php" class="btn btn-primary">Volver</a>
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
										<p>Seguro que desea ingresar una nueva marca?</p>
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