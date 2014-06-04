<?php

/**
 * This is the model class for table "all_employees".
 *
 * The followings are the available columns in table 'all_employees':
 * @property string $EmpNo
 * @property string $User_ID
 * @property string $Full_Name
 * @property integer $Division_ID
 * @property string $DivisionName
 * @property integer $Dep_ID
 * @property string $DepName
 * @property integer $Job_ID
 * @property string $JobName
 * @property string $Entry_Date
 * @property integer $Reg_Number
 * @property string $Mobile
 * @property string $Tel_Home
 * @property string $Ext_Number
 * @property string $Email
 * @property string $Private_Email
 * @property string $Address
 * @property string $Gender
 * @property string $Birth_Date
 * @property integer $Marital_Status
 * @property string $EducationName
 * @property string $Manager_Name
 * @property string $role_id
 * @property string $Status
 */
class AllEmployees extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AllEmployees the static model class
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
		return 'all_employees';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EmpNo, Full_Name, Division_ID, Dep_ID, Job_ID, Entry_Date, Mobile, Email, Private_Email, Address, Birth_Date, Marital_Status', 'required'),
			array('Division_ID, Dep_ID, Job_ID, Reg_Number, Marital_Status', 'numerical', 'integerOnly'=>true),
			array('EmpNo, User_ID, Email, Private_Email, EducationName, role_id, Status', 'length', 'max'=>50),
			array('Full_Name, DivisionName, DepName, JobName, Manager_Name', 'length', 'max'=>100),
			array('Mobile, Tel_Home, Ext_Number', 'length', 'max'=>20),
			array('Address', 'length', 'max'=>200),
			array('Gender', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('EmpNo, User_ID, Full_Name, Division_ID, DivisionName, Dep_ID, DepName, Job_ID, JobName, Entry_Date, Reg_Number, Mobile, Tel_Home, Ext_Number, Email, Private_Email, Address, Gender, Birth_Date, Marital_Status, EducationName, Manager_Name, role_id, Status', 'safe', 'on'=>'search'),
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
			'EmpNo' => 'Emp No',
			'User_ID' => 'User',
			'Full_Name' => 'Full Name',
			'Division_ID' => 'Division',
			'DivisionName' => 'Division Name',
			'Dep_ID' => 'Dep',
			'DepName' => 'Dep Name',
			'Job_ID' => 'Job',
			'JobName' => 'Job Name',
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
			'EducationName' => 'Education Name',
			'Manager_Name' => 'Manager Name',
			'role_id' => 'Role',
			'Status' => 'Status',
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
		$criteria->compare('User_ID',$this->User_ID,true);
		$criteria->compare('Full_Name',$this->Full_Name,true);
		$criteria->compare('Division_ID',$this->Division_ID);
		$criteria->compare('DivisionName',$this->DivisionName,true);
		$criteria->compare('Dep_ID',$this->Dep_ID);
		$criteria->compare('DepName',$this->DepName,true);
		$criteria->compare('Job_ID',$this->Job_ID);
		$criteria->compare('JobName',$this->JobName,true);
		$criteria->compare('Entry_Date',$this->Entry_Date,true);
		$criteria->compare('Reg_Number',$this->Reg_Number);
		$criteria->compare('Mobile',$this->Mobile,true);
		$criteria->compare('Tel_Home',$this->Tel_Home,true);
		$criteria->compare('Ext_Number',$this->Ext_Number,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Private_Email',$this->Private_Email,true);
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('Gender',$this->Gender,true);
		$criteria->compare('Birth_Date',$this->Birth_Date,true);
		$criteria->compare('Marital_Status',$this->Marital_Status);
		$criteria->compare('EducationName',$this->EducationName,true);
		$criteria->compare('Manager_Name',$this->Manager_Name,true);
		$criteria->compare('role_id',$this->role_id,true);
		$criteria->compare('Status',$this->Status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}