<?php
$this->pageCaption='Actualizar Horario '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Horario'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Horario', 'url'=>array('index')),
	array('label'=>'Crear Horario', 'url'=>array('create')),
	array('label'=>'Ver Horario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Horario', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>