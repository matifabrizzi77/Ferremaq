<!DOCTYPE html>
<html lang="en">
<head>
<title>Example of Bootstrap 3 Modals</title>
        <link   href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

		<script src="http://code.jquery.com/jquery-migrate-1.1.0.js"></script>
        <script src="js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>

<style type="text/css">
#chosenForm .chosen-choices {
    border: 1px solid #ccc;
    border-radius: 4px;
    min-height: 34px;
    padding: 6px 12px;
}
#chosenForm .chosenContainer .form-control-feedback {
    /* Adjust feedback icon position */
    right: -15px;
}
</style>
	
<script>
$(document).ready(function() {
    $('#chosenForm')
        .find('[name="modelos"]')
            .chosen({
                width: '100%'
            })
            // Revalidate the color when it is changed
            .change(function(e) {
                $('#chosenForm').formValidation('revalidateField', 'modelos');
            })
            .end()
        .formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                modelos: {
                    validators: {
                        callback: {
                            message: 'Please choose 2-4 color you like most',
                            callback: function(value, validator, $field) {
                                // Get the selected options
                                var options = validator.getFieldElements('modelos').val();
                                return (options != null && options.length >= 2 && options.length <= 4);
                            }
                        }
                    }
                }
            }
        });
});
</script>
	
</head>
<body>
<form id="chosenForm" class="form-horizontal">	
        
		<div class="form-group">
			<label for="inputPassword" class="control-label col-xs-3" action="nuevoservicio.php" method="post">Modelo: </label>
			<div class="col-xs-5 chosenContainer">			
			
			<?php
				$conexion = new mysqli("localhost", "ferremaqonline", "central2447", "ferremaqonline_dbferremaq", 3306);
				$sql = "select codmodelo, descmodelo from modelos";
				$result = $conexion->query($sql);
				$option = '<option value="0"> Elige una opcion</option>';
				while ($fila = $result->fetch_array()) {
					$option.='<option value="' . $fila["codmodelo"] . '">' . $fila["descmodelo"] . '</option>';
				}
			?>
			<div>
				<select class="form-control chosen-select" name="modelos" class="form-control" id="sel1" multiple data-placeholder="Choose 2-4 modelos" style="width: 100%;">
					<?php
					echo $option;
					?>
				</select>  
			</div>

			</div>		
        </div>

 
</form>
</body>
</html>                                		