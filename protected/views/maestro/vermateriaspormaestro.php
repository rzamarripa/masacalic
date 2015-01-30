<?php
$this->pageCaption='Listado de Materias';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription="Asignadas";
$this->breadcrumbs=array(
	'Mis Materias',
);
?>

<?php
//Materias por maestro
$connection = Yii::app()->db;
$queryMateriasPorMaestro = 'select Maestro.id as maestroid, Materia_Maestro.id, Materia.id as matid, Materia.nombre as materia, Licenciatura.nombre as nombreLic, Materia.cantidad_planeaciones as cantidad, Materia_Maestro.estatus_did as estatus from Materia_Maestro 
							inner join Materia on Materia.id = Materia_Maestro.materia_aid
							inner join Maestro on Maestro.id = Materia_Maestro.maestro_aid
							inner join Licenciatura on Licenciatura.id = Materia.licenciatura_aid
							where maestro_aid =
									(select id from Maestro where usuario_did = 
										(select id from Usuario where usuario = "' . Yii::app()->user->name . '")) order by estatus asc;';
$commandMateriasPorMaestro = $connection->createCommand($queryMateriasPorMaestro);
$materiasPorMaestro = $commandMateriasPorMaestro->queryAll();
//echo '<pre>'; print_r($materias); echo '</pre>';
?>

<table class="table table-bordered table-striped">
	<tr>
		<td><b>Materia</b></td>
		<td><b>Licenciatura</b></td>
		<td style="width:110px;"><b>Planeaciones Requeridas</b></td>
		<td style="width:110px;"><b>Estatus</b></td>
	</tr>
	<?php foreach ($materiasPorMaestro as $valor) { ?>
		<tr>
			<td><?php echo CHtml::link($valor["materia"], array('planeacion/misplaneaciones', 'materia'=>$valor["materia"], 'matid'=>$valor["matid"], 'maestroid'=>$valor["maestroid"], 'usuario' => Yii::app()->user->name, 'lic'=>$valor['nombreLic'])); ?></td>
			<td><?php echo $valor["nombreLic"]; ?></td>
			<td><?php echo $valor["cantidad"]; ?></td>
			<td>
				<?php 
					if($valor["estatus"] == 1)
						echo "<span class='label label-success'>Actual</span>";
					else
						echo "<span class='label label-waring'>Anteriores</span>";
				?>
			</td>
		</tr>
	<?php }	?>

</table>