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
    </head>

    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Ferremaq SRL</a>	
            </div>

            <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="clientes.php">Clientes</a></li>
                    <li><a href="servicios.php">Servicios</a></li>
                    <li><a href="listados.php">Listados</a></li>
                    <li><a href="marcas.php">Marcas</a></li>
                    <li><a href="equipos.php">Equipos</a></li>
                    <li><a href="modelos.php">Modelos</a></li>
                </ul>

                <div class="col-sm-3 col-md-3 pull-right">
                    <div class="input-group">			
                        <a class="btn btn-default navbar-btn" href="logout.php">Cerrar sesion</a>
                    </div>
                </div>

            </div>
        </div>
        <!-- /container -->
    </body>
</html>