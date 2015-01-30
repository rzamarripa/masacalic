<?php
$this->pageCaption='Manage Asistencia';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administar asistencia';
$this->breadcrumbs=array(
	'Asistencia'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Asistencia', 'url'=>array('index')),
	array('label'=>'Crear Asistencia', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('asistencia-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'asistencia-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		array(	'name'=>'materiaMaestro_did',
		        'value'=>'$data->materiaMaestro->maestro->nombre’,
			    'filter'=>CHtml::listData(Maestro::model()->findAll(), 'id', ‘nombre’),),
		array(	'name'=>'horario_did',
		        'value'=>'$data->horario->nombre',
			    'filter'=>CHtml::listData(Horario::model()->findAll(), 'id', 'nombre'),),
		'dia',
		'fecha_f',
		'horasPagadas',
		/*
		'horasDescontadas',
		array(	'name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		'fechaCreacion_f',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
