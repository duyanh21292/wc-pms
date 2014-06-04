<?php

/**
 * This is the model class for table "jobassigns_info".
 *
 * The followings are the available columns in table 'jobassigns_info':
 * @property integer $JobAssign_ID
 * @property string $ProjectNo
 * @property string $ProjectName
 * @property string $EmpNo
 * @property string $Full_Name
 * @property integer $Task_ID
 * @property string $TaskName
 * @property integer $Activities_ID
 * @property string $ActivitiesName
 * @property integer $Unit_ID
 * @property string $Unit
 * @property integer $Quantity
 * @property integer $AssignedHour
 * @property string $StartDate
 * @property string $EndDate
 * @property string $Comment
 * @property string $Status
 */
class JobassignsInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return JobassignsInfo the static model class
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
		return 'jobassigns_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Task_ID, Activities_ID, Quantity, AssignedHour, StartDate, EndDate, Status', 'required'),
			array('JobAssign_ID, Task_ID, Activities_ID, Unit_ID, Quantity, AssignedHour', 'numerical', 'integerOnly'=>true),
			array('ProjectNo, EmpNo, Unit', 'length', 'max'=>50),
			array('ProjectName', 'length', 'max'=>250),
			array('Full_Name', 'length', 'max'=>100),
			array('TaskName, ActivitiesName', 'length', 'max'=>200),
			array('Status', 'length', 'max'=>10),
			array('Comment', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('JobAssign_ID, ProjectNo, ProjectName, EmpNo, Full_Name, Task_ID, TaskName, Activities_ID, ActivitiesName, Unit_ID, Unit, Quantity, AssignedHour, StartDate, EndDate, Comment, Status', 'safe', 'on'=>'search'),
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
			'JobAssign_ID' => 'Job Assign',
			'ProjectNo' => 'Project No',
			'ProjectName' => 'Project Name',
			'EmpNo' => 'Emp No',
			'Full_Name' => 'Full Name',
			'Task_ID' => 'Task',
			'TaskName' => 'Task Name',
			'Activities_ID' => 'Activities',
			'ActivitiesName' => 'Activities Name',
			'Unit_ID' => 'Unit',
			'Unit' => 'Unit',
			'Quantity' => 'Quantity',
			'AssignedHour' => 'Assigned Hour',
			'StartDate' => 'Start Date',
			'EndDate' => 'End Date',
			'Comment' => 'Comment',
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

		$criteria->compare('JobAssign_ID',$this->JobAssign_ID);
		$criteria->compare('ProjectNo',$this->ProjectNo,true);
		$criteria->compare('ProjectName',$this->ProjectName,true);
		$criteria->compare('EmpNo',$this->EmpNo,true);
		$criteria->compare('Full_Name',$this->Full_Name,true);
		$criteria->compare('Task_ID',$this->Task_ID);
		$criteria->compare('TaskName',$this->TaskName,true);
		$criteria->compare('Activities_ID',$this->Activities_ID);
		$criteria->compare('ActivitiesName',$this->ActivitiesName,true);
		$criteria->compare('Unit_ID',$this->Unit_ID);
		$criteria->compare('Unit',$this->Unit,true);
		$criteria->compare('Quantity',$this->Quantity);
		$criteria->compare('AssignedHour',$this->AssignedHour);
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('EndDate',$this->EndDate,true);
		$criteria->compare('Comment',$this->Comment,true);
		$criteria->compare('Status',$this->Status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}