<?php
$this->pageCaption='Tablas Isr';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar tablas isr';
$this->breadcrumbs=array(
	'Tablas Isr',
);

$this->menu=array(
	array('label'=>'Crear TablasISR', 'url'=>array('create')),
	array('label'=>'Administrar TablasISR', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
