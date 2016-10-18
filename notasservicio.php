<?php
/*
 * Pagina asegurada
 */
require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
?>

<?php
require 'database.php';
$codservicio = null;
if (!empty($_GET['codservicio'])) {
    $codservicio = $_REQUEST['codservicio'];
}

if (null == $codservicio) {
    header("Location: servicios.php");
}

if (!empty($_POST)) {
    // keep track validation errors
    $observacionesError = null;

    // keep track post values
    $codcliente = $_POST['codcliente'];
    $codtrabajo = $_POST['codtrabajo'];
    $codmarca = $_POST['codmarca'];
    $codequipo = $_POST['codequipo'];
    $codmodelo = $_POST['codmodelo'];
    $codaccesorio = $_POST['codaccesorio'];
    $codtecnico = $_POST['codtecnico'];
    $observaciones = $_POST['observaciones'];

    // validate input
    $valid = true;
    if (empty($observaciones)) {
        $observacionesError = 'Por favor ingrese el campo Observaciones correctamente';
        $valid = false;
    }

    // update data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE servicios set observaciones = ? WHERE codservicio = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($observaciones, $codservicio));
        Database::disconnect();
        header("Location: servicios.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT C.nombreapellido,T.desctrabajo,M.descmarca,E.descequipo,MO.descmodelo,S.observaciones ,TE.nombreapellido AS desctecnico, "
            . "AC.descaccesorio FROM servicios AS S INNER JOIN clientes AS C ON S.codcliente = C.codcliente INNER JOIN trabajos AS T "
            . "ON S.codtrabajo = T.codtrabajo INNER JOIN marcas AS M ON S.codmarca = M.codmarca INNER JOIN equipos AS E "
            . "ON S.codequipo = E.codequipo INNER JOIN modelos AS MO ON S.codmodelo = MO.codmodelo "
            . "INNER JOIN tecnicos AS TE ON S.codtecnico = TE.codtecnico INNER JOIN accesorios AS AC ON S.codaccesorio = AC.codaccesorio WHERE codservicio = ?";
    
    $q = $pdo->prepare($sql);
    $q->execute(array($codservicio));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nombreapellido = $data['nombreapellido'];
    $observaciones = $data['observaciones'];
    $desctrabajo = $data['desctrabajo'];
    $descmarca = $data['descmarca'];
    $descequipo = $data['descequipo'];
    $descmodelo = $data['descmodelo'];
    $descaccesorio = $data['descaccesorio'];
    $desctecnico = $data['desctecnico'];
    Database::disconnect();
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ferremaq</title>
        <link   href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".btn").click(function () {
                    $("#myModal").modal('show');
                });
            });
        </script>
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
                    <label for="inputPassword" class="control-label">Servicios</label>	
                    <br><br>
                    <form class="form-horizontal" action="notasservicio.php?codservicio=<?php echo $codservicio ?>" method="post">
                        <div class="well">
                            
                            <center>     
                                <h4><span class="label label-danger">Número de Orden: <span class="badge"><?php echo $codservicio ?></span></h4>
                            </center>
                            <hr>
                            
                            <!-- Nombre y apellido -->
                            <div class="control-group">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label col-xs-3">Cliente:</label>
                                    <div class="col-xs-5">               
                                        <h5><span name="$nombreapellido" class="label label-default"><?php echo!empty($nombreapellido) ? $nombreapellido : ''; ?></span></h5>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Trabajo -->
                            <div class="control-group">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label col-xs-3">Trabajo:</label>
                                    <div class="col-xs-5">
                                        <h5><span name="$nombreapellido" class="label label-default"><?php echo!empty($desctrabajo) ? $desctrabajo : ''; ?></span></h5>
                                    </div>
                                </div>
                            </div>
                            
                             <!-- Marca -->
                            <div class="control-group">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label col-xs-3">Marca:</label>
                                    <div class="col-xs-5">
                                        <h5><span name="$nombreapellido" class="label label-default"><?php echo!empty($descmarca) ? $descmarca : ''; ?></span></h5>
                                    </div>
                                </div>
                            </div>
                             
                              <!-- Equipo -->
                            <div class="control-group">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label col-xs-3">Equipo:</label>
                                    <div class="col-xs-5">
                                        <h5><span name="$nombreapellido" class="label label-default"><?php echo!empty($descequipo) ? $descequipo : ''; ?></span></h5>
                                    </div>
                                </div>
                            </div>
                              
                               <!-- Modelo -->
                            <div class="control-group">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label col-xs-3">Modelo:</label>
                                    <div class="col-xs-5">
                                        <h5><span name="$nombreapellido" class="label label-default"><?php echo!empty($descmodelo) ? $descmodelo : ''; ?></span></h5>
                                    </div>
                                </div>
                            </div>
                               
                                <!-- Accesorios -->
                            <div class="control-group">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label col-xs-3">Accesorios:</label>
                                    <div class="col-xs-5">
                                        <h5><span name="$nombreapellido" class="label label-default"><?php echo!empty($descaccesorio) ? $descaccesorio : ''; ?></span></h5>
                                    </div>
                                </div>
                            </div>
                               
                            <!-- Tecnico -->
                            <div class="control-group">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label col-xs-3">Tecnico:</label>
                                    <div class="col-xs-5">
                                        <h5><span name="$desctecnico" class="label label-default"><?php echo!empty($desctecnico) ? $desctecnico : ''; ?></span></h5>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="form-group">
                                    <label for="inputPassword" class="control-label col-xs-3">Notas:</label>
                                    <div class="col-xs-7">
                                        <textarea name="observaciones" class="form-control" type="text" COLS=100 ROWS=4><?php echo!empty($observaciones) ? $observaciones : ''; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-offset-3 col-xs-6">
                                <a href="#" class="btn btn-primary">Guardar</a>
                                <a href="servicios.php" class="btn btn-primary">Volver</a>
                            </div>

                            <div id="myModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Confirmación</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Seguro que desea modificar el Servicio?</p>
                                            <p class="text-warning"><small>Para confirmar, ingrese en Guardar cambios</small></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>										
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            </form>
                        </div>
                        <?php
                        include 'pie.php';
                        ?>
                </div>
            </div>
        </div>
    </div> <!-- /container -->
</body>
</html>
