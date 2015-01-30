<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'tabla-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'asistencia_did'); ?>">
		<?php echo $form->labelEx($model,'asistencia_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'asistencia_did',CHtml::listData(Asistencia::model()->findAll(), 'id', 'horario_did')); ?>			<?php echo $form->error($model,'asistencia_did'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'nombre'); ?>">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'direccion'); ?>">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'direccion'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'fecha_f'); ?>">
		<?php echo $form->labelEx($model,'fecha_f'); ?>
		<div class="input">
			
			<?php
					if ($model->fecha_f!='') 
						$model->fecha_f=date('d-m-Y',strtotime($model->fecha_f));
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

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
