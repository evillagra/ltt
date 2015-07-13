<?php
include ("../librerias.php");


$objOc = new Oc (
		$_POST["txtestado"]
		, $_POST["txtfec"]
		,0
		,0
		, $_POST["txtoc"]
		
);

$objOc->Agregar();


// Se muestra mensaje de exito
echo "Registro Agregado <br/>";
echo "<br/>Estado OC: ".$_POST["txtestado"];
echo "<br/>Fecha OC: ".$_POST["txtfec"];
echo "<br/>Total OC: ".$_POST["txtoc"];

echo "<br /><a href='index.php'>Aceptar</a>";
?>
