<?php
$this->pageCaption='Crear Horario';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo horario';
$this->breadcrumbs=array(
	'Horario'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('ver','mm'=>$_GET["mm"])),
	array('label'=>'Administrar Horario', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>