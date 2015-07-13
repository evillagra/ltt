<?php
	include ('librerias.php');
	session_start();
?>
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/styles.css">
   <script src="js/jquery-latest.min.js" type="text/javascript"></script>
   <title>Aqui tenemos un mundo, LO TENEMOS TODO </title>
</head>
<body>
<?php
/*
 * Verificación del usuario y clave
* */
if (!isset($_SESSION["oUsuario"])){?>
	<div style="text-align: center">
	<h2><img src="img/LTT.JPG" alt="Logo LTT" width="225" height="59"><br/></h2>
<?php
	include('form/formlogin.php');?>
	</div>
<?php
} else {
	include('menu.php');
	$oUsr=$_SESSION["oUsuario"];
?>
Bienvenido Usuario: <?=$oUsr->getNombre_usuario();?><a href="  logout.php"><br/>Salir</a>
<?php }?>
</body>
</html>
