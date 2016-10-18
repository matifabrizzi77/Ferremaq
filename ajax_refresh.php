<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=ferremaqonline_dbferremaq', 'ferremaqonline', 'central2447', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT * FROM clientes WHERE nombreapellido LIKE (:keyword) ORDER BY codcliente ASC LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	// put in bold the written text
	$nombreapellido = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', '<b>'.$rs['nombreapellido'].'</b>');
	// add new option
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs[0]).'\')">'.$nombreapellido.'</li>';
}
?>