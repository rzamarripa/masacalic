<?php
$this->pageCaption='Relacionar Maestro con una Materia';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Materia Maestro'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Materia Maestro', 'url'=>array('index')),
	array('label'=>'Administrar Materia Maestro', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>