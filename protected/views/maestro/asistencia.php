<?php
date_default_timezone_set("America/Mazatlan");
$this->pageCaption='Asistencia Maestro';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$maestros = Maestro::model()->findAll();
$nombreMaestros = array();
foreach($maestros as $maestro)
	array_push($nombreMaestros,$maestro->id . '-' . $maestro->nombre);
//echo '<pre>';print_r($nombreMaestros); echo "</pre>";
//exit;
?>
<div class="row" style="text-align:center;margin-top:30px;">
	<div class="span12">
		<img src=<?php echo Yii::app()->baseUrl . "/images/logouss.png"; ?> alt="logoUSS" width="200" height="200">
	</div>
</div>
<div class="row" style="text-align:center; padding-top:20px;">
	<div class="span12">
		<?php 
			$form=$this->beginWidget('BActiveForm', array(
				'id'=>'asistencia-form',
				'enableAjaxValidation'=>false,
			)); 
		?>		
		<div>		
			<?php $this->widget('TbTypeahead', array(
			    'name'=>'maestro',
			    'options'=>array(
			        'source'=>$nombreMaestros,
			        'items'=>4,
			        'matcher'=>"js:function(item) {
			            return ~item.toLowerCase().indexOf(this.query.toLowerCase());
			        }",
			    ),
			    'htmlOptions'=>array(			    	
			    	'style'=>'	width: 600px;
			    					onkeydown="return checkEnter(event);
			    					text-align:center;			    					
									padding-left: 40px;
									padding-right: 20px;
									height: 30px;
									font-size: 18pt;
									font-family: Arial, Helvetica, sans-serif;',
			    	'placeholder' => 'Escriba su nombre',
			    	'autocomplete' => 'off',
			    ),			    
			)); ?>
		</div>
		<div style="text-align:center; padding-top:20px;">
			<?php 
					echo CHtml::ajaxSubmitButton(
							'Buscar',
							array('maestro/updatematerias'),
							array(
								'update'=>'#materias',
							),
					array('id'=>'botonBuscar', 'class'=>'btn btn-success btn-large'));
			?>
		</div>
		<?php $this->endWidget(); ?>

	</div>
</div>
<div class="row">
	<div id="materias" class="span12"></div>
</div>
