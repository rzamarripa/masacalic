<?php
$this->pageCaption='Ver TablasISR #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Tablas Isr'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Tablas Isr', 'url'=>array('index')),
	array('label'=>'Crear TablasISR', 'url'=>array('create')),
	array('label'=>'Actualizar TablasISR', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar TablasISR', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Tablas Isr', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		'tarifa',
		'limiteInferior',
		'limiteSuperior',
		'cuotaFija',
		'tasa',
		array(	'name'=>'estatus_did',
		        'value'=>$model->estatus->nombre,),
	),
)); ?>
