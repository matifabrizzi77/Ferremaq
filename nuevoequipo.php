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

        <link rel="stylesheet" href="css/datepicker.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/main.js"></script>
        <script src="js/jquery-1.11.0.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <link href="css/round-about.css" rel="stylesheet">
        <link rel="stylesheet" href="css/datepicker.css">.
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
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
        <style type="text/css">
            .bs-example{
                margin: 20px;
            }
        </style>
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
                <div class="panel-heading">
                    <h2>Equipos</h2>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="equiporegistrado.php" method="post">
                        <div class="well">

                            <div class="control-group">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label col-xs-3">Modelo:</label>
                                    <div class="col-xs-5">
                                        <input name="descequipo" class="form-control" type="text"  placeholder="Nombre equipo" value="<?php echo!empty($descequipo) ? $descequipo : ''; ?>">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group" action="nuevoservicio.php" method="post">
                                <label for="inputPassword" class="control-label col-xs-3">Tipo equipo</label>
                                <div class="col-xs-5">		
                                    <?php
                                    $conexion = new mysqli("localhost", "ferremaqonline", "central2447", "ferremaqonline_dbferremaq", 3306);
                                    $sql = "select codtipo, desctipo from tipoequipo";
                                    $result = $conexion->query($sql);
                                    $opciones = '<option value="0"> Elige una opcion</option>';
                                    while ($fila = $result->fetch_array()) {
                                        $opciones.='<option value="' . $fila["codtipo"] . '">' . $fila["desctipo"] . '</option>';
                                    }
                                    ?>
                                    <div>
                                        <select name="tipoequipo">
                                            <?php
                                            echo $opciones;
                                            ?>
                                        </select>  
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group" action="nuevoequipo.php" method="post">	
                                <div class="form-group">
                                    <div class="col-xs-offset-3 col-xs-6">
                                        <a href="#" class="btn btn-primary">Registrar</a>												
                                        <a href="servicios.php" class="btn btn-primary">Volver</a>		
                                    </div>
                                </div>
                            </div>

                            <!-- Modal HTML -->
                            <div id="myModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Confirmación</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Seguro que desea ingresar nuevo Servicio?</p>
                                            <p class="text-warning"><small>Para registrar el Servicio, presione en Confirmar cambios</small></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Confirmar cambios</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>										
                                        </div>
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
