<?php
$this->pageCaption='Administrar Tablas ISR';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Filtrar';
$this->breadcrumbs=array(
	'Tablas ISR'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Tablas ISR', 'url'=>array('index')),
	array('label'=>'Crear Tablas ISR', 'url'=>array('create')),
);


$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tablas-isr-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		'tarifa',
		'limiteInferior',
		'limiteSuperior',
		'cuotaFija',
		'tasa',
		array(	'name'=>'estatus_did',
		        'value'=>'$data->estatus->horario',
			    'filter'=>CHtml::listData(Estatus::model()->findAll("horario is not null"), 'id', 'horario'),),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
