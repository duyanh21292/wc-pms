<?php

/**
 * This is the model class for table "po".
 *
 * The followings are the available columns in table 'po':
 * @property string $PoNo
 * @property string $ProjectNo
 * @property string $SupplierNo
 * @property integer $SContact_ID
 * @property integer $Language_Pair_ID
 * @property integer $ATask_ID
 * @property integer $Unit_ID
 * @property string $Quantity
 * @property string $UPrice
 * @property integer $Currency_ID
 * @property string $FileItem
 * @property string $RegDate
 * @property string $DueDate
 * @property string $WorkLoad
 * @property integer $DeliveryMethod_ID
 * @property string $Comments
 * @property string $Amount
 * @property integer $Status_ID
 */
class Po extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Po the static model class
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
		return 'po';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PoNo, ProjectNo, SupplierNo, Language_Pair_ID, ATask_ID, Unit_ID, Quantity, UPrice, Currency_ID', 'required'),
			array('SContact_ID, Language_Pair_ID, ATask_ID, Unit_ID, Currency_ID, DeliveryMethod_ID, Status_ID', 'numerical', 'integerOnly'=>true),
			array('PoNo, ProjectNo, SupplierNo, Quantity, UPrice, WorkLoad', 'length', 'max'=>50),
			array('FileItem', 'length', 'max'=>100),
			array('Amount', 'length', 'max'=>10),
			array('RegDate, DueDate, Comments', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PoNo, ProjectNo, SupplierNo, SContact_ID, Language_Pair_ID, ATask_ID, Unit_ID, Quantity, UPrice, Currency_ID, FileItem, RegDate, DueDate, WorkLoad, DeliveryMethod_ID, Comments, Amount, Status_ID', 'safe', 'on'=>'search'),
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
			'SupplierNo' => 'Supplier No',
			'SContact_ID' => 'Scontact',
			'Language_Pair_ID' => 'Language Pair',
			'ATask_ID' => 'Atask',
			'Unit_ID' => 'Unit',
			'Quantity' => 'Quantity',
			'UPrice' => 'Uprice',
			'Currency_ID' => 'Currency',
			'FileItem' => 'File Item',
			'RegDate' => 'Reg Date',
			'DueDate' => 'Due Date',
			'WorkLoad' => 'Work Load',
			'DeliveryMethod_ID' => 'Delivery Method',
			'Comments' => 'Comments',
			'Amount' => 'Amount',
			'Status_ID' => 'Status',
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
		$criteria->compare('SupplierNo',$this->SupplierNo,true);
		$criteria->compare('SContact_ID',$this->SContact_ID);
		$criteria->compare('Language_Pair_ID',$this->Language_Pair_ID);
		$criteria->compare('ATask_ID',$this->ATask_ID);
		$criteria->compare('Unit_ID',$this->Unit_ID);
		$criteria->compare('Quantity',$this->Quantity,true);
		$criteria->compare('UPrice',$this->UPrice,true);
		$criteria->compare('Currency_ID',$this->Currency_ID);
		$criteria->compare('FileItem',$this->FileItem,true);
		$criteria->compare('RegDate',$this->RegDate,true);
		$criteria->compare('DueDate',$this->DueDate,true);
		$criteria->compare('WorkLoad',$this->WorkLoad,true);
		$criteria->compare('DeliveryMethod_ID',$this->DeliveryMethod_ID);
		$criteria->compare('Comments',$this->Comments,true);
		$criteria->compare('Amount',$this->Amount,true);
		$criteria->compare('Status_ID',$this->Status_ID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}