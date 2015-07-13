<?php
include("../librerias.php");

$objUsuario = new Usuario(
		$_POST["txtape"]
		, $_POST["txtcodper"]
		, $_POST["txtcorreo"]
		, $_POST["txtedad"]
		, $_POST["txtfecha"]
		, 0
		, $_POST["txtlog"]
		, $_POST["txtnom"]
		, md5($_POST["txtclave"]));

$objUsuario->Agregar();

echo "Registro Agregado <br/>";
echo "<br/>Usuario: ".$_POST["txtnom"];
echo "<br/>Nombre: ".$_POST["txtape"];

echo "<br /><a href='/Lotenemostodo/index.php'>Aceptar</a>";
?>