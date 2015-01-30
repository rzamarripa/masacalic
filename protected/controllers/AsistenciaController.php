<?php

class AsistenciaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('autocompletesearch','create'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(	'index','view','update','admin','delete','calcular',
										'ficheroexcel','imprimirrecibo','calcularrecibo'),
				'users'=>array('@'),
			),
			/*
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),*/
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Asistencia;

		if(isset($_GET))
		{
			$existe = Asistencia::model()->exists("materiaMaestro_did = :mm && estatus_did != 4 && date(fechaCreacion_f) = curdate() && horario_did = :h", array(":mm" => $_GET["mm"], ":h" => $_GET["horario"]));
			if(!$existe)
			{
				$horasDescontadas = 0;
				$horasPagadas = 0;
				$model->horario_did = $_GET["horario"];
				$model->materiaMaestro_did = $_GET["mm"];
				$model->dia = $_GET["dia"];
				$model->fecha_f = date("Y-m-d");
				$resultados = $this->validarHora($_GET["horaInicio"], $_GET["horaFin"], $horasDescontadas, $horasPagadas);
				$model->estatus_did = $resultados[0];
				$model->horasPagadas = $resultados[1];
				$model->horasDescontadas = $resultados[2];
				if($model->save())
				{
					if($model->estatus_did == 1)
						Yii::app()->user->setFlash('success', '<strong>Bienvenido maestro.</strong>');
					else if($model->estatus_did == 2)
						Yii::app()->user->setFlash('warning', '<strong>Le recomendamos llegar puntual.</strong>');
					else if($model->estatus_did == 3)
						Yii::app()->user->setFlash('warning', '<strong>Le recomendamos llegar puntual.</strong>');
					else
						Yii::app()->user->setFlash('error', '<strong>No puede checar:<br> Está fuera del rango permitido, 15 minutos antes de su hora o revise que su clase no haya terminado.</strong>');

					$this->redirect(array("maestro/asistencia"));
				}
			}
			else
			{
				Yii::app()->user->setFlash('error', '<strong>Ya checó el día de hoy<br> Si cree que es un error por favor revisarlo con administración.</strong>');
				$this->redirect(array("maestro/asistencia"));
			}

		}
		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);

		if(isset($_POST['Asistencia']))
		{
			$model->attributes=$_POST['Asistencia'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Asistencia']))
		{
			$modelTemp = $model;
			$model->attributes=$_POST['Asistencia'];

			if($model->save()){
				if(isset($_GET["asi"])){
					$this->redirect(array('maestro/verasistencias','matmaes'=>$model->materiaMaestro_did));
				}
			}else{
				$this->redirect(array('view','id'=>$model->id));
			}

		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Asistencia');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Asistencia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Asistencia']))
			$model->attributes=$_GET['Asistencia'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Asistencia::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='asistencia-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	public function actionAutocompletesearch()
	{
	    $q = "%". $_GET['term'] ."%";
	 	$result = array();
	    if (!empty($q))
	    {
			$criteria=new CDbCriteria;
			$criteria->select=array('id', "CONCAT_WS(' ',nombre) as nombre");
			$criteria->condition="lower(CONCAT_WS(' ',nombre)) like lower(:nombre) ";
			$criteria->params=array(':nombre'=>$q);
			$criteria->limit='10';
	       	$cursor = Asistencia::model()->findAll($criteria);
			foreach ($cursor as $valor)
				$result[]=Array('label' => $valor->nombre,
				                'value' => $valor->nombre,
				                'id' => $valor->id, );
	    }
	    echo json_encode($result);
	    Yii::app()->end();
	}

	public function validarHora($horaInicio, $horaFin, $horasDescontadas, $horasPagadas)
	{
		date_default_timezone_set("America/Mazatlan");
		$pagadas = 0;
		$descontadas = 0;
		$estatus = 0;
		$diferencia = $horaFin - $horaInicio;
		$horaInicio = date('H:i', strtotime ($horaInicio));
		$horaFin = date('H:i', strtotime ($horaFin));
		$horaTempranaMinima = strtotime ( '-15 minute' , strtotime ( $horaInicio ));
		$horaTempranaMaxima = strtotime ( '+10 minute' , strtotime ( $horaInicio ));
		$horaRetardoMaxima = strtotime ( '+30 minute' , strtotime ( $horaInicio ));
		$ahorita = date("H:i");
		for($i=0; $i < $diferencia; $i++)
		{
			if($ahorita < $horaFin)
			{
				if($i == 0)
				{
					if($ahorita > date("H:i", $horaTempranaMinima))
					{
						if($ahorita < date("H:i", $horaTempranaMaxima))
						{
							$estatus = 1;
							$pagadas = $diferencia;
							break;
						}
						else if($ahorita < date("H:i", $horaRetardoMaxima))
						{
							$estatus = 2;
							$pagadas = $diferencia;
							break;
						}
					}
					else
					{
						$estatus = 4;
						$pagadas = 0;
						$descontadas = 0;
						break;
					}
					$primera = false;
				}
				else
				{
					$horaTempranaMinima = strtotime ( '+' . $i . ' hour' , strtotime($horaInicio));
					$horaRetardoMaxima = strtotime('+30 minute', $horaTempranaMinima);
					/*
					echo date("H:i", $horaTempranaMinima) . "<br/>";
					echo date("H:i", $horaRetardoMaxima) . "<br/>";
					echo $ahorita . "<br/>";
					*/
					$descontadas++;
					if($ahorita < date("H:i", $horaRetardoMaxima))
					{
						$estatus = 3;
						$pagadas = $diferencia - $descontadas;
						break;
					}
					else
					{
						$estatus = 3;
						$descontadas++;
						$pagadas = $diferencia - $descontadas;
					}
				}
			}
			else
			{
				$estatus = 4;
				$descontadas = 0;
				$pagadas = 0;
			}

		}
		$datos = array($estatus, $pagadas, $descontadas);
		return $datos;
	}

	public function actionCalcular()
	{
		date_default_timezone_set ('America/Mazatlan');
		setlocale(LC_TIME, 'es_MX');
		$maestrosHorarios = Yii::app()->db->createCommand('
		select 	mm.id as id, mm.costo as costo,
		m.nombre as Maestro,
		sum(a.horasPagadas) as cumplidas,
		sum(a.horasDescontadas) as descontadas,
		cast(sum(if(a.estatus_did = 2, 1, 0))/3 as unsigned) as descontadasPorRetardo,
		sum(if(a.estatus_did = 1, 1, 0)) as puntual,
		sum(if(a.estatus_did = 2, 1, 0)) as retardo,
		(sum(a.horasPagadas) * mm.costo) - (cast(sum(if(a.estatus_did = 2, 1, 0))/3 as unsigned) * mm.costo) as pago
		from Asistencia a
		inner join Materia_Maestro mm on mm.id = a.materiaMaestro_did
		inner join Maestro m on m.id = mm.maestro_aid
		where a.fecha_f >= "' . $_POST["fechaInicio"] . '" && a.fecha_f <= "' . $_POST["fechaFin"] . '"
		group by m.id, mm.costo
		order by Maestro asc;')->queryAll();
		if(count($maestrosHorarios) > 0)
		{
			$this->renderPartial('_calcular', array('maestrosHorarios' => $maestrosHorarios, 'fechaInicial'=>$_POST["fechaInicio"], 'fechaFinal'=>$_POST["fechaFin"]));
		}
	    else
	    {
	    	echo '<div class="row" style="text-align:center;">
	    					<div class="span12">
		    					<span class="label label-warning" style="font-size:12pt;">No se encontró nada, por favor véalo con su responsable de carrera.</span>
	    					</div>
	    			 </div>';
	    }
	}

	public function actionFicheroexcel()
	{
		$file="nominamaestros_" . date("d-m-Y") . ".xls";
		if (mb_detect_encoding($_POST["datos_a_enviar"]) == 'UTF-8') {
		   $test = mb_convert_encoding($_POST["datos_a_enviar"] , "HTML-ENTITIES", "UTF-8");
		}
		header("Content-type: application/vnd.ms-excel charset=utf-8");
		header('Content-Type: text/html; charset=utf-8');
		header("Content-Disposition: attachment; filename=$file");
		echo $test;
	}

	public function actionImprimirrecibo($id){
		//$this->layout = "pdf";
		date_default_timezone_set ('America/Mazatlan');
		setlocale(LC_TIME, 'es_MX.UTF-8');
		$maestro = unserialize($_GET["info"]);
		$this->render("imprimirrecibo",array("maestro"=>$maestro));
	}

	public function actionCalcularrecibo(){

	}
}



























