<?php
/*
 * Pagina asegurada
 */
require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
?>

<html>
    <head>
        <link   href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/datepicker.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/main.js"></script>
        <script src="js/jquery-1.11.0.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <!-- menu -->
            <?php
            include 'menu.php';
            ?>
            <!-- /menu -->
            <br><br><br><br><br>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2>Servicios</h2>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="create.php" method="post">				  
                        <div class="well">
                            <br>
                            <?php
                            include 'database.php';
                            $pdo = Database::connect();

                            $codtrabajo = $_POST['trabajo'];
                            $codmarca = $_POST['marca'];
                            $codequipo = $_POST['equipo'];
                            $codtecnico = $_POST['tecnico'];
                            $observaciones = $_POST['observaciones'];
                            $codcliente = $_POST['clientes'];
                            $costo = $_POST['costo'];
                            $fechaing = date("Y/m/d");
                            $codmodelo = $_POST['modelos'];
                            $codaccesorio = $_POST['accesorios'];

                            $sql = "INSERT INTO servicios (codtrabajo,fechaing,codequipo,codcliente,codmarca,
					codtecnico,costo,observaciones,codmodelo,codaccesorio) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                            $q = $pdo->prepare($sql);
                            $q->execute(array($codtrabajo, $fechaing, $codequipo, $codcliente, $codmarca,
                                $codtecnico, $costo, $observaciones, $codmodelo, $codaccesorio));

                            $codservicio = $pdo->lastInsertId();
                            
                            echo "Se registró el Servicio $codservicio.";
                            Database::disconnect();
                            ?>

                            
                            <br>
                            <br> 
                            <a href="imprimeservicio.php?variable=<?php echo $codservicio; ?>" class="btn btn-primary" target="_blank">Imprimir</a>
                            <a href="servicios.php" class="btn btn-primary">Volver</a>
                            <br>



                            </form>
                        </div>	
                </div>	
<?php
include 'pie.php';
?>

            </div>

        </div> <!-- /container -->
    </body>
</html>
