<?php
	$c = 0;
	$temp = array();
	$pagoTotal = 0;
	$hayMas = false;
?>
<form action="/planeaciones/index.php/asistencia/ficheroexcel" method="post" target="_blank" id="FormularioExportacion">
	<button class="btn btn-success btn-large botonExcel">Exportar a Excel</button>
	<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" value="<?php echo $maestrosHorarios; ?>" />
</form>
<table id="Exportar_a_Excel" class="table table-striped table-bordered">
	<thead class="thead">
		<tr>
			<td style="text-align:center; width:50px;"><strong>No.</strong></td>
			<td style="text-align:center;"><strong>Maestro</strong></td>
			<td style="text-align:center; width:80px;"><strong>Costo</strong></td>
			<td style="text-align:center; width:80px;"><strong>Horas cumplidas</strong></td>
			<td colspan="2" style="text-align:center; width:80px;"><strong>Retardos</strong></td>
			<td style="text-align:center; width:80px;"><strong>Horas perdidas</strong></td>
			<td style="text-align:center;  width:80px;"><strong>Total</strong></td>
			<td style="text-align:center;  width:80px;"><strong>Total combinado</strong></td>
			<td style="text-align:center;  width:80px;"><strong></strong></td>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach($maestrosHorarios as $maestroHoras){
				$c++;
				if(count($temp) > 0){
					if($temp["Maestro"] == $maestroHoras["Maestro"]){
						$pagoTotal = $temp["pago"] + $maestroHoras["pago"];
						$hayMas = true;
					}
					else{
						$pagoTotal = $maestroHoras["pago"];
						$temp = null;
						$hayMas = false;
					}
				}
				else{
					$pagoTotal = $maestroHoras["pago"];
					$temp = null;
					$hayMas = false;
				}
		?>
				<tr>
					<td style="text-align:center"><?php echo $c;?></td>
					<td>
						<?php echo CHtml::link($maestroHoras["Maestro"],array("maestro/verasistencias",'matmaes'=>$maestroHoras["id"]));?>
					</td>
					<td style="text-align:center"><?php echo '$' .$maestroHoras["costo"];?></td>
					<td style="text-align:center"><?php echo $maestroHoras["cumplidas"];?></td>
					<td style="text-align:center; width:40px;"><?php echo 'R: ' . $maestroHoras["retardo"];?></td>
					<td style="text-align:center; width:40px;">
						<?php echo 'D: ' . $maestroHoras["descontadasPorRetardo"]; ?>
					</td>
					<td style="text-align:center"><?php echo $maestroHoras["descontadas"];?></td>
					<td style="text-align:right"><?php echo '$' . $maestroHoras["pago"];?></td>
					<td style="text-align:right; vertical-align:middle">
						<?php echo ($hayMas == false) ? "" : "$" . $pagoTotal?>
					</td>
					<td style="text-align:right; vertical-align:middle">
						<?php
							$str = serialize($maestroHoras);
							echo CHtml::link('Imprimir',array('asistencia/imprimirrecibo','id'=>$maestroHoras["id"], 'info'=>$str, 'fechaInicial'=>$fechaInicial, 'fechaFinal'=>$fechaFinal)); ?>
					</td>
				</tr>
		<?php
			$temp = $maestroHoras;
			}
		?>
	</tbody>
</table>
<script language="javascript">
	$(document).ready(function() {
	     $(".botonExcel").click(function(event) {
	     $("#datos_a_enviar").val( $("<div>").append($("#Exportar_a_Excel").eq(0).clone()).html());
	     $("#FormularioExportacion").submit();
		 });
	});
</script>