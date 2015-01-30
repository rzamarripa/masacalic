<?php

/**
 * This is the model class for table "Tabla".
 *
 * The followings are the available columns in table 'Tabla':
 * @property string $id
 * @property string $asistencia_did
 * @property string $nombre
 * @property string $direccion
 * @property string $fecha_f
 *
 * The followings are the available model relations:
 * @property Asistencia $asistencia
 */
class Tabla extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Tabla the static model class
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
		return 'Tabla';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('asistencia_did', 'length', 'max'=>11),
			array('nombre, direccion', 'length', 'max'=>100),
			array('fecha_f', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, asistencia_did, nombre, direccion, fecha_f', 'safe', 'on'=>'search'),
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
			'asistencia' => array(self::BELONGS_TO, 'Asistencia', 'asistencia_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'asistencia_did' => 'Asistencia',
			'nombre' => 'Nombre Completo',
			'direccion' => 'Dirección',
			'fecha_f' => 'Fecha Actual',
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
		$criteria->compare('asistencia_did',$this->asistencia_did,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('fecha_f',$this->fecha_f,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}