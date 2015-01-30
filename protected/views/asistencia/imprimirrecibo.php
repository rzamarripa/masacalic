<?php
	$this->pageCaption='Imprimir Recibo';
	$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
	$this->pageDescription='';

	$buscarImpuesto = 0.00;
	$vuelta = 0;
	$ingresoDeseadoAux = $maestro["pago"] + ($maestro["pago"] * (1.92/100));
	$baseGravableAux = $maestro["pago"] + ($maestro["pago"] * (1.92/100));

	while (abs($ingresoDeseadoAux - $maestro["pago"]) > 0.001 && $vuelta < 15) {
		$vuelta++;
		$buscarImpuesto = calculaISR($baseGravableAux);
		$ingresoDeseadoAux = $baseGravableAux - $buscarImpuesto;
		$baseGravableAux = $maestro["pago"] + $buscarImpuesto;
	}

	function calculaISR($dblBG){
		$tablas = TablasISR::model()->findAll("estatus_did = 1");
		$impuesto = 0;
		foreach($tablas as $tabla){
			if($dblBG >= $tabla->limiteInferior && $dblBG <= $tabla->limiteSuperior){
				$impuesto = ($tabla->cuotaFija) + (($dblBG - $tabla->limiteInferior)*($tabla->tasa / 100));
			}
		}
		return $impuesto;
	}
	setlocale(LC_ALL,'es_MX');
?>
<div class="row">
	<div class="span12">
		<p>ENLACES MULTIPLES EAI, SC</p>
		<p>RECIBO DE ASIMILADOS A SALARIOS</p>
		<p>
	</div>
</div>
<div class="row">
	<div class="span12">
		<table class="table table-bordered">
			<tr>
				<td>Nombre Contribuyente</td>
				<td colspan="3" style="text-align:right;"><?php echo $maestro["Maestro"]; ?></td>
			</tr>
			<tr>
				<td colspan="2"></td>
				<td>Periodo</td>
				<td style="width:200px;"><?php
					$dia = date("d", strtotime($_GET["fechaFinal"]));
					if($dia<=15)
						echo date("M", strtotime($_GET["fechaFinal"])) . " | " . "Periodo 1";
					else
						echo date("M", strtotime($_GET["fechaFinal"])) . " | " . "Periodo 2"; ?></td><?php // hay que jalar el mes ?>
			</tr>
			<tr>
				<td colspan="4">Asimilados a Salario</td>
			</tr>
			<tr>
				<th></th>
				<th style="text-align:center">Datos</th>
				<th style="text-align:center">Retención</th>
				<th style="text-align:center">Neto</th>
			</tr>
			<tr>
				<td><strong>Ingresos acumulados anteriores</strong></td>
				<td style="text-align:right;">$0.00</td>
				<td colspan="2"></td>
			</tr>
			<tr>
				<td><strong>Ingresos del periodo</strong></td>
				<td style="text-align:right;"><?php echo '$ ' . number_format($baseGravableAux,2); ?></td>
				<td style="text-align:right;"><?php echo '$ ' . number_format($buscarImpuesto,2); ?></td>
				<td style="text-align:right;"><?php echo '$ ' . number_format($maestro["pago"],2); ?></td>
			</tr>
		</table>
	</div>
</div>


<div class="row">
	<div class="span3">
		<br/><br/><br/><br/><br/><br/>
		_________________________
		<p>FIRMA DEL BENEFICIARIO</p>
	</div>
</div>
<br/><br/>
<div class="row">
	<div class="span12">
		<table class="table table-bordered">
			<tr>
				<td>Nombre Contribuyente</td>
				<td colspan="3" style="text-align:right;"><?php echo $maestro["Maestro"]; ?></td>
			</tr>
			<tr>
				<td colspan="2"></td>
				<td>Periodo</td>
				<td style="width:200px;"><?php
					$dia = date("d", strtotime($_GET["fechaFinal"]));
					if($dia<=15)
						echo date("M", strtotime($_GET["fechaFinal"])) . " | " . "Periodo 1";
					else
						echo date("M", strtotime($_GET["fechaFinal"])) . " | " . "Periodo 2"; ?></td><?php // hay que jalar el mes ?>
			</tr>
			<tr>
				<td colspan="4">Asimilados a Salario</td>
			</tr>
			<tr>
				<th></th>
				<th style="text-align:center">Datos</th>
				<th style="text-align:center">Retención</th>
				<th style="text-align:center">Neto</th>
			</tr>
			<tr>
				<td><strong>Ingresos acumulados anteriores</strong></td>
				<td style="text-align:right;">$0.00</td>
				<td colspan="2"></td>
			</tr>
			<tr>
				<td><strong>Ingresos del periodo</strong></td>
				<td style="text-align:right;"><?php echo '$ ' . number_format($baseGravableAux,2); ?></td>
				<td style="text-align:right;"><?php echo '$ ' . number_format($buscarImpuesto,2); ?></td>
				<td style="text-align:right;"><?php echo '$ ' . number_format($maestro["pago"],2); ?></td>
			</tr>
		</table>
	</div>
</div>


<div class="row">
	<div class="span3">
		<br/><br/><br/><br/><br/><br/>
		_________________________
		<p>FIRMA DEL BENEFICIARIO</p>
	</div>
</div>