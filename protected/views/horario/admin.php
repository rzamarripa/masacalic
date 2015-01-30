<?php
$this->pageCaption='Manage Horario';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administar horario';
$this->breadcrumbs=array(
	'Horario'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Horario', 'url'=>array('index')),
	array('label'=>'Crear Horario', 'url'=>array('create')),
);

?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'horario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		array(	'name'=>'materiaMaestro_did',
		        'value'=>'$data->materiaMaestro->maestro->nombre',
			    'filter'=>CHtml::listData(Maestro::model()->findAll(), 'id', 'nombre'),),
		'dia',
		'horaInicio',
		'horaFin',
		array(	'name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
