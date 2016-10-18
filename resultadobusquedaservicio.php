<?php
/*
 * Pagina asegurada
 */
require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
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
                            include 'database.php';
                            $pdo = Database::connect();
                            $codservicio = $_POST['codservicio'];

                            $sql = "SELECT S.codservicio, S.codcliente, CL.nombreapellido, 
                                    T.codtrabajo, T.desctrabajo, EQ.codequipo,EQ.descequipo,M.codmarca,
                                    M.descmarca,AC.descaccesorio,S.fechaing
                                    FROM servicios AS S 
                                    INNER JOIN trabajos AS T ON S.codtrabajo = T.codtrabajo 
                                    INNER JOIN clientes AS CL ON S.codcliente = CL.codcliente
                                    INNER JOIN marcas AS M ON S.codmarca = M.codmarca
                                    INNER JOIN equipos AS EQ ON S.codequipo = EQ.codequipo
                                    INNER JOIN accesorios AS AC ON S.codaccesorio = AC.codaccesorio
                                    WHERE S.codservicio='" . $codservicio . "'";
                            
                            foreach ($pdo->query($sql) as $fila) {                             
                                echo '<tr>';
                                echo '<td>' . $fila['codservicio'] . '</td>';
                                echo '<td>' . $fila['nombreapellido'] . '</td>';
                                echo '<td>' . $fila['desctrabajo'] . '</td>';
                                echo '<td>' . $fila['descequipo'] . '</td>';
                                echo '<td>' . $fila['descmarca'] . '</td>';
                                echo '<td>' . $fila['descaccesorio'] . '</td>';
                                echo '<td>' . $fila['fechaing'] . '</td>';
                                echo '<td>';
                                echo '<a class="btn btn-default" href="notasservicio.php?codservicio='.$fila['codservicio'].'">Notas</a>';
                                echo '&nbsp;';
                                echo '<a href="eliminaservicio.php?codservicio=' . $fila['codservicio'] . '"><img src="img/eliminar.png"></a>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </table>

                        <a href="servicios.php" class="btn btn-primary">Volver</a>	
                    </div>

                </div>
                <?php
                include 'pie.php';
                ?>
            </div>

        </div> <!-- /container -->
    </body>
</html>
