<?php

class SupplierController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','getAllSuppliers','createNewSupplier','createSupplier','getSupplierDetail','modifySupplier','updateSupplier','supplierMailing','getAllSupplierWindow'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Supplier;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Supplier']))
		{
			$model->attributes=$_POST['Supplier'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->SupplierNo));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Supplier']))
		{
			$model->attributes=$_POST['Supplier'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->SupplierNo));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Supplier');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Supplier('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Supplier']))
			$model->attributes=$_GET['Supplier'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Supplier the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Supplier::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Supplier $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='supplier-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionGetAllSuppliers(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $this->layout = '//layouts/ajaxLayout';
        $model = SupplierInfo::model()->findAll();
        $this->render('view',array(
            'model'=>$model,
        ));
    }

    public function actionCreateNewSupplier(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $this->layout = '//layouts/ajaxLayout';
        $this->render('createSupplier');
    }

    public function actionCreateSupplier(){
        $stype_id = Yii::app()->request->getParam("stype_id");
        $location = Yii::app()->request->getParam("location");
        $country_id = Yii::app()->request->getParam("country_id");
        $name = Yii::app()->request->getParam("name");
        $reg_no = Yii::app()->request->getParam("reg_no");
        $user_id = Yii::app()->request->getParam("user_id");
        $pass = Yii::app()->request->getParam("pass");
        $zip_code = Yii::app()->request->getParam("zip_code");
        $address = Yii::app()->request->getParam("address");
        $tel = Yii::app()->request->getParam("tel");
        $fax = Yii::app()->request->getParam("fax");
        $mobile = Yii::app()->request->getParam("mobile");
        $email1 = Yii::app()->request->getParam("email1");
        $email2 = Yii::app()->request->getParam("email2");
        $website = Yii::app()->request->getParam("website");
        $bank_name = Yii::app()->request->getParam("bank_name");
        $branch_name = Yii::app()->request->getParam("branch_name");
        $branch_address = Yii::app()->request->getParam("branch_address");
        $beneficiary_name = Yii::app()->request->getParam("beneficiary_name");
        $account_no = Yii::app()->request->getParam("account_no");
        $level_id = Yii::app()->request->getParam("level_id");
        $currency_id = Yii::app()->request->getParam("currency_id");
        $language_pair_id = Yii::app()->request->getParam("language_pair_id");
        $atask_id = Yii::app()->request->getParam("atask_id");
        $mindustry_id = Yii::app()->request->getParam("mindustry_id");
        $status = Yii::app()->request->getParam("status");
        $reg_date = Yii::app()->request->getParam("reg_date");
        $modify_date = Yii::app()->request->getParam("modify_date");

        $all_supp = Supplier::model()->findAll();
        $count = count($all_supp);
        $supp_no = '';
        for ($i = 1; $i < 5;$i++) {
            $j = 5 - strlen((string) ($count + 1));
            if($i == $j){
                $supp_no = $supp_no.($count + 1);
                break;
            }
            $supp_no = $supp_no.'0';
        }

        $supp_no = 'VN-SU-'.$supp_no;

        $model = new Supplier();
        $model->SupplierNo = $supp_no;
        $model->SType_ID = $stype_id;
        $model->Location = $location;
        $model->Country_ID = $country_id;
        $model->Name = $name;
        $model->RegistrationNo = $reg_no;
        $model->UserID = $user_id;
        $model->Password = $pass;
        $model->ZipCode = $zip_code;
        $model->Address = $address;
        $model->Tel = $tel;
        $model->Fax = $fax;
        $model->Mobile = $mobile;
        $model->Email1 = $email1;
        $model->Email2 = $email2;
        $model->Website = $website;
        $model->BankName = $bank_name;
        $model->BranchName = $branch_name;
        $model->BranchAddress = $branch_address;
        $model->BeneficiaryName = $beneficiary_name;
        $model->AccountNo = $account_no;
        $model->SLevel_ID = $level_id;
        $model->Currency_ID = $currency_id;
        $model->Language_Pair_ID = $language_pair_id;
        $model->ATask_ID = $atask_id;
        $model->MIndustry_ID = $mindustry_id;
        $model->Status = $status;
        $model->RegDate = $reg_date;
        $model->ModifyDate = $modify_date;

        echo $model->save();
    }

    public function actionUpdateSupplier(){
        $supplier_no = Yii::app()->request->getParam("supplier_no");
        $stype_id = Yii::app()->request->getParam("stype_id");
        $location = Yii::app()->request->getParam("location");
        $country_id = Yii::app()->request->getParam("country_id");
        $name = Yii::app()->request->getParam("name");
        $reg_no = Yii::app()->request->getParam("reg_no");
        $user_id = Yii::app()->request->getParam("user_id");
        $pass = Yii::app()->request->getParam("pass");
        $zip_code = Yii::app()->request->getParam("zip_code");
        $address = Yii::app()->request->getParam("address");
        $tel = Yii::app()->request->getParam("tel");
        $fax = Yii::app()->request->getParam("fax");
        $mobile = Yii::app()->request->getParam("mobile");
        $email1 = Yii::app()->request->getParam("email1");
        $email2 = Yii::app()->request->getParam("email2");
        $website = Yii::app()->request->getParam("website");
        $bank_name = Yii::app()->request->getParam("bank_name");
        $branch_name = Yii::app()->request->getParam("branch_name");
        $branch_address = Yii::app()->request->getParam("branch_address");
        $beneficiary_name = Yii::app()->request->getParam("beneficiary_name");
        $account_no = Yii::app()->request->getParam("account_no");
        $level_id = Yii::app()->request->getParam("level_id");
        $currency_id = Yii::app()->request->getParam("currency_id");
        $language_pair_id = Yii::app()->request->getParam("language_pair_id");
        $atask_id = Yii::app()->request->getParam("atask_id");
        $mindustry_id = Yii::app()->request->getParam("mindustry_id");
        $status = Yii::app()->request->getParam("status");
        $modify_date = Yii::app()->request->getParam("modify_date");

        $criteria = new CDbCriteria();
        $criteria->condition = 'SupplierNo=:supplier_no';
        $criteria->params = array(':supplier_no'=>$supplier_no);
        $model = Supplier::model()->find($criteria);
        $model->SType_ID = $stype_id;
        $model->Location = $location;
        $model->Country_ID = $country_id;
        $model->Name = $name;
        $model->RegistrationNo = $reg_no;
        $model->UserID = $user_id;
        $model->Password = $pass;
        $model->ZipCode = $zip_code;
        $model->Address = $address;
        $model->Tel = $tel;
        $model->Fax = $fax;
        $model->Mobile = $mobile;
        $model->Email1 = $email1;
        $model->Email2 = $email2;
        $model->Website = $website;
        $model->BankName = $bank_name;
        $model->BranchName = $branch_name;
        $model->BranchAddress = $branch_address;
        $model->BeneficiaryName = $beneficiary_name;
        $model->AccountNo = $account_no;
        $model->SLevel_ID = $level_id;
        $model->Currency_ID = $currency_id;
        $model->Language_Pair_ID = $language_pair_id;
        $model->ATask_ID = $atask_id;
        $model->MIndustry_ID = $mindustry_id;
        $model->Status = $status;
        $model->ModifyDate = $modify_date;

        echo $model->save();
    }

    public function actionGetSupplierDetail(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $supplier_no = Yii::app()->request->getParam("supplier_no");
        $criteria = new CDbCriteria();
        $criteria->condition = 'SupplierNo=:supplier_no';
        $criteria->params = array(':supplier_no'=>$supplier_no);
        $model = SupplierInfo::model()->find($criteria);
        $this->layout = '//layouts/ajaxLayout';
        $this->render('supplierDetail',array(
            'model'=>$model,
        ));
    }

    public function actionModifySupplier(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $supplier_no = Yii::app()->request->getParam("supplier_no");
        $criteria = new CDbCriteria();
        $criteria->condition = 'SupplierNo=:supplier_no';
        $criteria->params = array(':supplier_no'=>$supplier_no);
        $model = SupplierInfo::model()->find($criteria);

        $this->layout = '//layouts/ajaxLayout';
        $this->render('modifySupplier',array(
            'model'=>$model,
        ));
    }

    public function actionSupplierMailing(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $this->layout = '//layouts/ajaxLayout';
        $model = SupplierInfo::model()->findAll();
        $this->render('supplierMailing',array(
            'model'=>$model,
        ));
    }

    public function actionGetAllSupplierWindow(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $model = SupplierInfo::model()->findAll();
        $this->renderPartial('supplierChooserWindow',array(
            'model'=>$model,
        ));
    }
}
