<?php

/**
 * This is the model class for table "currency".
 *
 * The followings are the available columns in table 'currency':
 * @property integer $Currency_ID
 * @property string $CurrencyNo
 * @property string $ExchangeVND
 * @property string $AppliedDate
 */
class Currency extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Currency the static model class
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
		return 'currency';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CurrencyNo, ExchangeVND, AppliedDate', 'required'),
			array('CurrencyNo', 'length', 'max'=>20),
			array('ExchangeVND', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Currency_ID, CurrencyNo, ExchangeVND, AppliedDate', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Currency_ID' => 'Currency',
			'CurrencyNo' => 'Currency No',
			'ExchangeVND' => 'Exchange Vnd',
			'AppliedDate' => 'Applied Date',
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

		$criteria->compare('Currency_ID',$this->Currency_ID);
		$criteria->compare('CurrencyNo',$this->CurrencyNo,true);
		$criteria->compare('ExchangeVND',$this->ExchangeVND,true);
		$criteria->compare('AppliedDate',$this->AppliedDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}