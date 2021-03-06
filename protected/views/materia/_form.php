<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'materia-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'nombre'); ?>">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'licenciatura_aid'); ?>">
		<?php echo $form->labelEx($model,'licenciatura_aid'); ?>
		<div class="input">
			
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>$model, 
					      'attribute'=>'licenciatura_aid', 
					      'sourceUrl'=>Yii::app()->createUrl('licenciatura/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'licenciatura', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display
					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>			
			<?php echo $form->error($model,'licenciatura_aid'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'cantidad_planeaciones'); ?>">
		<?php echo $form->labelEx($model,'cantidad_planeaciones'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'cantidad_planeaciones'); ?>
			<?php echo $form->error($model,'cantidad_planeaciones'); ?>
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
