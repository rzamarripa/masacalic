<?php

/**
 * This is the model class for table "Materia_Maestro".
 *
 * The followings are the available columns in table 'Materia_Maestro':
 * @property string $id
 * @property string $materia_aid
 * @property string $maestro_aid
 * @property double $costo
 * @property string $estatus_did
 * @property string $fechaCaptura
 *
 * The followings are the available model relations:
 * @property Archivo[] $archivos
 * @property Asistencia[] $asistencias
 * @property Horario[] $horarios
 * @property Estatus $estatus
 * @property Maestro $maestro
 * @property Materia $materia
 * @property Planeacion[] $planeacions
 */
class MateriaMaestro extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return MateriaMaestro the static model class
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
		return 'Materia_Maestro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('materia_aid, maestro_aid, estatus_did', 'required'),
			array('costo', 'numerical'),
			array('materia_aid, maestro_aid, estatus_did', 'length', 'max'=>11),
			array('fechaCaptura', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, materia_aid, maestro_aid, costo, estatus_did, fechaCaptura', 'safe', 'on'=>'search'),
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
			'archivos' => array(self::HAS_MANY, 'Archivo', 'materiaMaestro_did'),
			'asistencias' => array(self::HAS_MANY, 'Asistencia', 'materiaMaestro_did'),
			'horarios' => array(self::HAS_MANY, 'Horario', 'materiaMaestro_did'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'maestro' => array(self::BELONGS_TO, 'Maestro', 'maestro_aid'),
			'materia' => array(self::BELONGS_TO, 'Materia', 'materia_aid'),
			'planeacions' => array(self::HAS_MANY, 'Planeacion', 'materiaMaestro_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'materia_aid' => 'Materia',
			'maestro_aid' => 'Maestro',
			'costo' => 'Costo',
			'estatus_did' => 'Estatus',
			'fechaCaptura' => 'Fecha Captura',
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
		$criteria->compare('materia_aid',$this->materia_aid,false);
		$criteria->compare('maestro_aid',$this->maestro_aid,false);
		$criteria->compare('costo',$this->costo, true);
		$criteria->compare('estatus_did',$this->estatus_did,true);
		$criteria->compare('fechaCaptura',$this->fechaCaptura,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}