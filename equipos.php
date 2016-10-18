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
        <link   href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>

        <script src="js/jquery-1.11.0.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Custom CSS -->
        <link href="css/round-about.css" rel="stylesheet">
        <title>Ferremaq</title>
    </head>

    <body>
        <div class="container">
            <!-- menu -->
            <?php
            include 'menu.php';
            ?>
            <!-- /menu -->
            <br><br>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2>Equipos</h2>
                </div>
                <div class="panel-body">
                    <a class="btn btn-danger" href="nuevoequipo.php">Nuevo equipo</a>
                    <br><br>
                    <div class="well">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>					
                                    <th>Codigo</th>
                                    <th>Descripcion</th>
                                    <th>Tipo de equipo</th>
                                    <th>Operaciones</th>
                                </tr>
                            </thead>
                            <?php
                            include 'database.php';
                            $pdo = Database::connect();
                            $sql = "select S.codequipo, S.descequipo, T.desctipo FROM equipos as S INNER JOIN tipoequipo AS T ON S.codtipo = T.codtipo ORDER BY 1";

                            foreach ($pdo->query($sql) as $fila) {
                                echo '<tr>';
                                echo '<td>' . $fila['codequipo'] . '</td>';
                                echo '<td>' . $fila['descequipo'] . '</td>';
                                echo '<td>' . $fila['desctipo'] . '</td>';
                                echo '<td>';
                                echo '<a href="editaequipos.php?codequipo=' . $fila['codequipo'] . '"><img src="img/editar.png"></a>';
                                echo '&nbsp;';
                                echo '<a href="eliminaequipos.php?codequipo=' . $fila['codequipo'] . '"><img src="img/eliminar.png"></a>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </table>
                        <a href="index.php" class="btn btn-primary">Volver</a>	
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
