<?php

/**
 * This is the model class for table "jobassigns".
 *
 * The followings are the available columns in table 'jobassigns':
 * @property integer $JobAssign_ID
 * @property string $ProjectNo
 * @property string $EmpNo
 * @property integer $Task_ID
 * @property integer $Activities_ID
 * @property integer $Unit_ID
 * @property integer $Quantity
 * @property integer $AssignedHour
 * @property string $StartDate
 * @property string $EndDate
 * @property string $Comment
 * @property string $Status
 */
class Jobassigns extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Jobassigns the static model class
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
		return 'jobassigns';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProjectNo, EmpNo, Task_ID, Activities_ID, Quantity, AssignedHour, StartDate, EndDate, Status', 'required'),
			array('Task_ID, Activities_ID, Unit_ID, Quantity, AssignedHour', 'numerical', 'integerOnly'=>true),
			array('ProjectNo, EmpNo', 'length', 'max'=>50),
			array('Status', 'length', 'max'=>10),
			array('Comment', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('JobAssign_ID, ProjectNo, EmpNo, Task_ID, Activities_ID, Unit_ID, Quantity, AssignedHour, StartDate, EndDate, Comment, Status', 'safe', 'on'=>'search'),
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
			'EmpNo' => 'Emp No',
			'Task_ID' => 'Task',
			'Activities_ID' => 'Activities',
			'Unit_ID' => 'Unit',
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
		$criteria->compare('EmpNo',$this->EmpNo,true);
		$criteria->compare('Task_ID',$this->Task_ID);
		$criteria->compare('Activities_ID',$this->Activities_ID);
		$criteria->compare('Unit_ID',$this->Unit_ID);
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