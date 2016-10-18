<?php
/* 
 * Pagina asegurada
 */
require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Ferremaq</title>	
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="jquery.autocomplete.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	<script>
	$(document).ready(function(){
	 $("#tag").autocomplete("autocomplete.php", {
			selectFirst: true
		});
	});
	</script>
	
	<script src="js/ajax.js"></script>
	<script>
	function myFunction(){
	var n=document.getElementById('bus').value;
	if(n==''){
	document.getElementById("myDiv").innerHTML="";
	document.getElementById("myDiv").style.border="0px";
	document.getElementById("pers").innerHTML="";
	return;
	}
	loadDoc("q="+n,"proc.php",function(){
	if (xmlhttp.readyState==4 && xmlhttp.status==200){
	document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
	document.getElementById("myDiv").style.border="1px solid #000000"; 
	}else{ document.getElementById("myDiv").innerHTML='<img src="img/load.gif" width="50" height="50" />'; }
	});
	}
	//-------------------------------
	function myFunction2(codcliente){
	document.getElementById("myDiv").innerHTML="";
	document.getElementById("myDiv").style.border="0px";
	loadDoc("vcod="+codcliente,"proc2.php",function(){
	if (xmlhttp.readyState==4 && xmlhttp.status==200){
	document.getElementById("pers").innerHTML=xmlhttp.responseText;
	}else{ document.getElementById("pers").innerHTML='<img src="load.gif" width="50" height="50" />'; }
	});
	}
	</script>
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
		 <div class="panel-heading"><h2>Clientes</h2></div>
		  <div class="panel-body">		 
		  <a href="create.php"><img src="img/nuevocliente.png"></a>
			<br>
			<label for="inputPassword" class="control-label">Nuevo Cliente</label>	
			
			<br><br>
			<div class="well">
				<div class="form-group">				
					<div class="row">
						<div class="col-xs-3">
							
						</div>	
						<div class="col-xs-5">
							<label for="inputPassword" class="control-label col-xs-4">Cliente: </label>							
							<input type="email" class="form-control" id="bus" placeholder="Nombre y apellido" onkeyup="myFunction()">
							<div id="myDiv">
							</div>	
						</div>
					</div>				
					<br>
					<div id="pers">
					</div>
				</div>	
				<a href="index.php" class="btn btn-primary">Volver al menú</a>	
		  </div>
		  <?php 
			include 'pie.php';
			?>
		</div>				
			</div>
    </div> <!-- /container -->
  </body>
</html>
