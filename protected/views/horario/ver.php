<?php
$this->pageCaption='Ver horario';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Horario'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Crear Horario', 'url'=>array('create', 'mm'=>$_GET['mm'])),
	array('label'=>'Administrar Horario', 'url'=>array('admin')),
);
?>
<h2><?php echo $relacion->maestro->nombre; ?> <small><?php echo $relacion->materia->nombre; ?></small></h2>

<table class="table table-striped table-bordered">
	<caption><h4>Horario</h4></caption>
	<thead class="thead">
		<tr>
			<td>ID</td>
			<td>Día</td>
			<td>Hora Inicio</td>
			<td>Hora Fin</td>
			<td>Estatus</td>
			<td style="width:50px;">Acción</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($horario as $h){ ?>
		<tr>
			<td><?php echo $h->id;?></td>
			<td><?php echo $h->dia;?></td>
			<td><?php echo $h->horaInicio;?></td>	
			<td><?php echo $h->horaFin;?></td>
			<td><?php echo $h->estatus->horario;?></td>
			<td>
				<?php 
					echo CHtml::link('<i class="icon-pencil"></i>',array('update','id'=>$h->id, 'mm'=>$h->materiaMaestro_did));
					echo CHtml::link('<i class="icon-trash"></i>',array('delete','id'=>$h->id, 'mm'=>$h->materiaMaestro_did)); 
				?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
