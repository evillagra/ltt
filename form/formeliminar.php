<?php
$oUsuario=new Usuario();
?>
<form method="post" action="accform/accUsuarioEliminar.php">
<?php
While($Registro=$oUsuario->Selecciona()){

?>
<input type="checkbox" name=elimina<?=$Registro->getId_usuario()?> value="<?=$Registro->getId_usuario()?>">
<?=$Registro->getId_usuario()?>/<?=$Registro->getApellido_usuario()?>
<br>
<?php
}

?>
<input type="submit" value="Eliminar">
</form>