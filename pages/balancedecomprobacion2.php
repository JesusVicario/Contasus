<?php  
$valor = $_GET["v"];
$valor2 = 1;
$debe = 0;
$haber = 0;
$saldodeudor = 0;
$saldoacreedor = 0;
	?>
	<table style="border: 1px solid black">
		 <tr>
			<td style="text-align: center;">Sumas del debe</td>
			<td style="text-align: center;">Sumas del haber</td>
			<td style="text-align: center;">Saldo deudor</td>
			<td style="text-align: center;">Saldo acreedor</td>
		</tr>
	<?php 
		while ($valor2 <= $valor) {
			?>
			<tr>
				<td><input style="width: 20vw;text-align: center;" type="number" id='<?php echo "debe" . $debe++ ?>' placeholder="0" value=""></td>
				<td><input style="width: 20vw;text-align: center;" type="number" id='<?php echo "haber" . $haber++ ?>' placeholder="0" value=""></td>
				<td><input style="width: 20vw;text-align: center;border-radius: 15px;" type="number" step="0.01" id="<?php echo "saldodeudor" . $saldodeudor++ ?>" value="" disabled></td>
				<td><input style="width: 20vw;text-align: center;border-radius: 15px;" type="number" step="0.01" id="<?php echo "saldoacreedor" . $saldoacreedor++ ?>" value="" disabled></td>
			</tr>
			<?php
			$valor2++;
		}
		?>
		<tr>
			<td><input style="width: 20vw;text-align: center;border-radius: 15px;" type="number" step="0.01" id="sumasdebe" value="" disabled></td>
			<td><input style="width: 20vw;text-align: center;border-radius: 15px;" type="number" step="0.01" id="sumashaber" value="" disabled></td>
			<td><input style="width: 20vw;text-align: center;border-radius: 15px;" type="number" step="0.01" id="saldodeudor" value="" disabled></td>
			<td><input style="width: 20vw;text-align: center;border-radius: 15px;" type="number" step="0.01" id="saldoacreedor" value="" disabled></td>
		</tr>
	</table>
	<button id="botonbalance" onclick="calcular()">Calcular</button>