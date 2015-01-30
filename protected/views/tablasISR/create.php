<?php
$this->pageCaption='Create TablasISR';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo tablasisr';
$this->breadcrumbs=array(
	'Tablas Isr'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Tablas Isr', 'url'=>array('index')),
	array('label'=>'Administrar Tablas Isr', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>