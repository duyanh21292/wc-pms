<?php

/**
 * This is the model class for table "prj_amount".
 *
 * The followings are the available columns in table 'prj_amount':
 * @property string $ProjectNo
 * @property string $TotalAmount
 */
class PrjAmount extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PrjAmount the static model class
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
		return 'prj_amount';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProjectNo', 'required'),
			array('ProjectNo', 'length', 'max'=>50),
			array('TotalAmount', 'length', 'max'=>52),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ProjectNo, TotalAmount', 'safe', 'on'=>'search'),
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
			'ProjectNo' => 'Project No',
			'TotalAmount' => 'Total Amount',
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

		$criteria->compare('ProjectNo',$this->ProjectNo,true);
		$criteria->compare('TotalAmount',$this->TotalAmount,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}