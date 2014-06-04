<?php

/**
 * This is the model class for table "supplier_info".
 *
 * The followings are the available columns in table 'supplier_info':
 * @property string $SupplierNo
 * @property integer $SType_ID
 * @property string $SupplierType
 * @property string $TypeDescription
 * @property string $Location
 * @property integer $Country_ID
 * @property string $CountryName
 * @property string $SupplierName
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
 * @property string $Level_Name
 * @property integer $Currency_ID
 * @property string $CurrencyNo
 * @property string $Language_Pair_ID
 * @property string $Language_Pair_Name
 * @property string $ATask_ID
 * @property string $Task_Name
 * @property string $MIndustry_ID
 * @property string $Industry_Name
 * @property string $Status
 * @property string $RegDate
 * @property string $ModifyDate
 */
class SupplierInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SupplierInfo the static model class
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
		return 'supplier_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('SupplierNo, SType_ID, Location, Country_ID, SupplierName, UserID, Password', 'required'),
			array('SType_ID, Country_ID, SLevel_ID, Currency_ID', 'numerical', 'integerOnly'=>true),
			array('SupplierNo, SupplierType, Location, ZipCode, Tel, Fax, Mobile, BeneficiaryName, Status', 'length', 'max'=>50),
			array('CountryName', 'length', 'max'=>150),
			array('SupplierName', 'length', 'max'=>200),
			array('RegistrationNo, Level_Name, CurrencyNo', 'length', 'max'=>20),
			array('UserID, Password, Email1, Email2, Website, BranchName, AccountNo', 'length', 'max'=>100),
			array('Language_Pair_Name, Task_Name, Industry_Name', 'length', 'max'=>2000),
			array('TypeDescription, Address, BankName, BranchAddress, Language_Pair_ID, ATask_ID, MIndustry_ID, RegDate, ModifyDate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('SupplierNo, SType_ID, SupplierType, TypeDescription, Location, Country_ID, CountryName, SupplierName, RegistrationNo, UserID, Password, ZipCode, Address, Tel, Fax, Mobile, Email1, Email2, Website, BankName, BranchName, BranchAddress, BeneficiaryName, AccountNo, SLevel_ID, Level_Name, Currency_ID, CurrencyNo, Language_Pair_ID, Language_Pair_Name, ATask_ID, Task_Name, MIndustry_ID, Industry_Name, Status, RegDate, ModifyDate', 'safe', 'on'=>'search'),
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
			'SupplierType' => 'Supplier Type',
			'TypeDescription' => 'Type Description',
			'Location' => 'Location',
			'Country_ID' => 'Country',
			'CountryName' => 'Country Name',
			'SupplierName' => 'Supplier Name',
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
			'Level_Name' => 'Level Name',
			'Currency_ID' => 'Currency',
			'CurrencyNo' => 'Currency No',
			'Language_Pair_ID' => 'Language Pair',
			'Language_Pair_Name' => 'Language Pair Name',
			'ATask_ID' => 'Atask',
			'Task_Name' => 'Task Name',
			'MIndustry_ID' => 'Mindustry',
			'Industry_Name' => 'Industry Name',
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
		$criteria->compare('SupplierType',$this->SupplierType,true);
		$criteria->compare('TypeDescription',$this->TypeDescription,true);
		$criteria->compare('Location',$this->Location,true);
		$criteria->compare('Country_ID',$this->Country_ID);
		$criteria->compare('CountryName',$this->CountryName,true);
		$criteria->compare('SupplierName',$this->SupplierName,true);
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
		$criteria->compare('Level_Name',$this->Level_Name,true);
		$criteria->compare('Currency_ID',$this->Currency_ID);
		$criteria->compare('CurrencyNo',$this->CurrencyNo,true);
		$criteria->compare('Language_Pair_ID',$this->Language_Pair_ID,true);
		$criteria->compare('Language_Pair_Name',$this->Language_Pair_Name,true);
		$criteria->compare('ATask_ID',$this->ATask_ID,true);
		$criteria->compare('Task_Name',$this->Task_Name,true);
		$criteria->compare('MIndustry_ID',$this->MIndustry_ID,true);
		$criteria->compare('Industry_Name',$this->Industry_Name,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('RegDate',$this->RegDate,true);
		$criteria->compare('ModifyDate',$this->ModifyDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}