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
                    <h2>Listados</h2>
                </div>
                <div class="panel-body">
                    Sin información
                    <br><br>

                    <a href="index.php" class="btn btn-primary">Volver</a>	
                </div>
                <?php
                include 'pie.php';
                ?>
            </div>

        </div> <!-- /container -->
    </body>
</html>
