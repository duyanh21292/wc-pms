<?php

/**
 * This is the model class for table "employees".
 *
 * The followings are the available columns in table 'employees':
 * @property string $EmpNo
 * @property string $Full_Name
 * @property integer $Division_ID
 * @property integer $Dep_ID
 * @property integer $Job_ID
 * @property string $Entry_Date
 * @property integer $Reg_Number
 * @property string $Mobile
 * @property string $Tel_Home
 * @property string $Ext_Number
 * @property string $Email
 * @property string $Private_Email
 * @property string $Address
 * @property integer $Gender
 * @property string $Birth_Date
 * @property integer $Marital_Status
 * @property integer $Education_ID
 * @property string $Manager_ID
 * @property string $Role_ID
 *
 * The followings are the available model relations:
 * @property Division $division
 * @property Department $dep
 * @property Job $job
 * @property Education $education
 * @property Employees $manager
 * @property Employees[] $employees
 * @property Workload[] $workloads
 */
class Employees extends CActiveRecord
{
    const BASE_URL = 'http://x.pms';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Employees the static model class
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
		return 'employees';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EmpNo, Full_Name, Division_ID, Dep_ID, Job_ID, Entry_Date, Mobile, Email, Private_Email, Address, Gender, Birth_Date, Marital_Status, Education_ID', 'required'),
			array('Division_ID, Dep_ID, Job_ID, Reg_Number, Gender, Marital_Status, Education_ID', 'numerical', 'integerOnly'=>true),
			array('EmpNo, Email, Private_Email, Manager_ID, Role_ID', 'length', 'max'=>50),
			array('Full_Name', 'length', 'max'=>100),
			array('Mobile, Tel_Home, Ext_Number', 'length', 'max'=>20),
			array('Address', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('EmpNo, Full_Name, Division_ID, Dep_ID, Job_ID, Entry_Date, Reg_Number, Mobile, Tel_Home, Ext_Number, Email, Private_Email, Address, Gender, Birth_Date, Marital_Status, Education_ID, Manager_ID, Role_ID', 'safe', 'on'=>'search'),
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
			'division' => array(self::BELONGS_TO, 'Division', 'Division_ID'),
			'dep' => array(self::BELONGS_TO, 'Department', 'Dep_ID'),
			'job' => array(self::BELONGS_TO, 'Job', 'Job_ID'),
			'education' => array(self::BELONGS_TO, 'Education', 'Education_ID'),
			'manager' => array(self::BELONGS_TO, 'Employees', 'Manager_ID'),
			'employees' => array(self::HAS_MANY, 'Employees', 'Manager_ID'),
			'workloads' => array(self::HAS_MANY, 'Workload', 'EmpNo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'EmpNo' => 'Emp No',
			'Full_Name' => 'Full Name',
			'Division_ID' => 'Division',
			'Dep_ID' => 'Dep',
			'Job_ID' => 'Job',
			'Entry_Date' => 'Entry Date',
			'Reg_Number' => 'Reg Number',
			'Mobile' => 'Mobile',
			'Tel_Home' => 'Tel Home',
			'Ext_Number' => 'Ext Number',
			'Email' => 'Email',
			'Private_Email' => 'Private Email',
			'Address' => 'Address',
			'Gender' => 'Gender',
			'Birth_Date' => 'Birth Date',
			'Marital_Status' => 'Marital Status',
			'Education_ID' => 'Education',
			'Manager_ID' => 'Manager',
			'Role_ID' => 'Role',
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

		$criteria->compare('EmpNo',$this->EmpNo,true);
		$criteria->compare('Full_Name',$this->Full_Name,true);
		$criteria->compare('Division_ID',$this->Division_ID);
		$criteria->compare('Dep_ID',$this->Dep_ID);
		$criteria->compare('Job_ID',$this->Job_ID);
		$criteria->compare('Entry_Date',$this->Entry_Date,true);
		$criteria->compare('Reg_Number',$this->Reg_Number);
		$criteria->compare('Mobile',$this->Mobile,true);
		$criteria->compare('Tel_Home',$this->Tel_Home,true);
		$criteria->compare('Ext_Number',$this->Ext_Number,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Private_Email',$this->Private_Email,true);
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('Gender',$this->Gender);
		$criteria->compare('Birth_Date',$this->Birth_Date,true);
		$criteria->compare('Marital_Status',$this->Marital_Status);
		$criteria->compare('Education_ID',$this->Education_ID);
		$criteria->compare('Manager_ID',$this->Manager_ID,true);
		$criteria->compare('Role_ID',$this->Role_ID,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}