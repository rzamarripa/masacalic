<?php
$this->pageCaption='Ver Horario #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Horario'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Horario', 'url'=>array('index')),
	array('label'=>'Crear Horario', 'url'=>array('create')),
	array('label'=>'Actualizar Horario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Horario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Horario', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		array(	'name'=>'Materia',
		        'value'=>$model->materiaMaestro->materia->nombre,),
		array(	'name'=>'Maestro',
		        'value'=>$model->materiaMaestro->maestro->nombre,),
		'dia',
		'horaInicio',
		'horaFin',
		array(	'name'=>'estatus_did',
		        'value'=>$model->estatus->nombre,),
	),
)); ?>
