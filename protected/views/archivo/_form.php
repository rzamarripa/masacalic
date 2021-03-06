<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'archivo-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>
	
	
	<?php echo $form->errorSummary($model); ?>
<!--
	<div class="<?php echo $form->fieldClass($model, 'nombre'); ?>">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>
-->


	
	<div class="<?php echo $form->fieldClass($model, 'maestro_did'); ?>">
		<?php echo $form->labelEx($model,'maestro_did'); ?>
		<div class="input">
			
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>$model, 
					      'attribute'=>'maestro_did', 
					      'sourceUrl'=>Yii::app()->createUrl('maestro/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'maestro', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display

					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>			<?php echo $form->error($model,'maestro_did'); ?>
		</div>
	</div>
	
	<div class="<?php echo $form->fieldClass($model, 'materia_did'); ?>">
		<?php echo $form->labelEx($model,'materia_did'); ?>
		<div class="input">
			
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>$model, 
					      'attribute'=>'materia_did', 
					      'sourceUrl'=>Yii::app()->createUrl('materia/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'materia', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display

					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>			<?php echo $form->error($model,'materia_did'); ?>
		</div>
	</div>
	
	<div class="<?php echo $form->fieldClass($up, 'arch'); ?>">
		<?php echo $form->labelEx($up,'archivo'); ?>
		<div class="input">
			<?php echo $form->FileField($up,'arch'); ?>
			<?php echo $form->error($up,'arch'); ?>
		</div>
	</div>
	
	<div class="<?php echo $form->fieldClass($model, 'descripcion'); ?>">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'descripcion',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'descripcion'); ?>
		</div>
	</div>
	
	<div class="<?php echo $form->fieldClass($model, 'estatus_did'); ?>">
		<?php echo $form->labelEx($model,'estatus_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'estatus_did',CHtml::listData(Estatus::model()->findAll('tipoUsuario_did = 2'), 'id', 'nombre')); ?>			<?php echo $form->error($model,'estatus_did'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
