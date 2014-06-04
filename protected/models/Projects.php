<?php

/**
 * This is the model class for table "projects".
 *
 * The followings are the available columns in table 'projects':
 * @property string $ProjectNo
 * @property string $SaleManagerNo
 * @property string $ProjectManagerNo
 * @property string $ProjectName
 * @property string $Password
 * @property integer $Client_ID
 * @property integer $C_Contact_ID
 * @property integer $C_FContact_ID
 * @property string $C_PoNo
 * @property string $C_ProjectNo
 * @property string $Budget
 * @property integer $Division_ID
 * @property integer $Industry_ID
 * @property integer $Status_ID
 * @property integer $FStatus_ID
 * @property string $RegDate
 * @property string $DueDate
 * @property string $Balance
 * @property string $InternalCost
 * @property string $VATTAX
 * @property string $BuyInsAmount
 * @property string $Amount
 * @property string $GrossMargin
 * @property integer $Currency_ID
 * @property string $PoFile
 * @property string $QuoteFile
 */
class Projects extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Projects the static model class
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
		return 'projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProjectNo, SaleManagerNo, ProjectManagerNo, ProjectName, Client_ID, Division_ID, Industry_ID, RegDate, DueDate', 'required'),
			array('Client_ID, C_Contact_ID, C_FContact_ID, Division_ID, Industry_ID, Status_ID, FStatus_ID, Currency_ID', 'numerical', 'integerOnly'=>true),
			array('ProjectNo, SaleManagerNo, ProjectManagerNo, Password, C_PoNo, C_ProjectNo', 'length', 'max'=>50),
			array('ProjectName', 'length', 'max'=>250),
			array('Budget, Balance, InternalCost, VATTAX, BuyInsAmount, Amount, GrossMargin', 'length', 'max'=>10),
			array('PoFile, QuoteFile', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ProjectNo, SaleManagerNo, ProjectManagerNo, ProjectName, Password, Client_ID, C_Contact_ID, C_FContact_ID, C_PoNo, C_ProjectNo, Budget, Division_ID, Industry_ID, Status_ID, FStatus_ID, RegDate, DueDate, Balance, InternalCost, VATTAX, BuyInsAmount, Amount, GrossMargin, Currency_ID, PoFile, QuoteFile', 'safe', 'on'=>'search'),
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
			'ProjectManagerNo' => 'Project Manager No',
			'ProjectName' => 'Project Name',
			'Password' => 'Password',
			'Client_ID' => 'Client',
			'C_Contact_ID' => 'C Contact',
			'C_FContact_ID' => 'C Fcontact',
			'C_PoNo' => 'C Po No',
			'C_ProjectNo' => 'C Project No',
			'Budget' => 'Budget',
			'Division_ID' => 'Division',
			'Industry_ID' => 'Industry',
			'Status_ID' => 'Status',
			'FStatus_ID' => 'Fstatus',
			'RegDate' => 'Reg Date',
			'DueDate' => 'Due Date',
			'Balance' => 'Balance',
			'InternalCost' => 'Internal Cost',
			'VATTAX' => 'Vattax',
			'BuyInsAmount' => 'Buy Ins Amount',
			'Amount' => 'Amount',
			'GrossMargin' => 'Gross Margin',
			'Currency_ID' => 'Currency',
			'PoFile' => 'Po File',
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
		$criteria->compare('ProjectManagerNo',$this->ProjectManagerNo,true);
		$criteria->compare('ProjectName',$this->ProjectName,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('Client_ID',$this->Client_ID);
		$criteria->compare('C_Contact_ID',$this->C_Contact_ID);
		$criteria->compare('C_FContact_ID',$this->C_FContact_ID);
		$criteria->compare('C_PoNo',$this->C_PoNo,true);
		$criteria->compare('C_ProjectNo',$this->C_ProjectNo,true);
		$criteria->compare('Budget',$this->Budget,true);
		$criteria->compare('Division_ID',$this->Division_ID);
		$criteria->compare('Industry_ID',$this->Industry_ID);
		$criteria->compare('Status_ID',$this->Status_ID);
		$criteria->compare('FStatus_ID',$this->FStatus_ID);
		$criteria->compare('RegDate',$this->RegDate,true);
		$criteria->compare('DueDate',$this->DueDate,true);
		$criteria->compare('Balance',$this->Balance,true);
		$criteria->compare('InternalCost',$this->InternalCost,true);
		$criteria->compare('VATTAX',$this->VATTAX,true);
		$criteria->compare('BuyInsAmount',$this->BuyInsAmount,true);
		$criteria->compare('Amount',$this->Amount,true);
		$criteria->compare('GrossMargin',$this->GrossMargin,true);
		$criteria->compare('Currency_ID',$this->Currency_ID);
		$criteria->compare('PoFile',$this->PoFile,true);
		$criteria->compare('QuoteFile',$this->QuoteFile,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}