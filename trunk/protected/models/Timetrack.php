<?php

/**
 * This is the model class for table "timetrack".
 *
 * The followings are the available columns in table 'timetrack':
 * @property integer $Timtrack_ID
 * @property integer $JobAssign_ID
 * @property string $Date
 * @property string $StartTime
 * @property string $EndTime
 * @property integer $Task_ID
 * @property integer $Activities_ID
 * @property string $Unit
 * @property integer $Quantity
 * @property string $Comment
 */
class Timetrack extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Timetrack the static model class
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
		return 'timetrack';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('JobAssign_ID, Date, StartTime, EndTime, Task_ID, Activities_ID', 'required'),
			array('JobAssign_ID, Task_ID, Activities_ID, Quantity', 'numerical', 'integerOnly'=>true),
			array('Unit', 'length', 'max'=>50),
			array('Comment', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Timtrack_ID, JobAssign_ID, Date, StartTime, EndTime, Task_ID, Activities_ID, Unit, Quantity, Comment', 'safe', 'on'=>'search'),
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
			'Timtrack_ID' => 'Timtrack',
			'JobAssign_ID' => 'Job Assign',
			'Date' => 'Date',
			'StartTime' => 'Start Time',
			'EndTime' => 'End Time',
			'Task_ID' => 'Task',
			'Activities_ID' => 'Activities',
			'Unit' => 'Unit',
			'Quantity' => 'Quantity',
			'Comment' => 'Comment',
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

		$criteria->compare('Timtrack_ID',$this->Timtrack_ID);
		$criteria->compare('JobAssign_ID',$this->JobAssign_ID);
		$criteria->compare('Date',$this->Date,true);
		$criteria->compare('StartTime',$this->StartTime,true);
		$criteria->compare('EndTime',$this->EndTime,true);
		$criteria->compare('Task_ID',$this->Task_ID);
		$criteria->compare('Activities_ID',$this->Activities_ID);
		$criteria->compare('Unit',$this->Unit,true);
		$criteria->compare('Quantity',$this->Quantity);
		$criteria->compare('Comment',$this->Comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}