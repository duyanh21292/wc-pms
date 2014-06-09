<?php

/**
 * This is the model class for table "spec".
 *
 * The followings are the available columns in table 'spec':
 * @property integer $Spec_ID
 * @property string $ProjectNo
 * @property integer $SpecTask_ID
 * @property string $Fileitem
 * @property integer $Unit_ID
 * @property string $Quantity
 * @property string $UPrice
 * @property integer $Currency_ID
 * @property string $Memo
 * @property double $ExchRate
 * @property double $Amount
 */
class Spec extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Spec the static model class
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
		return 'spec';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProjectNo, SpecTask_ID, Unit_ID, Quantity, UPrice, Currency_ID', 'required'),
			array('SpecTask_ID, Unit_ID, Currency_ID', 'numerical', 'integerOnly'=>true),
			array('ExchRate, Amount', 'numerical'),
			array('ProjectNo, Fileitem, Quantity, UPrice', 'length', 'max'=>50),
			array('Memo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Spec_ID, ProjectNo, SpecTask_ID, Fileitem, Unit_ID, Quantity, UPrice, Currency_ID, Memo, ExchRate, Amount', 'safe', 'on'=>'search'),
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
			'Spec_ID' => 'Spec',
			'ProjectNo' => 'Project No',
			'SpecTask_ID' => 'Spec Task',
			'Fileitem' => 'Fileitem',
			'Unit_ID' => 'Unit',
			'Quantity' => 'Quantity',
			'UPrice' => 'Uprice',
			'Currency_ID' => 'Currency',
			'Memo' => 'Memo',
			'ExchRate' => 'Exch Rate',
			'Amount' => 'Amount',
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

		$criteria->compare('Spec_ID',$this->Spec_ID);
		$criteria->compare('ProjectNo',$this->ProjectNo,true);
		$criteria->compare('SpecTask_ID',$this->SpecTask_ID);
		$criteria->compare('Fileitem',$this->Fileitem,true);
		$criteria->compare('Unit_ID',$this->Unit_ID);
		$criteria->compare('Quantity',$this->Quantity,true);
		$criteria->compare('UPrice',$this->UPrice,true);
		$criteria->compare('Currency_ID',$this->Currency_ID);
		$criteria->compare('Memo',$this->Memo,true);
		$criteria->compare('ExchRate',$this->ExchRate);
		$criteria->compare('Amount',$this->Amount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}