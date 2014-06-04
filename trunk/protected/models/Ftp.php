<?php

/**
 * This is the model class for table "ftp".
 *
 * The followings are the available columns in table 'ftp':
 * @property integer $Ftp_ID
 * @property integer $Client_ID
 * @property string $Name
 * @property string $Url
 * @property string $UserName
 * @property string $Password
 * @property string $Memo
 */
class Ftp extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ftp the static model class
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
		return 'ftp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, Url, UserName, Password', 'required'),
			array('Client_ID', 'numerical', 'integerOnly'=>true),
			array('Name', 'length', 'max'=>200),
			array('UserName, Password', 'length', 'max'=>100),
			array('Memo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Ftp_ID, Client_ID, Name, Url, UserName, Password, Memo', 'safe', 'on'=>'search'),
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
			'Ftp_ID' => 'Ftp',
			'Client_ID' => 'Client',
			'Name' => 'Name',
			'Url' => 'Url',
			'UserName' => 'User Name',
			'Password' => 'Password',
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

		$criteria->compare('Ftp_ID',$this->Ftp_ID);
		$criteria->compare('Client_ID',$this->Client_ID);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Url',$this->Url,true);
		$criteria->compare('UserName',$this->UserName,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('Memo',$this->Memo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}