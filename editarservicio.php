<?php
/* 
 * Pagina asegurada
 */
require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
?>

<?php 
	
	require 'database.php';

	$codmarca = null;
	if ( !empty($_GET['codmarca'])) {
		$codmarca = $_REQUEST['codmarca'];
	}
	
	if ( null==$codmarca ) {
		header("Location: marcas.php");
	}
	
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
		
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE marcas set descmarca = ? WHERE codmarca = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($descmarca,$codmarca));
			Database::disconnect();
			header("Location: marcas.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM marcas where codmarca = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($codmarca));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$descmarca = $data['descmarca'];
		Database::disconnect();
	}
?>


<html lang="en">
<head>
    <meta charset="utf-8">
	<title>Ferremaq</title>
    <link   href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="js/main.js"></script>
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/round-about.css" rel="stylesheet">
	<link rel="stylesheet" href="css/datepicker.css">.
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</head>

<body>
    <div class="container">
	    <!-- menu -->
		<?php 
		include 'menu.php';
		?>
		 <!-- /menu -->
		 <br>
		<div class="panel panel-info">
			 <div class="panel-heading">
				<h2>Servicios</h2>
			 </div>
			  <div class="panel-body">
				<form class="form-horizontal" action="servicioregistrado.php" method="post">
					<div class="well">
						
					<div class="form-group" action="nuevoservicio.php" method="post">
						<label for="inputEmail" class="control-label col-xs-3">Cliente:</label>
						<div class="col-xs-5">
							<div class="input_container">
							<input type="text" onkeyup="autocomplet()" name="clientes" class="form-control" id="codcliente" placeholder="Nombre y apellido">
							<ul id="country_list_id"></ul>
						</div>	
						</div>
					</div>
					<div class="form-group" action="nuevoservicio.php" method="post">
						<label for="inputPassword" class="control-label col-xs-3">Trabajo</label>
						<div class="col-xs-5">		
						<?php							
							$conexion = new mysqli("localhost","ferremaqonline","central2447","ferremaqonline_dbferremaq",3306); 
							$sql="select codtrabajo, desctrabajo from trabajos";
							$result = $conexion->query($sql);
							$opciones = '<option value="0"> Elige una opcion</option>';
							while( $fila = $result->fetch_array() )
							{
								 $opciones.='<option value="'.$fila["codtrabajo"].'">'.$fila["desctrabajo"].'</option>';
							  }
							?>
							<div>
								 <select name="trabajo">
									 <?php 
									 echo $opciones; 
									 ?>
								 </select>  
							</div>
						</div>
					</div>
					<div class="form-group" action="nuevoservicio.php" method="post">
						<label for="inputPassword" class="control-label col-xs-3">Marca</label>
						<div class="col-xs-5">		
						<?php							
							$sql="select codmarca, descmarca from marcas";
							$result = $conexion->query($sql);
							$opciones = '<option value="0"> Elige una opcion</option>';
							while( $fila = $result->fetch_array() )
							{
								 $opciones.='<option value="'.$fila["codmarca"].'">'.$fila["descmarca"].'</option>';
							  }
							?>
							<div>
								 <select name="marca">
									 <?php 
									 echo $opciones; 
									 ?>
								 </select>  
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword" class="control-label col-xs-3" action="nuevoservicio.php" method="post">Equipo</label>
						<div class="col-xs-5">		
						<?php							
							$sql="select codequipo, descequipo from equipos";
							$result = $conexion->query($sql);
							$opciones = '<option value="0"> Elige una opcion</option>';
							while( $fila = $result->fetch_array() )
							{
								 $opciones.='<option value="'.$fila["codequipo"].'">'.$fila["descequipo"].'</option>';
							  }
							?>
							<div>
								 <select name="equipo">
									 <?php 
									 echo $opciones; 
									 ?>
								 </select>  
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="inputPassword" class="control-label col-xs-3" action="nuevoservicio.php" method="post">Modelo</label>
						<div class="col-xs-5">		
						<?php							
							$sql="select codmodelo, descmodelo from modelos";
							$result = $conexion->query($sql);
							$opciones = '<option value="0"> Elige una opcion</option>';
							while( $fila = $result->fetch_array() )
							{
								 $opciones.='<option value="'.$fila["codmodelo"].'">'.$fila["descmodelo"].'</option>';
							  }
							?>
							<div>
								 <select name="modelos">
									 <?php 
									 echo $opciones; 
									 ?>
								 </select>  
							</div>
						</div>
					</div>
					
					<div class="form-group" action="nuevoservicio.php" method="post">
						<label for="inputPassword" class="control-label col-xs-3">Estado</label>
						<div class="col-xs-5">		
						<?php							
							$sql="select codestado, descestado from estados";
							$result = $conexion->query($sql);
							$opciones = '<option value="0"> Elige una opcion</option>';
							while( $fila = $result->fetch_array() )
							{
								 $opciones.='<option value="'.$fila["codestado"].'">'.$fila["descestado"].'</option>';
							  }
							?>
							<div>
								 <select name="estado">
									 <?php 
									 echo $opciones; 
									 ?>
								 </select>  
							</div>
						</div>
					</div>
					<div class="form-group" action="nuevoservicio.php" method="post">
						<label for="inputPassword" class="control-label col-xs-3">Tecnico reparador</label>
						<div class="col-xs-5">		
						<?php							
							$sql="select codtecnico, nombreapellido from tecnicos";
							$result = $conexion->query($sql);
							$opciones = '<option value="0"> Elige una opcion</option>';
							while( $fila = $result->fetch_array() )
							{
								 $opciones.='<option value="'.$fila["codtecnico"].'">'.$fila["nombreapellido"].'</option>';
							  }
							?>
							<div>
								 <select name="tecnico">
									 <?php 
									 echo $opciones; 
									 ?>
								 </select>  
							</div>
						</div>
					</div>
					
					<div class="form-group" action="nuevoservicio.php" method="post">					
						<label for="inputPassword" class="control-label col-xs-3">Observaciones</label>
						<div class="col-xs-5">
							<textarea class="form-control" rows="3" name="observaciones"></textarea>
						</div>
					</div>
					
					<label for="inputEmail" class="control-label col-xs-3">Costo Total $</label>
						<div class="col-xs-2">
							<input type="text" value="0" name="costo" class="form-control" id="inputEmail" placeholder="Costo total">
						</div>
						<br><br>

					<div class="form-group" action="nuevoservicio.php" method="post">
					<?php					
						$fechaing = date('Y-m-d');
					?>
					</div> 
					
					<div class="form-group" action="nuevoservicio.php" method="post">	
					<div class="form-group">
						<div class="col-xs-offset-3 col-xs-6">
							<input type="submit" class="btn btn-primary" value="Registrar"></input>						
							<a href="index.php" class="btn btn-primary">Volver</a>		
						</div>
					</div>
					</div>

				</form>
			  </div>
			  <?php 
				include 'pie.php';
				?>
		</div>
		

    </div> <!-- /container -->
  </body>
</html>
