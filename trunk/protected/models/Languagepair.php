<?php

/**
 * This is the model class for table "languagepair".
 *
 * The followings are the available columns in table 'languagepair':
 * @property integer $Language_Pair_ID
 * @property string $Name
 * @property string $FromLang
 * @property string $ToLang
 */
class Languagepair extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Languagepair the static model class
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
		return 'languagepair';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, FromLang, ToLang', 'required'),
			array('Name', 'length', 'max'=>10),
			array('FromLang, ToLang', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Language_Pair_ID, Name, FromLang, ToLang', 'safe', 'on'=>'search'),
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
			'Language_Pair_ID' => 'Language Pair',
			'Name' => 'Name',
			'FromLang' => 'From Lang',
			'ToLang' => 'To Lang',
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

		$criteria->compare('Language_Pair_ID',$this->Language_Pair_ID);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('FromLang',$this->FromLang,true);
		$criteria->compare('ToLang',$this->ToLang,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}