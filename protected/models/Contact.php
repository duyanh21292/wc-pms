<?php

/**
 * This is the model class for table "contact".
 *
 * The followings are the available columns in table 'contact':
 * @property integer $Contact_ID
 * @property integer $Client_ID
 * @property string $ContactName
 * @property string $Department
 * @property string $Job
 * @property string $Tel
 * @property string $Fax
 * @property string $Mobile
 * @property string $Email
 * @property string $SaleMngNo
 * @property string $PrjMngNo
 * @property string $Memo
 */
class Contact extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Contact the static model class
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
		return 'contact';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Client_ID, ContactName', 'required'),
			array('Client_ID', 'numerical', 'integerOnly'=>true),
			array('ContactName, Email', 'length', 'max'=>100),
			array('Department, Job, Tel, Fax, Mobile, SaleMngNo, PrjMngNo', 'length', 'max'=>50),
			array('Memo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Contact_ID, Client_ID, ContactName, Department, Job, Tel, Fax, Mobile, Email, SaleMngNo, PrjMngNo, Memo', 'safe', 'on'=>'search'),
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
			'Contact_ID' => 'Contact',
			'Client_ID' => 'Client',
			'ContactName' => 'Contact Name',
			'Department' => 'Department',
			'Job' => 'Job',
			'Tel' => 'Tel',
			'Fax' => 'Fax',
			'Mobile' => 'Mobile',
			'Email' => 'Email',
			'SaleMngNo' => 'Sale Mng No',
			'PrjMngNo' => 'Prj Mng No',
			'Memo' => 'Memo',
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

		$criteria->compare('Contact_ID',$this->Contact_ID);
		$criteria->compare('Client_ID',$this->Client_ID);
		$criteria->compare('ContactName',$this->ContactName,true);
		$criteria->compare('Department',$this->Department,true);
		$criteria->compare('Job',$this->Job,true);
		$criteria->compare('Tel',$this->Tel,true);
		$criteria->compare('Fax',$this->Fax,true);
		$criteria->compare('Mobile',$this->Mobile,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('SaleMngNo',$this->SaleMngNo,true);
		$criteria->compare('PrjMngNo',$this->PrjMngNo,true);
		$criteria->compare('Memo',$this->Memo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}