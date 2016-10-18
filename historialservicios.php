<?php
/* 
 * Pagina asegurada
 */
require('php_lib/include-pagina-restringida.php'); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
<title>Ferremaq</title>
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
				<a href="nuevoservicio.php"><img src="img/agregarservicio.png"></a>
			  <br>
				<label for="inputPassword" class="control-label">Nuevo Servicio</label>	
				<br><br>
				<div class="well">
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>					
							<th>Orden</th>
							<th>Cliente</th>
							<th>Trabajo</th>
							<th>Equipo</th>
							<th>Marca</th>
                                                        <th>Accesorios</th>
							<th>Ingreso</th>
							<th>Operaciones</th>
		                </tr>
		              </thead>
						<?php
						$codcliente = null;
							if ( !empty($_GET['codcliente'])) {
								$codcliente = $_REQUEST['codcliente'];
							}
					
							if ( null==$codcliente ) {
								header("Location: clientes.php");
							}
						
							include 'database.php';
							$pdo = Database::connect();
							
							$sql="select s.codservicio,c.codcliente,c.nombreapellido,s.codtrabajo,tr.desctrabajo,
							eq.codequipo,eq.descequipo,s.codmarca,ma.descmarca,ac.descaccesorio,s.fechaing
							from servicios as s inner join 
							clientes as c on s.codcliente = c.codcliente 
							inner join trabajos as tr on s.codtrabajo = tr.codtrabajo
							inner join equipos as eq on s.codequipo = eq.codequipo
							inner join marcas as ma on s.codmarca = ma.codmarca	
                                                        inner join accesorios as ac on s.codaccesorio = ac.codaccesorio
							where c.codcliente='".$codcliente."'";

							foreach ($pdo->query($sql) as $fila) {
							echo '<tr>';
							echo '<td>'.$fila['codservicio'].'</td>';
							echo '<td>'.$fila['nombreapellido'].'</td>';
							echo '<td>'.$fila['desctrabajo'].'</td>';
							echo '<td>'.$fila['descequipo'].'</td>';
							echo '<td>'.$fila['descmarca'].'</td>';
                                                        echo '<td>'.$fila['descaccesorio'].'</td>';
							echo '<td>'.$fila['fechaing'].'</td>';
							echo '<td>';
							echo '<a class="btn btn-default" href="notasservicio.php?codservicio='.$fila['codservicio'].'">Notas</a>';
							echo '&nbsp;';
							echo '<a href="eliminaservicio.php?codservicio='.$fila['codservicio'].'"><img src="img/eliminar.png"></a>';							
							echo '</td>';
							echo '</tr>';
							}

						?>
				</table>
				
				<a href="clientes.php" class="btn btn-primary">Volver</a>	
				</div>
				
				
			  </div>
			  <div class="panel-footer"><br>Ferremaq Industrial SRL - Avellaneda 35 bis</div>
			</div>
			<?php 
			include 'pie.php';
			?>
    </div> <!-- /container -->
  </body>
</html>
