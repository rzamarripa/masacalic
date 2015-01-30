<?php
$this->pageCaption='Create Tabla';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo tabla';
$this->breadcrumbs=array(
	'Tabla'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Tabla', 'url'=>array('index')),
	array('label'=>'Administrar Tabla', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>