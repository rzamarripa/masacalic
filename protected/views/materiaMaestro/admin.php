<?php
$this->pageCaption='Administrar maestros y materias';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Identifica si el maestro ya tiene la materia';
$this->breadcrumbs=array(
	'Administrar Maestro con Materia'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Materia Maestro', 'url'=>array('index')),
	array('label'=>'Crear MateriaMaestro', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('materia-maestro-grid', {
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
	'id'=>'materia-maestro-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		array(	'name'=>'materia_aid',
		        'value'=>'$data->materia->nombre',
			    'filter'=>CHtml::listData(Materia::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),),
		array(	'name'=>'maestro_aid',
		        'value'=>'$data->maestro->nombre',
			    'filter'=>CHtml::listData(Maestro::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),),
		array(	'name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		'fechaCaptura',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
