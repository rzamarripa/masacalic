<?php
	$c=0;
	$hoy = constant("Dias::" . date("l"));
	$materiasHoy = array();
	foreach($relaciones as $relacion)
	{
		$horarioHoy = Horario::model()->findAll("estatus_did = 1 && materiaMaestro_did = " . $relacion->id);
		
		if(count($horarioHoy)>0){
			foreach($horarioHoy as $horario)
			{
				if($horario->dia == $hoy)
				{
					array_push($materiasHoy, array(	"id" => $horario->id, 
													"relacion" => $horario->materiaMaestro->id,
													"matid" => $horario->materiaMaestro->materia->id,
													"materia" => $horario->materiaMaestro->materia->nombre, 
													"dia" => $horario->dia, 
													"horaInicio" => $horario->horaInicio, 
													"horaFin" => $horario->horaFin));
				}				
			}
		}		
	}
	/*
echo '<pre>';print_r($materiasHoy); echo "</pre>";	
	exit;
*/
?>
<table class="table table-striped table-bordered" style="font-size:14pt;">
	<thead class="thead">
		<tr>
			<td style="text-align:center"><strong>No.</strong></td>
			<?php /* <td style="text-align:center"><strong>Relación</strong></td>
			<td style="text-align:center"><strong>Código</strong></td> */ ?>
			<td style="text-align:center"><strong>Materia</strong></td>
			<td style="text-align:center"><strong>Día</strong></td>
			<td style="text-align:center"><strong>Hora de Inicio</strong></td>
			<td style="text-align:center"><strong>Hora de Término</strong></td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($materiasHoy as $materia){ $c++;?>
		<tr>
			<td style="text-align:center"><?php echo $c;?></td>	
			<?php /* <td><?php echo $materia["relacion"];?></td>			
			<td><?php echo $materia["matid"];?></td>	 */ ?>		
			<td><?php echo $materia["materia"];?></td>			
			<td style="text-align:center"><?php echo $materia["dia"];?></td>
			<td style="text-align:center"><?php echo $materia["horaInicio"];?></td>			
			<td style="text-align:center"><?php echo $materia["horaFin"];?></td>			
			<td style="text-align:center"><?php echo CHtml::link('Presente',array('asistencia/create', 'horario'=>$materia["id"], 'mm'=>$materia["relacion"], 'dia'=>$materia["dia"], 'horaInicio' => $materia["horaInicio"], 'horaFin' => $materia["horaFin"]), array("class"=>"btn btn-success")); ?></td>			
		</tr>
		<?php } ?>
	</tbody>
</table>