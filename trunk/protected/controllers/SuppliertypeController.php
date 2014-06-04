<?php

class SuppliertypeController extends Controller
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
				'actions'=>array('index','view','getAllSupplierType','getAllSupplierTypeRadio'),
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
		$model=new Suppliertype;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Suppliertype']))
		{
			$model->attributes=$_POST['Suppliertype'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->SType_ID));
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

		if(isset($_POST['Suppliertype']))
		{
			$model->attributes=$_POST['Suppliertype'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->SType_ID));
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
		$dataProvider=new CActiveDataProvider('Suppliertype');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Suppliertype('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Suppliertype']))
			$model->attributes=$_GET['Suppliertype'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Suppliertype the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Suppliertype::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Suppliertype $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='suppliertype-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionGetAllSupplierType(){
        $result='';
        $model = Suppliertype::model()->findAll();
        foreach ($model as $object) {
            $result = $result.'<a class="nav_item_link" href="#"><div class="nav_item">'.$object->Name.'</div></a>';
        }
        echo $result;
    }

    public function actionGetAllSupplierTypeRadio(){
        $result='';
        $model = Suppliertype::model()->findAll();
        $flag = true;
        foreach ($model as $object) {
            $class = '';
            if($object->SType_ID == 1) {
                $class = 'supp_company';
            } elseif ($object->SType_ID == 2) {
                $class = 'supp_freelancer';
            }
            $checked = '';
            if ($flag) $checked = 'checked';
            $result = $result.'<div class="frame_title supplier_type_name '.$class.'">
                        <input type="radio" name="supplier_type" value="'.$object->SType_ID.'" style="top: -4px;margin-right: 5px" '.$checked.' onclick="selectSupplierType(\''.$object->SType_ID.'\',\''.$object->Name.'\')">
                        '.$object->Name.'
                        </div>';
            $flag = false;
        }
        echo $result;
    }
}
