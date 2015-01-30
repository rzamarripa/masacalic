<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'tablas-isr-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'tarifa'); ?>">
		<?php echo $form->labelEx($model,'tarifa'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'tarifa',array('size'=>10,'maxlength'=>10)); ?>
			<?php echo $form->error($model,'tarifa'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'limiteInferior'); ?>">
		<?php echo $form->labelEx($model,'limiteInferior'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'limiteInferior'); ?>
			<?php echo $form->error($model,'limiteInferior'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'limiteSuperior'); ?>">
		<?php echo $form->labelEx($model,'limiteSuperior'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'limiteSuperior'); ?>
			<?php echo $form->error($model,'limiteSuperior'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'cuotaFija'); ?>">
		<?php echo $form->labelEx($model,'cuotaFija'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'cuotaFija'); ?>
			<?php echo $form->error($model,'cuotaFija'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'tasa'); ?>">
		<?php echo $form->labelEx($model,'tasa'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'tasa'); ?>
			<?php echo $form->error($model,'tasa'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'estatus_did'); ?>">
		<?php echo $form->labelEx($model,'estatus_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'estatus_did',CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'estatus_did'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
