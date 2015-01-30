<?php
$this->pageCaption='Create Asistencia';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo asistencia';
$this->breadcrumbs=array(
	'Asistencia'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Asistencia', 'url'=>array('index')),
	array('label'=>'Administrar Asistencia', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>