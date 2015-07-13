<?php
include ("../librerias.php");


$objProducto = new Producto (0,
		$_POST["txtdescripcion"]
		, $_POST["txtcantidad"]
		, $_POST["txtprecio"]
		
);

$objProducto->Agregar();


// Se muestra mensaje de exito
echo "Registro Agregado <br/>";
echo "<br/>Descripci&oacute;n: ".$_POST["txtdescripcion"];
echo "<br/>Canti&oacute;n: ".$_POST["txtcantidad"];
echo "<br/>Preci&iacute;s: ".$_POST["txtprecio"];

echo "<br /><a href='index.php'>Aceptar</a>";
?>
