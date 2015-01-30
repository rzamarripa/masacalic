<?php
	$this->pageCaption='Ver asistencias de: ' . $maestro->materiaMaestro->maestro->nombre;
	$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
	$this->pageDescription='';

    $this->breadcrumbs=array(
		'Inicio',
	);
	$this->menu=array(
	array('label'=>'Ir a Calcular', 'url'=>array('maestro/contador')),
);
?>
<div class="row">
	<div class="span12">
		<table class="table table-striped table-bordered">
			<caption><h4>Listado de asistencias: <?php echo $maestro->materiaMaestro->materia->nombre; ?></h4></caption>
			<thead class="thead">
				<tr>
					<td>Modificar</td>
					<td>Día</td>
					<td>Fecha</td>
					<td>Horas Pagadas</td>
					<td>Horas Descontadas</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($asistencias as $asistencia){ ?>
				<tr>
					<td><?php echo CHtml::link("Modificar",
										array("asistencia/update","id"=>$asistencia->id, 'asi'=>true),
										array("class"=>"btn btn-success"));?></td>
					<td><?php echo $asistencia->dia;?></td>
					<td><?php echo $asistencia->fecha_f;?></td>
					<td><?php echo $asistencia->horasPagadas;?></td>
					<td><?php echo $asistencia->horasDescontadas;?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
