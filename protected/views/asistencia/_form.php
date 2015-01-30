<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'asistencia-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'fecha_f'); ?>">
		<?php echo $form->labelEx($model,'fecha_f'); ?>
		<div class="input">

			<?php
					if ($model->fecha_f!='')
						$model->fecha_f=date('Y-m-d',strtotime($model->fecha_f));
					$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					                                       'model'=>$model,
					                                       'attribute'=>'fecha_f',
					                                       'value'=>$model->fecha_f,
					                                       'language' => 'es',
					                                       'htmlOptions' => array('readonly'=>"readonly"),
					                                       'options'=>array(
					                                               'autoSize'=>true,
					                                               'defaultDate'=>$model->fecha_f,
					                                               'dateFormat'=>'yy-mm-dd',
					                                               'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
					                                               'buttonImageOnly'=>true,
					                                               'buttonText'=>'Fecha',
					                                               'selectOtherMonths'=>true,
					                                               'showAnim'=>'slide',
					                                               'showButtonPanel'=>true,
					                                               'showOn'=>'button',
					                                               'showOtherMonths'=>true,
					                                               'changeMonth' => 'true',
					                                               'changeYear' => 'true',
					                                               'minDate'=>"-70Y", //fecha minima
					                                               'maxDate'=> "+10Y", //fecha maxima
					                                       ),)); ?>			<?php echo $form->error($model,'fecha_f'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'horasPagadas'); ?>">
		<?php echo $form->labelEx($model,'horasPagadas'); ?>
		<div class="input">

			<?php echo $form->textField($model,'horasPagadas'); ?>
			<?php echo $form->error($model,'horasPagadas'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'horasDescontadas'); ?>">
		<?php echo $form->labelEx($model,'horasDescontadas'); ?>
		<div class="input">

			<?php echo $form->textField($model,'horasDescontadas'); ?>
			<?php echo $form->error($model,'horasDescontadas'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
