<?php
$this->pageCaption='Manage Tabla';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administar tabla';
$this->breadcrumbs=array(
	'Tabla'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Tabla', 'url'=>array('index')),
	array('label'=>'Crear Tabla', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tabla-grid', {
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
	'id'=>'tabla-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		array(	'name'=>'asistencia_did',
		        'value'=>'$data->asistencia->nombre',
			    'filter'=>CHtml::listData(Asistencia::model()->findAll(), 'id', 'nombre'),),
		'nombre',
		'direccion',
		'fecha_f',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
