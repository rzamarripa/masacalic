<?php
$this->pageCaption='Tabla';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar tabla';
$this->breadcrumbs=array(
	'Tabla',
);

$this->menu=array(
	array('label'=>'Crear Tabla', 'url'=>array('create')),
	array('label'=>'Administrar Tabla', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
