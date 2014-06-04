<?php

/**
 * This is the model class for table "client".
 *
 * The followings are the available columns in table 'client':
 * @property integer $Client_ID
 * @property string $ClientName
 * @property string $Tel
 * @property string $Fax
 * @property string $ZipCode
 * @property string $Address
 * @property string $Url
 * @property string $Location
 * @property integer $Country_ID
 * @property integer $C_Level_ID
 * @property string $Memo
 * @property string $Status
 * @property string $RegDate
 * @property string $ModifyDate
 */
class Client extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Client the static model class
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
		return 'client';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ClientName', 'required'),
			array('Country_ID, C_Level_ID', 'numerical', 'integerOnly'=>true),
			array('ClientName', 'length', 'max'=>200),
			array('Tel, Fax, ZipCode, Location, Status', 'length', 'max'=>50),
			array('Url', 'length', 'max'=>100),
			array('Address, Memo, RegDate, ModifyDate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Client_ID, ClientName, Tel, Fax, ZipCode, Address, Url, Location, Country_ID, C_Level_ID, Memo, Status, RegDate, ModifyDate', 'safe', 'on'=>'search'),
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
			'Client_ID' => 'Client',
			'ClientName' => 'Client Name',
			'Tel' => 'Tel',
			'Fax' => 'Fax',
			'ZipCode' => 'Zip Code',
			'Address' => 'Address',
			'Url' => 'Url',
			'Location' => 'Location',
			'Country_ID' => 'Country',
			'C_Level_ID' => 'C Level',
			'Memo' => 'Memo',
			'Status' => 'Status',
			'RegDate' => 'Reg Date',
			'ModifyDate' => 'Modify Date',
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

		$criteria->compare('Client_ID',$this->Client_ID);
		$criteria->compare('ClientName',$this->ClientName,true);
		$criteria->compare('Tel',$this->Tel,true);
		$criteria->compare('Fax',$this->Fax,true);
		$criteria->compare('ZipCode',$this->ZipCode,true);
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('Url',$this->Url,true);
		$criteria->compare('Location',$this->Location,true);
		$criteria->compare('Country_ID',$this->Country_ID);
		$criteria->compare('C_Level_ID',$this->C_Level_ID);
		$criteria->compare('Memo',$this->Memo,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('RegDate',$this->RegDate,true);
		$criteria->compare('ModifyDate',$this->ModifyDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}