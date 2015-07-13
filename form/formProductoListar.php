<?php
$oProducto=new Producto();
?>
<form name="frmdatos" method="post" action="producto_upd.php">
<input type="hidden" name="hidcodigo" id="hidcodigo" value="" />
	<table style="width:700px;">
		<tr>
			<td colspan="5" height="30" valign="middle" align="center" style="color:#ffffff;background-color:#ff5512;">Producto</td>
		</tr>
		<tr style="background-color:#d8d8b1;">
			<td>&nbsp;</td>
			<td>Codigo</td>
			<td>Descripcion</td>
			<td>Cantidad</td>
			<td>Precio</td>
		</tr>
<?php
		While($Registro=$oProducto->Selecciona()){?>
			<tr>
				<td align="center"><a href="#" onclick="<?="javascript:editar(".$Registro->getCodigo().");";?>">Editar</a></td>
				<td><?=$Registro->getCodigo()?></td>
				<td><?=$Registro->getDescripcion()?></td>
				<td><?=$Registro->getCantidad()?></td>
				<td><?=$Registro->getPrecio()?></td>
			</tr>
<?php	}?>
	</table>
</form>