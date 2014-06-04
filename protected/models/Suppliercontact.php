<?php

/**
 * This is the model class for table "suppliercontact".
 *
 * The followings are the available columns in table 'suppliercontact':
 * @property integer $Contact_ID
 * @property string $SupplierNo
 * @property string $Name
 * @property string $Department
 * @property string $JobTitle
 * @property string $Tel
 * @property string $Fax
 * @property string $Mobile
 * @property string $Email
 * @property string $Memo
 */
class Suppliercontact extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Suppliercontact the static model class
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
		return 'suppliercontact';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('SupplierNo, Name', 'required'),
			array('SupplierNo, Department, JobTitle, Tel, Fax, Mobile', 'length', 'max'=>50),
			array('Name, Email', 'length', 'max'=>100),
			array('Memo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Contact_ID, SupplierNo, Name, Department, JobTitle, Tel, Fax, Mobile, Email, Memo', 'safe', 'on'=>'search'),
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
			'SupplierNo' => 'Supplier No',
			'Name' => 'Name',
			'Department' => 'Department',
			'JobTitle' => 'Job Title',
			'Tel' => 'Tel',
			'Fax' => 'Fax',
			'Mobile' => 'Mobile',
			'Email' => 'Email',
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
		$criteria->compare('SupplierNo',$this->SupplierNo,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Department',$this->Department,true);
		$criteria->compare('JobTitle',$this->JobTitle,true);
		$criteria->compare('Tel',$this->Tel,true);
		$criteria->compare('Fax',$this->Fax,true);
		$criteria->compare('Mobile',$this->Mobile,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Memo',$this->Memo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}