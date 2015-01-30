<?php
	$this->pageCaption='Calcular honorario maestros';
	$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
	$this->pageDescription='';
	
    $this->breadcrumbs=array(
		'Inicio',
	);
?>
<div class="row">
	<div class="span12">
		<?php 
		$form = $this->beginWidget('ext.bootstrap-theme.widgets.TbActiveForm', array(
			'id'=>'horizontalForm',
			'type'=>'horizontal',
		));
		?>
		<div class="row">
			<div class="span3 offset3">
				<label for="fechaInicio">Fecha Inicial</label>
				<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		            'name'=>'fechaInicio',
		            'value'=>date('Y-m-d'),
		            'htmlOptions'=>array(  
		                'id'=>'fechaInicio',
		            ),
		            'options'=>array(
		                'dateFormat'=>'yy-mm-dd',               
		            )
		        ));
		        ?>
			</div>
			<div class="span3">
				<label for="fechaFin">Fecha Final</label>
				<?php
		        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		            'name'=>'fechaFin',
		            'value'=>date('Y-m-d'),
		            'htmlOptions'=>array(  
		                'id'=>'fechaFin',
		            ),
		            'options'=>array(
		                'dateFormat'=>'yy-mm-dd',                
		            )
		        ));?>
			</div>
			<div class="span3">
		        <?php 
					echo CHtml::ajaxSubmitButton(
							'Filtrar',
							array('asistencia/calcular'),
							array('update'=>'#horasCalculadas'),
							array('id'=>'botonCalcular', 'class'=>'btn btn-success btn-large')
					);
					
					$this->endWidget(); 
				?>
			</div>
		</div>	
	</div>
</div>
<div class="row">
	<div class="span12" id="horasCalculadas">
		
	</div>
</div>