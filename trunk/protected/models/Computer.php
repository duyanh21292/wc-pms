<?php

/**
 * This is the model class for table "computer".
 *
 * The followings are the available columns in table 'computer':
 * @property integer $Comp_ID
 * @property string $AssetNumber
 * @property string $CompName
 * @property string $ManagerNo
 * @property string $UserNo
 * @property string $CPU
 * @property string $RAM
 * @property string $MB
 * @property string $Graphic
 * @property string $HDD
 * @property string $CDROM
 * @property string $FDD
 * @property string $Sound
 * @property string $Lan
 * @property string $Display
 * @property string $InternetSettings
 * @property string $ASDetails
 * @property string $OperatingSystemAndOthers
 * @property string $Update
 */
class Computer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Computer the static model class
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
		return 'computer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AssetNumber, CompName, ManagerNo, UserNo, Update', 'required'),
			array('AssetNumber, ManagerNo, UserNo', 'length', 'max'=>50),
			array('CompName', 'length', 'max'=>100),
			array('CPU, RAM, MB, Graphic, HDD, CDROM, FDD, Sound, Lan, Display, InternetSettings, ASDetails, OperatingSystemAndOthers', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Comp_ID, AssetNumber, CompName, ManagerNo, UserNo, CPU, RAM, MB, Graphic, HDD, CDROM, FDD, Sound, Lan, Display, InternetSettings, ASDetails, OperatingSystemAndOthers, Update', 'safe', 'on'=>'search'),
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
			'Comp_ID' => 'Comp',
			'AssetNumber' => 'Asset Number',
			'CompName' => 'Comp Name',
			'ManagerNo' => 'Manager No',
			'UserNo' => 'User No',
			'CPU' => 'Cpu',
			'RAM' => 'Ram',
			'MB' => 'Mb',
			'Graphic' => 'Graphic',
			'HDD' => 'Hdd',
			'CDROM' => 'Cdrom',
			'FDD' => 'Fdd',
			'Sound' => 'Sound',
			'Lan' => 'Lan',
			'Display' => 'Display',
			'InternetSettings' => 'Internet Settings',
			'ASDetails' => 'Asdetails',
			'OperatingSystemAndOthers' => 'Operating System And Others',
			'Update' => 'Update',
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

		$criteria->compare('Comp_ID',$this->Comp_ID);
		$criteria->compare('AssetNumber',$this->AssetNumber,true);
		$criteria->compare('CompName',$this->CompName,true);
		$criteria->compare('ManagerNo',$this->ManagerNo,true);
		$criteria->compare('UserNo',$this->UserNo,true);
		$criteria->compare('CPU',$this->CPU,true);
		$criteria->compare('RAM',$this->RAM,true);
		$criteria->compare('MB',$this->MB,true);
		$criteria->compare('Graphic',$this->Graphic,true);
		$criteria->compare('HDD',$this->HDD,true);
		$criteria->compare('CDROM',$this->CDROM,true);
		$criteria->compare('FDD',$this->FDD,true);
		$criteria->compare('Sound',$this->Sound,true);
		$criteria->compare('Lan',$this->Lan,true);
		$criteria->compare('Display',$this->Display,true);
		$criteria->compare('InternetSettings',$this->InternetSettings,true);
		$criteria->compare('ASDetails',$this->ASDetails,true);
		$criteria->compare('OperatingSystemAndOthers',$this->OperatingSystemAndOthers,true);
		$criteria->compare('Update',$this->Update,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}