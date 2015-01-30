	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->tarifa); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->limiteInferior); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->limiteSuperior); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->cuotaFija); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->tasa); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
	</tr>