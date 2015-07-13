<?php
include ("../librerias.php");

// Se crea objeto producto con la informacion del formulario y se agrega a bd
$objOc = new Oc ($_POST["txtestado"],
		 	$_POST["txtfec"]
		, $_POST["hidid"]
		, $_POST["hidid2"]
		, $_POST["txtoc"]
);

$objOc->Actualizar();


// Se muestra mensaje de exito
echo "Registro Actualizado <br/>";
echo "<br/>Id: ".$_POST["hidid"];
echo "<br/>Estado : ".$_POST["txtdescripcion"];


echo "<br /><a href='Oc_lst.php'>Aceptar</a>";
?>
