<?php
$this->pageCaption='Actualizar Asistencia '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Asistencia'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Asistencia', 'url'=>array('index')),
	array('label'=>'Crear Asistencia', 'url'=>array('create')),
	array('label'=>'Ver Asistencia', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Asistencia', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>