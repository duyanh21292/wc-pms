<?php

/**
 * This is the model class for table "company".
 *
 * The followings are the available columns in table 'company':
 * @property integer $ID
 * @property string $CompanyName
 * @property string $Address
 * @property string $Telephone
 * @property string $Fax
 * @property string $Website
 * @property string $LicenseNo
 * @property string $TaxCode
 * @property string $BusinessLines
 * @property string $RepOffice
 * @property string $NoInitial
 */
class Company extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Company the static model class
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
		return 'company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CompanyName, Address, Telephone, Fax, Website, LicenseNo, TaxCode, BusinessLines, RepOffice, NoInitial', 'required'),
			array('CompanyName', 'length', 'max'=>100),
			array('Telephone, Fax, Website, LicenseNo, TaxCode, RepOffice, NoInitial', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, CompanyName, Address, Telephone, Fax, Website, LicenseNo, TaxCode, BusinessLines, RepOffice, NoInitial', 'safe', 'on'=>'search'),
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
			'ID' => 'ID',
			'CompanyName' => 'Company Name',
			'Address' => 'Address',
			'Telephone' => 'Telephone',
			'Fax' => 'Fax',
			'Website' => 'Website',
			'LicenseNo' => 'License No',
			'TaxCode' => 'Tax Code',
			'BusinessLines' => 'Business Lines',
			'RepOffice' => 'Rep Office',
			'NoInitial' => 'No Initial',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('CompanyName',$this->CompanyName,true);
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('Telephone',$this->Telephone,true);
		$criteria->compare('Fax',$this->Fax,true);
		$criteria->compare('Website',$this->Website,true);
		$criteria->compare('LicenseNo',$this->LicenseNo,true);
		$criteria->compare('TaxCode',$this->TaxCode,true);
		$criteria->compare('BusinessLines',$this->BusinessLines,true);
		$criteria->compare('RepOffice',$this->RepOffice,true);
		$criteria->compare('NoInitial',$this->NoInitial,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}