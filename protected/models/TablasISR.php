<?php

/**
 * This is the model class for table "TablasISR".
 *
 * The followings are the available columns in table 'TablasISR':
 * @property string $id
 * @property string $tarifa
 * @property double $limiteInferior
 * @property double $limiteSuperior
 * @property double $cuotaFija
 * @property double $tasa
 */
class TablasISR extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TablasISR the static model class
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
		return 'TablasISR';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('limiteInferior, limiteSuperior, cuotaFija, tasa', 'numerical'),
			array('tarifa', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tarifa, limiteInferior, limiteSuperior, cuotaFija, tasa', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tarifa' => 'Tarifa',
			'limiteInferior' => 'Limite Inferior',
			'limiteSuperior' => 'Limite Superior',
			'cuotaFija' => 'Cuota Fija',
			'tasa' => 'Tasa',
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
		$criteria->compare('tarifa',$this->tarifa,true);
		$criteria->compare('limiteInferior',$this->limiteInferior);
		$criteria->compare('limiteSuperior',$this->limiteSuperior);
		$criteria->compare('cuotaFija',$this->cuotaFija);
		$criteria->compare('tasa',$this->tasa);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}