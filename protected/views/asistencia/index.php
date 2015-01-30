<?php
$this->pageCaption='Asistencia';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar asistencia';
$this->breadcrumbs=array(
	'Asistencia',
);

$this->menu=array(
	array('label'=>'Crear Asistencia', 'url'=>array('create')),
	array('label'=>'Administrar Asistencia', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
