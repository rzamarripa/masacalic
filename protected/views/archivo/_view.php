	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->descripcion); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->maestro->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->materia->nombre); ?>
		</td>
	</tr>