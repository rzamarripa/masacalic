<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'horario-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'dia'); ?>">
		<?php echo $form->labelEx($model,'dia'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'dia',array('Lunes'=>'Lunes','Martes'=>'Martes','Miércoles'=>'Miércoles','Jueves'=>'Jueves','Viernes'=>'Viernes','Sábado'=>'Sábado')); ?>
			<?php echo $form->error($model,'dia'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'horaInicio'); ?>">
		<?php echo $form->labelEx($model,'horaInicio'); ?>
		<div class="input">
			<?php 
				$this->widget('ext.clockpick.ClockPick', array(
			            'id'=>'horaInicio',
			            'model'=>$model,
			            'name'=>'horaInicio',
			            'options'=>array(
			                'starthour'=>7,
			                'endhour'=>13,
			                'event'=>'click',
			                'showminutes'=>false,
			                'minutedivisions'=>4,
			                'military' =>true,
			                'layout'=>'vertical',
			                'hoursopacity'=>1,
			                'minutesopacity'=>1,
			            ),
			        ));
			?>			
			<?php echo $form->error($model,'horaInicio'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'horaFin'); ?>">
		<?php echo $form->labelEx($model,'horaFin'); ?>
		<div class="input">
			
			<?php 
				$this->widget('ext.clockpick.ClockPick', array(
			            'id'=>'horaFin',
			            'model'=>$model,
			            'name'=>'horaFin',
			            'options'=>array(
			                'starthour'=>7,
			                'endhour'=>13,
			                'event'=>'click',
			                'showminutes'=>false,
			                'minutedivisions'=>4,
			                'military' =>true,
			                'layout'=>'vertical',
			                'hoursopacity'=>1,
			                'minutesopacity'=>1,
			            ),
			        ));
			?>
			<?php echo $form->error($model,'horaFin'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'estatus_did'); ?>">
		<?php echo $form->labelEx($model,'estatus_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'estatus_did',CHtml::listData(Estatus::model()->findAll("horario is not null"), 'id', 'horario')); ?>			<?php echo $form->error($model,'estatus_did'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
