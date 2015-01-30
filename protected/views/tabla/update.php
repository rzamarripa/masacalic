<?php
$this->pageCaption='Actualizar Tabla '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Tabla'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Tabla', 'url'=>array('index')),
	array('label'=>'Crear Tabla', 'url'=>array('create')),
	array('label'=>'Ver Tabla', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Tabla', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>