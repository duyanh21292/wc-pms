<?php

/**
 * This is the model class for table "po_info".
 *
 * The followings are the available columns in table 'po_info':
 * @property string $PoNo
 * @property string $ProjectNo
 * @property string $ProjectName
 * @property string $ProjectManagerName
 * @property string $SupplierNo
 * @property string $SupplierName
 * @property integer $Contact_ID
 * @property string $SupplierContactName
 * @property integer $Language_Pair_ID
 * @property string $LanguagePair
 * @property integer $ATask_ID
 * @property string $AvailableTask
 * @property integer $Unit_ID
 * @property string $Unit
 * @property integer $Currency_ID
 * @property string $Currency
 * @property integer $DeliveryMethod_ID
 * @property string $DeliveryMethodName
 * @property string $Quantity
 * @property string $UPrice
 * @property string $FileItem
 * @property string $RegDate
 * @property string $DueDate
 * @property string $WorkLoad
 * @property string $Comments
 * @property string $Amount
 * @property integer $Status_ID
 * @property string $Status
 */
class PoInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PoInfo the static model class
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
		return 'po_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PoNo, ProjectNo, Quantity, UPrice', 'required'),
			array('Contact_ID, Language_Pair_ID, ATask_ID, Unit_ID, Currency_ID, DeliveryMethod_ID, Status_ID', 'numerical', 'integerOnly'=>true),
			array('PoNo, ProjectNo, SupplierNo, Unit, DeliveryMethodName, Quantity, UPrice, WorkLoad, Status', 'length', 'max'=>50),
			array('ProjectName', 'length', 'max'=>250),
			array('ProjectManagerName, SupplierContactName, FileItem', 'length', 'max'=>100),
			array('SupplierName', 'length', 'max'=>200),
			array('LanguagePair, Amount', 'length', 'max'=>10),
			array('AvailableTask', 'length', 'max'=>150),
			array('Currency', 'length', 'max'=>20),
			array('RegDate, DueDate, Comments', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PoNo, ProjectNo, ProjectName, ProjectManagerName, SupplierNo, SupplierName, Contact_ID, SupplierContactName, Language_Pair_ID, LanguagePair, ATask_ID, AvailableTask, Unit_ID, Unit, Currency_ID, Currency, DeliveryMethod_ID, DeliveryMethodName, Quantity, UPrice, FileItem, RegDate, DueDate, WorkLoad, Comments, Amount, Status_ID, Status', 'safe', 'on'=>'search'),
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
			'PoNo' => 'Po No',
			'ProjectNo' => 'Project No',
			'ProjectName' => 'Project Name',
			'ProjectManagerName' => 'Project Manager Name',
			'SupplierNo' => 'Supplier No',
			'SupplierName' => 'Supplier Name',
			'Contact_ID' => 'Contact',
			'SupplierContactName' => 'Supplier Contact Name',
			'Language_Pair_ID' => 'Language Pair',
			'LanguagePair' => 'Language Pair',
			'ATask_ID' => 'Atask',
			'AvailableTask' => 'Available Task',
			'Unit_ID' => 'Unit',
			'Unit' => 'Unit',
			'Currency_ID' => 'Currency',
			'Currency' => 'Currency',
			'DeliveryMethod_ID' => 'Delivery Method',
			'DeliveryMethodName' => 'Delivery Method Name',
			'Quantity' => 'Quantity',
			'UPrice' => 'Uprice',
			'FileItem' => 'File Item',
			'RegDate' => 'Reg Date',
			'DueDate' => 'Due Date',
			'WorkLoad' => 'Work Load',
			'Comments' => 'Comments',
			'Amount' => 'Amount',
			'Status_ID' => 'Status',
			'Status' => 'Status',
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

		$criteria->compare('PoNo',$this->PoNo,true);
		$criteria->compare('ProjectNo',$this->ProjectNo,true);
		$criteria->compare('ProjectName',$this->ProjectName,true);
		$criteria->compare('ProjectManagerName',$this->ProjectManagerName,true);
		$criteria->compare('SupplierNo',$this->SupplierNo,true);
		$criteria->compare('SupplierName',$this->SupplierName,true);
		$criteria->compare('Contact_ID',$this->Contact_ID);
		$criteria->compare('SupplierContactName',$this->SupplierContactName,true);
		$criteria->compare('Language_Pair_ID',$this->Language_Pair_ID);
		$criteria->compare('LanguagePair',$this->LanguagePair,true);
		$criteria->compare('ATask_ID',$this->ATask_ID);
		$criteria->compare('AvailableTask',$this->AvailableTask,true);
		$criteria->compare('Unit_ID',$this->Unit_ID);
		$criteria->compare('Unit',$this->Unit,true);
		$criteria->compare('Currency_ID',$this->Currency_ID);
		$criteria->compare('Currency',$this->Currency,true);
		$criteria->compare('DeliveryMethod_ID',$this->DeliveryMethod_ID);
		$criteria->compare('DeliveryMethodName',$this->DeliveryMethodName,true);
		$criteria->compare('Quantity',$this->Quantity,true);
		$criteria->compare('UPrice',$this->UPrice,true);
		$criteria->compare('FileItem',$this->FileItem,true);
		$criteria->compare('RegDate',$this->RegDate,true);
		$criteria->compare('DueDate',$this->DueDate,true);
		$criteria->compare('WorkLoad',$this->WorkLoad,true);
		$criteria->compare('Comments',$this->Comments,true);
		$criteria->compare('Amount',$this->Amount,true);
		$criteria->compare('Status_ID',$this->Status_ID);
		$criteria->compare('Status',$this->Status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}