	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->materiaMaestro->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->dia); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->horaInicio); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->horaFin); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
	</tr>