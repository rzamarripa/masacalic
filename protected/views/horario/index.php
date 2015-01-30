<?php
$this->pageCaption='Horario';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar horario';
$this->breadcrumbs=array(
	'Horario',
);

$this->menu=array(
	array('label'=>'Crear Horario', 'url'=>array('create')),
	array('label'=>'Administrar Horario', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
