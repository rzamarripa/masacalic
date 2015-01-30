<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'id'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'id',array('size'=>11,'maxlength'=>11)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'tarifa'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'tarifa',array('size'=>10,'maxlength'=>10)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'limiteInferior'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'limiteInferior'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'limiteSuperior'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'limiteSuperior'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'cuotaFija'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'cuotaFija'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'tasa'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'tasa'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'estatus_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,estatus_did,CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
