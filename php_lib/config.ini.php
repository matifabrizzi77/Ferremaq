<?php
/* 
 * Configuración general: conexión a la base de datos y otro parámetros
 */

define('SERVIDOR_MYSQL','localhost'); //servidor de la base de datos
define('USUARIO_MYSQL','ferremaqonline'); //usuario de la base de datos
define('PASSWORD_MYSQL','central2447'); //la clave para conectar
define('BASE_DATOS','ferremaqonline_dbferremaq'); // indica el nombre de la base de datos que contiene la tabla de los usuarios

define('TABLA_DATOS_LOGIN','usuarios'); //nombre de la tabla usarios
define('CAMPO_USUARIO_LOGIN','usuario'); //campo que contiene los datos de los usuarios (se puede usar el email)
define('CAMPO_CLAVE_LOGIN','password'); //campo que contiene la contraseña

define('METODO_ENCRIPTACION_CLAVE','texto'); //método utilizado para almacenar la contraseña encriptada. Opciones: sha1, md5, o texto


?>
