	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->materiaMaestro->maestro->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->horario->dia); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->dia); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fecha_f); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->horasPagadas); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->horasDescontadas); ?>
		</td>
		<?php /*
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fechaCreacion_f); ?>
		</td>
		*/ ?>
	</tr>