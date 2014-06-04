<?php

/**
 * This is the model class for table "supplier".
 *
 * The followings are the available columns in table 'supplier':
 * @property string $SupplierNo
 * @property integer $SType_ID
 * @property string $Location
 * @property integer $Country_ID
 * @property string $Name
 * @property string $RegistrationNo
 * @property string $UserID
 * @property string $Password
 * @property string $ZipCode
 * @property string $Address
 * @property string $Tel
 * @property string $Fax
 * @property string $Mobile
 * @property string $Email1
 * @property string $Email2
 * @property string $Website
 * @property string $BankName
 * @property string $BranchName
 * @property string $BranchAddress
 * @property string $BeneficiaryName
 * @property string $AccountNo
 * @property integer $SLevel_ID
 * @property integer $Currency_ID
 * @property string $Language_Pair_ID
 * @property string $ATask_ID
 * @property string $MIndustry_ID
 * @property string $Status
 * @property string $RegDate
 * @property string $ModifyDate
 */
class Supplier extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Supplier the static model class
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
		return 'supplier';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('SupplierNo, SType_ID, Location, Country_ID, Name, UserID, Password', 'required'),
			array('SType_ID, Country_ID, SLevel_ID, Currency_ID', 'numerical', 'integerOnly'=>true),
			array('SupplierNo, Location, ZipCode, Tel, Fax, Mobile, BeneficiaryName, Status', 'length', 'max'=>50),
			array('Name', 'length', 'max'=>200),
			array('RegistrationNo', 'length', 'max'=>20),
			array('UserID, Password, Email1, Email2, Website, BranchName, AccountNo', 'length', 'max'=>100),
			array('Address, BankName, BranchAddress, Language_Pair_ID, ATask_ID, MIndustry_ID, RegDate, ModifyDate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('SupplierNo, SType_ID, Location, Country_ID, Name, RegistrationNo, UserID, Password, ZipCode, Address, Tel, Fax, Mobile, Email1, Email2, Website, BankName, BranchName, BranchAddress, BeneficiaryName, AccountNo, SLevel_ID, Currency_ID, Language_Pair_ID, ATask_ID, MIndustry_ID, Status, RegDate, ModifyDate', 'safe', 'on'=>'search'),
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
			'SupplierNo' => 'Supplier No',
			'SType_ID' => 'Stype',
			'Location' => 'Location',
			'Country_ID' => 'Country',
			'Name' => 'Name',
			'RegistrationNo' => 'Registration No',
			'UserID' => 'User',
			'Password' => 'Password',
			'ZipCode' => 'Zip Code',
			'Address' => 'Address',
			'Tel' => 'Tel',
			'Fax' => 'Fax',
			'Mobile' => 'Mobile',
			'Email1' => 'Email1',
			'Email2' => 'Email2',
			'Website' => 'Website',
			'BankName' => 'Bank Name',
			'BranchName' => 'Branch Name',
			'BranchAddress' => 'Branch Address',
			'BeneficiaryName' => 'Beneficiary Name',
			'AccountNo' => 'Account No',
			'SLevel_ID' => 'Slevel',
			'Currency_ID' => 'Currency',
			'Language_Pair_ID' => 'Language Pair',
			'ATask_ID' => 'Atask',
			'MIndustry_ID' => 'Mindustry',
			'Status' => 'Status',
			'RegDate' => 'Reg Date',
			'ModifyDate' => 'Modify Date',
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

		$criteria->compare('SupplierNo',$this->SupplierNo,true);
		$criteria->compare('SType_ID',$this->SType_ID);
		$criteria->compare('Location',$this->Location,true);
		$criteria->compare('Country_ID',$this->Country_ID);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('RegistrationNo',$this->RegistrationNo,true);
		$criteria->compare('UserID',$this->UserID,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('ZipCode',$this->ZipCode,true);
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('Tel',$this->Tel,true);
		$criteria->compare('Fax',$this->Fax,true);
		$criteria->compare('Mobile',$this->Mobile,true);
		$criteria->compare('Email1',$this->Email1,true);
		$criteria->compare('Email2',$this->Email2,true);
		$criteria->compare('Website',$this->Website,true);
		$criteria->compare('BankName',$this->BankName,true);
		$criteria->compare('BranchName',$this->BranchName,true);
		$criteria->compare('BranchAddress',$this->BranchAddress,true);
		$criteria->compare('BeneficiaryName',$this->BeneficiaryName,true);
		$criteria->compare('AccountNo',$this->AccountNo,true);
		$criteria->compare('SLevel_ID',$this->SLevel_ID);
		$criteria->compare('Currency_ID',$this->Currency_ID);
		$criteria->compare('Language_Pair_ID',$this->Language_Pair_ID,true);
		$criteria->compare('ATask_ID',$this->ATask_ID,true);
		$criteria->compare('MIndustry_ID',$this->MIndustry_ID,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('RegDate',$this->RegDate,true);
		$criteria->compare('ModifyDate',$this->ModifyDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}