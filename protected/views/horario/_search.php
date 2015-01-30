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
		<?php echo $form->label($model,'materiaMaestro_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,"materiaMaestro_did",CHtml::listData(Maestro::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'dia'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'dia',array('size'=>10,'maxlength'=>10)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'horaInicio'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'horaInicio'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'horaFin'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'horaFin'); ?>
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
