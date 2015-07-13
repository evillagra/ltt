<?php
$oOc=new Oc();
?>
<form name="frmdatos" method="post" action="Oc_upd.php">
<input type="hidden" name="hidcodigo" id="hidcodigo" value="" />
	<table style="width:700px;">
		<tr>
			<td colspan="5" height="30" valign="middle" align="center" style="color:#ffffff;background-color:#ff5512;">Orden de Compra</td>
		</tr>
		<tr style="background-color:#d8d8b1;">
			<td>Estado</td>
			<td>Fecha</td>
			<td>nbsp;</td>
			<td>nbsp;</td>
			<td>Total</td>
		</tr>
<?php
		While($Registro=$oOc->Selecciona()){?>
			<tr>
				<td><?=$Registro->getEstado()?></td>
				<td><?=$Registro->getFechaemi()?></td>
				<td align="center"><a href="#" onclick="<?="javascript:editar(".$Registro->getIdoc().");";?>">Editar</a></td>
				<td align="center"><a href="#" onclick="<?="javascript:editar(".$Registro->getIduser().");";?>">Editar</a></td>
				<td><?=$Registro->getStot()?></td>				
			</tr>
<?php	}?>
	</table>
</form>