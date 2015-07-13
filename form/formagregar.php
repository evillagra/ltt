<html>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/styles.css">
   <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
   <title>Agregar Usuario</title>
</head>
<body>
<form id="frmdatos" method="post">
	<table width="400">
		<tr>
			<td colspan="3" height="30" valign="middle" align="center" style="color:#ffffff;background-color:navy;">Nuevo Usuario</td>
		</tr>
		<tr>
			<td width="100">Nombre Usuario</td>
			<td width="10" align="center">:</td>
			<td width="290"><input type="text" name="txtnom" id="txtnom" /></td>
		</tr>
		<tr>
			<td width="100">Apellido Usuario</td>
			<td width="10" align="center">:</td>
			<td width="290"><input type="text" name="txtape" id="txtape" /></td>
		</tr>
		<tr>
			<td width="100">Codigo Perfil Usuario</td>
			<td width="10" align="center">:</td>
			<td width="290"><input type="text" name="txtcodper" id="txtcodper" /></td>
		</tr>
		<tr>
			<td width="100">Correo Usuario</td>
			<td width="10" align="center">:</td>
			<td width="290"><input type="email" name="txtcorreo" id="txtcorreo" /></td>
		</tr>
		<tr>
			<td width="100">Edad Usuario</td>
			<td width="10" align="center">:</td>
			<td width="290"><input type="number" name="txtedad" id="txtedad" /></td>
		</tr>
		<tr>
			<td width="100">Fecha Nacimiento Usuario</td>
			<td width="10" align="center">:</td>
			<td width="290"><input type="datetime" name="txtfecha" id="txtfecha" /></td>
		</tr>
		<tr>
			<td width="100">Login Usuario</td>
			<td width="10" align="center">:</td>
			<td width="290"><input type="text" name="txtlog" id="txtlog" /></td>
		</tr>
		<tr>
			<td width="100">Password Usuario</td>
			<td width="10" align="center">:</td>
			<td width="290"><input type="password" name="txtclave" id="txtclave" /></td>
		</tr>		
		<tr>
			<td colspan="3" height="40" valign="bottom" align="center">
				<input type="submit" id="btngrabar" value="Agregar" />
			</td>
		</tr>
		
		<tr>
			<td colspan="3" align="center">
				<div id="divmensaje"></div>
			</td>
		</tr>
	</table>
</form>

<script type="text/javascript">

$(document).ready(function(){
	/*Llamada a PHP para procesar el formulario*/
	$("#btngrabar").click(function(){
		var svarform = $("#frmdatos").serialize();		
			/*Llamada a metodo JQUERY:AJAX para procesor el formulario*/
			$.ajax({
				  method: "POST",
				  url: "accform/accUsuarioAgregar.php",
				  data: svarform,
				  success: function(result){
					  $("#divmensaje").html(result);
					  $("#txtnom").value = '';
					  $("#txtape").value = '';
					  $("#txtcodper").value = 0;	
					  $("#txtcorreo").value = '';	
					  $("#txtedad").value = '';	
					  $("#txtfecha").value = '';	
					  $("#txtlog").value = '';	
					  $("#txtclave").value = '';					  
		    		}
				});
			/*Detiene la ejecución del envio del formulario*/
			return false;
			});	
	});

</script>

</body>
</html>