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
                    <h2>Marcas</h2>
                </div>
                <div class="panel-body">
                    <a class="btn btn-danger" href="nuevamarca.php">Nueva marca</a>
                    <br><br>	
                    <div class="well">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>					
                                    <th>Codigo</th>
                                    <th>Descripcion</th>
                                    <th>Operaciones</th>
                                </tr>
                            </thead>
                            <?php
                            include 'database.php';
                            $pdo = Database::connect();

                            $sql = "select codmarca, descmarca FROM marcas";

                            foreach ($pdo->query($sql) as $fila) {
                                echo '<tr>';
                                echo '<td>' . $fila['codmarca'] . '</td>';
                                echo '<td>' . $fila['descmarca'] . '</td>';
                                echo '<td>';
                                echo '<a href="editamarca.php?codmarca=' . $fila['codmarca'] . '"><img src="img/editar.png"></a>';
                                echo '&nbsp;';
                                echo '<a href="eliminamarca.php?codmarca=' . $fila['codmarca'] . '"><img src="img/eliminar.png"></a>';
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
            </div>

<?php
include 'pie.php';
?>
        </div> <!-- /container -->
    </body>
</html>
