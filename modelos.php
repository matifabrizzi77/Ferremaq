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
                    <h2>Modelos</h2>
                </div>
                <div class="panel-body">
                    <a class="btn btn-danger" href="nuevomodelo.php">Nuevo modelo</a>
                    <br><br>	
                    <div class="well">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>					
                                    <th>Codigo</th>
                                    <th>Modelo</th>
                                    <th>Operaciones</th>
                                </tr>
                            </thead>
                            <?php
                            include 'database.php';
                            $pdo = Database::connect();
                            $sql = "SELECT codmodelo, descmodelo FROM modelos ";

                            foreach ($pdo->query($sql) as $fila) {
                                echo '<tr>';
                                echo '<td>' . $fila['codmodelo'] . '</td>';
                                echo '<td>' . $fila['descmodelo'] . '</td>';
                                echo '<td>';
                                echo '<a href="editamodelo.php?codmodelo=' . $fila['codmodelo'] . '"><img src="img/editar.png"></a>';
                                echo '&nbsp;';
                                echo '<a href="eliminamodelo.php?codmodelo=' . $fila['codmodelo'] . '"><img src="img/eliminar.png"></a>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </table>			
                        <a href="index.php" class="btn btn-primary">Volver</a>	
                    </div>
                </div>
<?php
include 'pie.php';
?>
            </div> <!-- /container -->
    </body>
</html>
