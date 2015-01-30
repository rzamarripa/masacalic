<?php
$this->pageCaption='Listado de Materias';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription="de tu área";
$this->breadcrumbs=array(
	'Mis Materias',
);
$c =0;

//Materias por maestro
$connection = Yii::app()->db;

$queryMateriasPorMaestros = 'select mm.id as relacion, mat.id  as matid, mat.nombre as materia, maes.id as maestroid, maes.nombre as maestro, lic.nombre as licenciatura, u.usuario as usuario, mat.cantidad_planeaciones as cantidad,
(select count(*) from Planeacion as p where p.materiaMaestro_did = mm.id && p.estatus_did = 2) as borrador,
(select count(*) from Planeacion as p where p.materiaMaestro_did = mm.id && p.estatus_did = 1) as liberadas,
(select count(*) from Planeacion as p where p.materiaMaestro_did = mm.id && p.estatus_did = 3) as revisadas,
(select count(*) from Planeacion as p where p.materiaMaestro_did = mm.id && p.estatus_did = 4) as plataforma,
(select sum(borrador + liberadas + revisadas + plataforma)) as total
from Materia_Maestro mm
inner join Materia as mat on mat.id = mm.materia_aid
inner join Licenciatura as lic on lic.id = mat.licenciatura_aid
inner join Maestro as maes on maes.id = mm.maestro_aid
inner join Usuario as u on u.id = maes.usuario_did
where mat.licenciatura_aid IN (
select ls.licenciatura_did from Licenciatura_Usuario as ls
inner join Licenciatura as l on l.id = ls.licenciatura_did
where ls.usuario_did = (
	select id from Usuario as u where u.usuario = "' . Yii::app()->user->name . '"
)
) && mm.estatus_did = 1
order by maestro asc;';

$commandMateriasPorMaestros = $connection->createCommand($queryMateriasPorMaestros);
$materiasPorMaestros = $commandMateriasPorMaestros->queryAll();
/*

$queryArchivosPorMaterias = '
select mm.id as relacion, mat.id  as matid, mat.nombre as materia, maes.id as maestroid, maes.nombre as maestro, lic.nombre as licenciatura, u.usuario as usuario, mat.cantidad_planeaciones as cantidad,
(select count(*) from Archivo as a where a.materiaMaestro_did = mm.id && a.estatus_did = 2) as borrador,
(select count(*) from Archivo as a where a.materiaMaestro_did = mm.id && a.estatus_did = 1) as liberadas,
(select count(*) from Archivo as a where a.materiaMaestro_did = mm.id && a.estatus_did = 3) as revisadas,
(select count(*) from Archivo as a where a.materiaMaestro_did = mm.id && a.estatus_did = 4) as plataforma,
(select count(*) from Archivo as a where a.materiaMaestro_did = mm.id && a.estatus_did = 5) as eliminados,
(select sum(borrador + liberadas + revisadas + plataforma)) as total
from Materia_Maestro mm
inner join Materia as mat on mat.id = mm.materia_aid
inner join Licenciatura as lic on lic.id = mat.licenciatura_aid
inner join Maestro as maes on maes.id = mm.maestro_aid
inner join Usuario as u on u.id = maes.usuario_did
where mat.licenciatura_aid IN (
select ls.licenciatura_did from Licenciatura_Usuario as ls
inner join Licenciatura as l on l.id = ls.licenciatura_did
where ls.usuario_did = (
	select id from Usuario as u where u.usuario = "' . Yii::app()->user->name . '"
)
) && mm.estatus_did = 1
order by maestro asc;';

$commandArchivosPorMaterias = $connection->createCommand($queryArchivosPorMaterias);
$archivosPorMaterias = $commandArchivosPorMaterias->queryAll();
*/

?>
<div class="tabbable"> <!-- Only required for left/right tabs -->
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab01" data-toggle="tab">Planeaciones</a></li>
		<li><a href="#tab02" data-toggle="tab"><i class="icon-file"></i> Archivos</a></li>
	</ul>
	<div class="tab-content">
    	<div class="tab-pane active" id="tab01">
			<table class="table table-bordered table-striped" style="font-size:9pt;">
				<tr>
					<td><b>ID</b></td>
					<td><b>Materia</b></td>
					<td><b>Maestro</b></td>
					<td><b>Licenciatura</b></td>
					<td style="width:70px;"><b>Requeridas</b></td>
					<td style="width:50px;"><b>Borrador</b></td>
					<td style="width:50px;"><b>Liberadas</b></td>
					<td style="width:50px;"><b>Revisadas</b></td>
					<td style="width:60px;"><b>Plataforma</b></td>
					<td style="width:30px;"><b>Total</b></td>
				</tr>
				<?php
			$totalLiberadas = 0;
			foreach ($materiasPorMaestros as $valor) { $c++;?>
				<tr>
					<td><?php echo $c; ?></td>
					<td><?php echo CHtml::link($valor['materia'], array('planeacion/planporcoord', 'materia'=>$valor['materia'], 'matid'=>$valor['matid'], 'maestroid'=>$valor['maestroid'], 'usuario'=>$valor['usuario'])); ?></td>
					<td><?php
								echo CHtml::link('<strong>H</strong>',array('horario/ver', 'mm'=>$valor['relacion']),array('class'=>'btn btn-mini btn-success', 'style'=>'margin-right:5px;'));
								if( $valor['total'] > 0)
								{
									echo CHtml::link('<i class="icon-repeat icon-white"></i>',array('planeacion/reiniciar', 'mm'=>$valor['relacion']),array('class'=>'btn btn-success btn-mini'));
								}
								else
								{
									echo CHtml::link('<i class="icon-repeat icon-white"></i>',array('planeacion/reiniciar', 'mm'=>$valor['relacion']),array('class'=>'btn btn-mini disabled'));
								}
								echo ' ' . $valor['maestro']; ?></td>
					<td><?php echo $valor['licenciatura']; ?></td>
					<td><span class="label"><?php echo $valor['cantidad']; ?></span></td>
					<td><span class="label label-important"><?php echo $valor['borrador']; ?></span></td>
					<td><span class="label label-warning"><?php echo $valor['liberadas']; ?></span></td>
					<td><span class="label label-info"><?php echo $valor['revisadas']; ?></span></td>
					<td><span class="label label-success"><?php echo $valor['plataforma']; ?></span></td>
					<td><span class="label label-inverse"><?php echo $valor['total']; ?></span></td>
				</tr>
				<?php
				$totalLiberadas = $valor['liberadas'];
			}
				//echo $totalLiberadas;
				?>
			</table>
		</div>

	</div>
</div>