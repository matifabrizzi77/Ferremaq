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

            <br>
            <div class="panel panel-info">
                <div class="panel-heading"><h2>Menú principal</h2></div>
                <div class="panel-body">
                    <div class="well">
                        <div class="row">

                            <nav class="navbar">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <a class="navbar-brand" href="#">
                                            <img alt="Brand" src="img/logoindex.png">
                                        </a>
                                    </div>
                                </div>
                            </nav>

                            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                <div class="btn-group" role="group">   
                                    <a href="clientes.php" class="btn btn-default btn-lg"><b>Clientes</b></a>
                                </div>
                                <div class="btn-group" role="group">
                                    <a href="servicios.php" class="btn btn-default btn-lg"><b>Servicios</b></a>
                                </div>
                                <div class="btn-group" role="group">
                                    <a href="listados.php" class="btn btn-default btn-lg"><b>Listados</b></a>
                                </div>
                            </div>
                            <br>

                            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                <div class="btn-group" role="group">   
                                    <a href="marcas.php" class="btn btn-default btn-lg"><b>Marcas</b></a>
                                </div>
                                <div class="btn-group" role="group">
                                    <a href="equipos.php" class="btn btn-default btn-lg"><b>Equipos</b></a>
                                </div>
                                <div class="btn-group" role="group">
                                    <a href="modelos.php" class="btn btn-default btn-lg"><b>Modelos</b></a>
                                </div>
                            </div>
                            <br>

                        </div>
                    </div>
                </div>
                <?php
                include 'pie.php';
                ?>
            </div>


        </div> <!-- /container -->
    </body>
</html>
