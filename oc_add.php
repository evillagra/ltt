<?php include('valida_acceso.php');?>
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/styles.css">
   <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
   <title>Agregar OC</title>
</head>
<body>
<?php 
	include('menu.php');
?>
<div style="text-align: center;width:100%">
	<br/>
	<form id="frmdatos" method="post">
		<table style="width:400px;">
			<tr>
				<td colspan="3" height="30" valign="middle" align="center" style="color:#ffffff;background-color:#ff5512;">Nueva OC</td>
			</tr>
			<tr>
				<td width="100">Estado</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtestado" id="txtestado" /></td>
			</tr>
			<tr>
				<td width="100">Fecha Emision</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="datetime" name="txtfec" id="txtfec" /></td>
			</tr>
			<tr>
				<td width="100">Total OC</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtoc" id="txtoc" /></td>
			</tr>
			<tr>
				<td colspan="3" height="40" valign="bottom" align="center">
					<input type="submit" id="btngrabar" value="Guardar" />
				</td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<div id="divmensaje"></div>
				</td>
			</tr>
		</table>
	</form>
</div>

<script type="text/javascript">

$(document).ready(function(){
	/*Llamada a PHP para procesar el formulario*/
	$("#btngrabar").click(function(){
		var svarform = $("#frmdatos").serialize();		
			/*Llamada a metodo JQUERY:AJAX para procesor el formulario*/
			$.ajax({
				  method: "POST",
				  url: "accform/accOcAgregar.php",
				  data: svarform,
				  success: function(result){
					  $("#divmensaje").html(result);
					  $("#txtestado").value = '';
					  $("#txtfec").value = '';
					  $("#").value = '';
					  $("#").value = '';
					  $("#txtoc").value = '';
		    		}
				});
			/*Detiene la ejecución del envio del formulario*/
			return false;
			});	
	});

</script>

</body>
</html>
