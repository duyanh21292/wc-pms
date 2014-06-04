<?php

/**
 * This is the model class for table "projects_info".
 *
 * The followings are the available columns in table 'projects_info':
 * @property string $ProjectNo
 * @property string $SaleManagerNo
 * @property string $SaleManagerName
 * @property string $ProjectManagerNo
 * @property string $ProjectManagerName
 * @property string $ProjectName
 * @property integer $Client_ID
 * @property string $ClientName
 * @property integer $C_Contact_ID
 * @property string $ContactName
 * @property string $ContactEmail
 * @property string $ContactMobile
 * @property integer $C_FContact_ID
 * @property string $FContactName
 * @property string $FContactEmail
 * @property string $FContactMobile
 * @property string $C_PoNo
 * @property string $C_ProjectNo
 * @property string $Budget
 * @property integer $Division_ID
 * @property string $DivisionName
 * @property integer $Status_ID
 * @property string $Status
 * @property integer $FStatus_ID
 * @property string $FStatus
 * @property string $RegDate
 * @property string $DueDate
 * @property string $Balance
 * @property string $PoFile
 * @property string $InternalCost
 * @property string $VATTAX
 * @property string $BuyInsAmount
 * @property integer $Industry_ID
 * @property string $IndustryName
 * @property string $Password
 * @property integer $Currency_ID
 * @property string $CurrencyNo
 * @property string $Amount
 * @property string $GrossMargin
 * @property string $QuoteFile
 */
class ProjectsInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProjectsInfo the static model class
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
		return 'projects_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProjectNo, SaleManagerNo, ProjectManagerNo, ProjectName, Client_ID, Division_ID, RegDate, DueDate, Industry_ID', 'required'),
			array('Client_ID, C_Contact_ID, C_FContact_ID, Division_ID, Status_ID, FStatus_ID, Industry_ID, Currency_ID', 'numerical', 'integerOnly'=>true),
			array('ProjectNo, SaleManagerNo, ProjectManagerNo, ContactMobile, FContactMobile, C_PoNo, C_ProjectNo, Password', 'length', 'max'=>50),
			array('SaleManagerName, ProjectManagerName, ContactName, ContactEmail, FContactName, FContactEmail, DivisionName, IndustryName', 'length', 'max'=>100),
			array('ProjectName', 'length', 'max'=>250),
			array('ClientName', 'length', 'max'=>200),
			array('Budget, Balance, InternalCost, VATTAX, BuyInsAmount, Amount, GrossMargin', 'length', 'max'=>10),
			array('Status, FStatus, CurrencyNo', 'length', 'max'=>20),
			array('PoFile, QuoteFile', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ProjectNo, SaleManagerNo, SaleManagerName, ProjectManagerNo, ProjectManagerName, ProjectName, Client_ID, ClientName, C_Contact_ID, ContactName, ContactEmail, ContactMobile, C_FContact_ID, FContactName, FContactEmail, FContactMobile, C_PoNo, C_ProjectNo, Budget, Division_ID, DivisionName, Status_ID, Status, FStatus_ID, FStatus, RegDate, DueDate, Balance, PoFile, InternalCost, VATTAX, BuyInsAmount, Industry_ID, IndustryName, Password, Currency_ID, CurrencyNo, Amount, GrossMargin, QuoteFile', 'safe', 'on'=>'search'),
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
			'SaleManagerNo' => 'Sale Manager No',
			'SaleManagerName' => 'Sale Manager Name',
			'ProjectManagerNo' => 'Project Manager No',
			'ProjectManagerName' => 'Project Manager Name',
			'ProjectName' => 'Project Name',
			'Client_ID' => 'Client',
			'ClientName' => 'Client Name',
			'C_Contact_ID' => 'C Contact',
			'ContactName' => 'Contact Name',
			'ContactEmail' => 'Contact Email',
			'ContactMobile' => 'Contact Mobile',
			'C_FContact_ID' => 'C Fcontact',
			'FContactName' => 'Fcontact Name',
			'FContactEmail' => 'Fcontact Email',
			'FContactMobile' => 'Fcontact Mobile',
			'C_PoNo' => 'C Po No',
			'C_ProjectNo' => 'C Project No',
			'Budget' => 'Budget',
			'Division_ID' => 'Division',
			'DivisionName' => 'Division Name',
			'Status_ID' => 'Status',
			'Status' => 'Status',
			'FStatus_ID' => 'Fstatus',
			'FStatus' => 'Fstatus',
			'RegDate' => 'Reg Date',
			'DueDate' => 'Due Date',
			'Balance' => 'Balance',
			'PoFile' => 'Po File',
			'InternalCost' => 'Internal Cost',
			'VATTAX' => 'Vattax',
			'BuyInsAmount' => 'Buy Ins Amount',
			'Industry_ID' => 'Industry',
			'IndustryName' => 'Industry Name',
			'Password' => 'Password',
			'Currency_ID' => 'Currency',
			'CurrencyNo' => 'Currency No',
			'Amount' => 'Amount',
			'GrossMargin' => 'Gross Margin',
			'QuoteFile' => 'Quote File',
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
		$criteria->compare('SaleManagerNo',$this->SaleManagerNo,true);
		$criteria->compare('SaleManagerName',$this->SaleManagerName,true);
		$criteria->compare('ProjectManagerNo',$this->ProjectManagerNo,true);
		$criteria->compare('ProjectManagerName',$this->ProjectManagerName,true);
		$criteria->compare('ProjectName',$this->ProjectName,true);
		$criteria->compare('Client_ID',$this->Client_ID);
		$criteria->compare('ClientName',$this->ClientName,true);
		$criteria->compare('C_Contact_ID',$this->C_Contact_ID);
		$criteria->compare('ContactName',$this->ContactName,true);
		$criteria->compare('ContactEmail',$this->ContactEmail,true);
		$criteria->compare('ContactMobile',$this->ContactMobile,true);
		$criteria->compare('C_FContact_ID',$this->C_FContact_ID);
		$criteria->compare('FContactName',$this->FContactName,true);
		$criteria->compare('FContactEmail',$this->FContactEmail,true);
		$criteria->compare('FContactMobile',$this->FContactMobile,true);
		$criteria->compare('C_PoNo',$this->C_PoNo,true);
		$criteria->compare('C_ProjectNo',$this->C_ProjectNo,true);
		$criteria->compare('Budget',$this->Budget,true);
		$criteria->compare('Division_ID',$this->Division_ID);
		$criteria->compare('DivisionName',$this->DivisionName,true);
		$criteria->compare('Status_ID',$this->Status_ID);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('FStatus_ID',$this->FStatus_ID);
		$criteria->compare('FStatus',$this->FStatus,true);
		$criteria->compare('RegDate',$this->RegDate,true);
		$criteria->compare('DueDate',$this->DueDate,true);
		$criteria->compare('Balance',$this->Balance,true);
		$criteria->compare('PoFile',$this->PoFile,true);
		$criteria->compare('InternalCost',$this->InternalCost,true);
		$criteria->compare('VATTAX',$this->VATTAX,true);
		$criteria->compare('BuyInsAmount',$this->BuyInsAmount,true);
		$criteria->compare('Industry_ID',$this->Industry_ID);
		$criteria->compare('IndustryName',$this->IndustryName,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('Currency_ID',$this->Currency_ID);
		$criteria->compare('CurrencyNo',$this->CurrencyNo,true);
		$criteria->compare('Amount',$this->Amount,true);
		$criteria->compare('GrossMargin',$this->GrossMargin,true);
		$criteria->compare('QuoteFile',$this->QuoteFile,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}