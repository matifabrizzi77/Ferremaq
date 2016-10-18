<?php
/*
 * Valida un usuario y contraseña o presenta el formulario para hacer login
 */

if ($_SERVER['REQUEST_METHOD']=='POST') { // ¿Nos mandan datos por el formulario?
    include('php_lib/config.ini.php'); //incluimos configuración
    include('php_lib/login.lib.php'); //incluimos las funciones

    //verificamos el usuario y contraseña mandados
    if (login($_POST['usuario'],$_POST['password'])) {

       //acciones a realizar cuando un usuario se identifica
       //EJ: almacenar en memoria sus datos, registrar un acceso a una tabla de datos
       //Estas acciones se veran en los siguientes tutorianes en http://www.emiliort.com

        //saltamos al inicio del área restringida
        header('Location: index.php');
        die();
    } else {
        //acciones a realizar en un intento fallido
        //Ej: mostrar captcha para evitar ataques fuerza bruta, bloqueas durante un rato esta ip, ....
        //Estas acciones se veran en los siguientes tutorianes en http://www.emiliort.com

        //preparamos un mensaje de error y continuamos para mostrar el formulario
        $mensaje='Usuario o contraseña incorrecto.';
    }
} //fin if post
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Ferremaq</title>

<style>
#login img{
  margin: 10px 0;
}
#login .center {
  text-align: center;
}

#login .login {
  max-width: 300px;
	margin: 35px auto;
}

#login .login-form{
  padding:0px 25px;
}


</style>
    </head>
    <body>

        <?php
            //si hay algún mensaje de error lo mostramos escapando los carácteres html
            if (!empty($mensaje)) echo('<h2>'.htmlspecialchars($mensaje).'</h2>');
        ?>


<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
<div id="login" class="container">

<br><br><br><br><br><br>
  <div class="row-fluid">
    <div class="span12">
	<div class="well">
      <div class="login well well-small">
        <div class="center">
          <img src="img/logo.png" alt="logo"> 
        </div>
		
        <form action="login.php" style="" enctype="multipart/form-data" class="login-form" id="UserLoginForm" method="post" accept-charset="utf-8">

          <div class="control-group">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-user"></i></span>
              <input name="usuario" required="required" placeholder="Usuario" maxlength="255" type="text" id="UserUsername"> 
            </div>
          </div>
          <div class="control-group">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-lock"></i></span>
              <input name="password" required="required" placeholder="Clave" type="password" id="UserPassword"> 
            </div>
          </div>
          <div class="control-group">
            <label id="remember-me">
              <input type="checkbox" name="data[User][remember_me]" value="1" id="UserRememberMe">Recordar clave</label>
          </div>
          <div class="control-group">
            <input class="btn btn-primary btn-large btn-block" type="submit" value="Ingresar"> 
          </div>
        </form>
		
      </div><!--/.login-->
	  </div>
    </div><!--/.span12-->
  </div><!--/.row-fluid-->
</div><!--/.container-->

    </body>
</html>


