<?php
$this->pageCaption='Actualizar TablasISR '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Tablas Isr'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Tablas Isr', 'url'=>array('index')),
	array('label'=>'Crear TablasISR', 'url'=>array('create')),
	array('label'=>'Ver TablasISR', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Tablas Isr', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>