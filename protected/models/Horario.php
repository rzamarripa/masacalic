<?php

/**
 * This is the model class for table "Horario".
 *
 * The followings are the available columns in table 'Horario':
 * @property string $id
 * @property string $materiaMaestro_did
 * @property string $dia
 * @property string $horaInicio
 * @property string $horaFin
 * @property string $estatus_did
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 * @property MateriaMaestro $materiaMaestro
 */
class Horario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Horario the static model class
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
		return 'Horario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('materiaMaestro_did, dia, horaInicio, estatus_did', 'required'),
			array('materiaMaestro_did, estatus_did', 'length', 'max'=>11),
			array('dia, horaInicio, horaFin', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, materiaMaestro_did, dia, horaInicio, horaFin, estatus_did', 'safe', 'on'=>'search'),
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
			'dia' => 'Dia',
			'horaInicio' => 'Hora Inicio',
			'horaFin' => 'Hora Fin',
			'estatus_did' => 'Estatus',
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
		$criteria->compare('materiaMaestro_did',$this->materiaMaestro_did,false);
		$criteria->compare('dia',$this->dia,true);
		$criteria->compare('horaInicio',$this->horaInicio,true);
		$criteria->compare('horaFin',$this->horaFin,true);
		$criteria->compare('estatus_did',$this->estatus_did,false);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}