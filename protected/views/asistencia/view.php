<?php
$this->pageCaption='Ver Asistencia #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Asistencia'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Asistencia', 'url'=>array('index')),
	array('label'=>'Crear Asistencia', 'url'=>array('create')),
	array('label'=>'Actualizar Asistencia', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Asistencia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Asistencia', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		array(	'name'=>'materiaMaestro_did',
		        'value'=>$model->materiaMaestro->nombre,),
		array(	'name'=>'horario_did',
		        'value'=>$model->horario->nombre,),
		'dia',
		'fecha_f',
		'horasPagadas',
		'horasDescontadas',
		array(	'name'=>'estatus_did',
		        'value'=>$model->estatus->nombre,),
		'fechaCreacion_f',
	),
)); ?>
