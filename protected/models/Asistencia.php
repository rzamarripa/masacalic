<?php

/**
 * This is the model class for table "Asistencia".
 *
 * The followings are the available columns in table 'Asistencia':
 * @property string $id
 * @property string $materiaMaestro_did
 * @property string $horario_did
 * @property string $dia
 * @property string $fecha_f
 * @property integer $horasPagadas
 * @property integer $horasDescontadas
 * @property string $estatus_did
 * @property string $fechaCreacion_f
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 * @property Horario $horario
 * @property MateriaMaestro $materiaMaestro
 */
class Asistencia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Asistencia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Asistencia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('horasPagadas, horasDescontadas', 'numerical', 'integerOnly'=>true),
			array('materiaMaestro_did, dia', 'length', 'max'=>10),
			array('horario_did, estatus_did', 'length', 'max'=>11),
			array('fecha_f, fechaCreacion_f', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, materiaMaestro_did, horario_did, dia, fecha_f, horasPagadas, horasDescontadas, estatus_did, fechaCreacion_f', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'horario' => array(self::BELONGS_TO, 'Horario', 'horario_did'),
			'materiaMaestro' => array(self::BELONGS_TO, 'MateriaMaestro', 'materiaMaestro_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'materiaMaestro_did' => 'Materia Maestro',
			'horario_did' => 'Horario',
			'dia' => 'Dia',
			'fecha_f' => 'Fecha F',
			'horasPagadas' => 'Horas Pagadas',
			'horasDescontadas' => 'Horas Descontadas',
			'estatus_did' => 'Estatus',
			'fechaCreacion_f' => 'Fecha Creacion F',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('materiaMaestro_did',$this->materiaMaestro_did,true);
		$criteria->compare('horario_did',$this->horario_did,true);
		$criteria->compare('dia',$this->dia,true);
		$criteria->compare('fecha_f',$this->fecha_f,true);
		$criteria->compare('horasPagadas',$this->horasPagadas);
		$criteria->compare('horasDescontadas',$this->horasDescontadas);
		$criteria->compare('estatus_did',$this->estatus_did,true);
		$criteria->compare('fechaCreacion_f',$this->fechaCreacion_f,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function formatCurrency($number, $fractional=false) 
    { 
	    if ($fractional) { 
	        $number = sprintf('%.2f', $number); 
	    } 
	    while (true) { 
	        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number); 
	        if ($replaced != $number) { 
	            $number = $replaced; 
	        } else { 
	            break; 
	        } 
	    } 
	    return '$ '.$number; 
	} 
}