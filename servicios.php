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

        <!-- jQuery Version 1.11.0 -->
        <script src="js/jquery-1.11.0.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Custom CSS -->
        <link href="css/round-about.css" rel="stylesheet">

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
                    <h2>Servicios</h2>
                </div>
                <div class="panel-body">
                    <a href="nuevoservicio.php"><img src="img/agregarservicio.png"></a>
                    <br>
                    <label for="inputPassword" class="control-label">Nuevo Servicio</label>	
                    <br><br>
                    <form class="form-horizontal" action="resultadobusquedaservicio.php" method="post">
                        <div class="well">				
                            <br>					
                            <div class="form-group" method="post">
                                <label for="inputPassword" class="control-label col-xs-4">Número de orden: </label>
                                <div class="col-xs-4">	
                                    <input class="form-control" type="number" name="codservicio"> 				
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-offset-4 col-xs-6">
                                    <input type="submit" class="btn btn-primary" value="Buscar"></input>
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
