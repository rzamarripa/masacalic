<?php
$this->pageCaption='Ver Tabla #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Tabla'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Tabla', 'url'=>array('index')),
	array('label'=>'Crear Tabla', 'url'=>array('create')),
	array('label'=>'Actualizar Tabla', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Tabla', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Tabla', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		array(	'name'=>'asistencia_did',
		        'value'=>$model->asistencia->horario_did,),
		'nombre',
		'direccion',
		'fecha_f',
	),
)); ?>
