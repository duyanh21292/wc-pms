<?php

class PoController extends Controller
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
				'actions'=>array('index','view','getAllPo','createNewPO','createPO','getAllPrjPo','getPoDetail'),
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
		$model=new Po;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Po']))
		{
			$model->attributes=$_POST['Po'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->PoNo));
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

		if(isset($_POST['Po']))
		{
			$model->attributes=$_POST['Po'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->PoNo));
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
		$dataProvider=new CActiveDataProvider('Po');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Po('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Po']))
			$model->attributes=$_GET['Po'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Po the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Po::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Po $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='po-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionGetAllPo(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $this->layout = '//layouts/ajaxLayout';
        $criteria = new CDbCriteria();
        $criteria->limit = 20;
        $criteria->offset = 0;
        $model = PoInfo::model()->findAll($criteria);
        $this->render('view',array(
            'model'=>$model,
        ));
    }

    public function actionCreatePO(){
        $po_no = Yii::app()->request->getParam("po_no");
        $project_no = Yii::app()->request->getParam("project_no");
        $supplier_no = Yii::app()->request->getParam("supplier_no");
        $s_contact_id = Yii::app()->request->getParam("s_contact_id");
        $language_pair_id = Yii::app()->request->getParam("language_pair_id");
        $a_task_id = Yii::app()->request->getParam("a_task_id");
        $unit_id = Yii::app()->request->getParam("unit_id");
        $quantity = Yii::app()->request->getParam("quantity");
        $u_price = Yii::app()->request->getParam("u_price");
        $currency_id = Yii::app()->request->getParam("currency_id");
        $file_item = Yii::app()->request->getParam("file_item");
        $reg_date = Yii::app()->request->getParam("reg_date");
        $due_date = Yii::app()->request->getParam("due_date");
        $work_load = Yii::app()->request->getParam("work_load");
        $delivery_method_id = Yii::app()->request->getParam("delivery_method_id");
        $comments = Yii::app()->request->getParam("comments");

        $no = 'VNPO-'.$po_no;

        $criteria = new CDbCriteria();
        $criteria->condition = 'PoNo LIKE :po_no';
        $criteria->params = array(':po_no'=>'%'.$no.'%');
        $all_po = Po::model()->findAll($criteria);
        $count = count($all_po);

        for ($i = 1; $i < 4;$i++) {
            $j = 4 - strlen((string) ($count + 1));
            if($i == $j){
                $no = $no.($count + 1);
                break;
            }
            $no = $no.'0';
        }

        $model = new Po();
        $model->PoNo = $no;
        $model->ProjectNo = $project_no;
        $model->SupplierNo = $supplier_no;
        $model->SContact_ID = $s_contact_id;
        $model->Language_Pair_ID = $language_pair_id;
        $model->ATask_ID = $a_task_id;
        $model->Unit_ID = $unit_id;
        $model->Quantity = $quantity;
        $model->UPrice = $u_price;
        $model->Currency_ID = $currency_id;
        $model->FileItem = $file_item;
        $model->RegDate = $reg_date;
        $model->DueDate = $due_date;
        $model->WorkLoad = $work_load;
        $model->DeliveryMethod_ID = $delivery_method_id;
        $model->Comments = $comments;
        $model->Status_ID = '2';

        echo $model->save();
    }

    public function actionCreateNewPO(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $this->layout = '//layouts/ajaxLayout';
        $this->render('createPO');
    }

    public function actionGetAllPrjPo(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $this->layout = '//layouts/ajaxLayout';
        $prj_no = Yii::app()->request->getParam("prj_no");
        $criteria = new CDbCriteria();
        $criteria->condition = 'ProjectNo =:prj_no';
        $criteria->params = array(':prj_no' => $prj_no);
        $model = PoInfo::model()->findAll($criteria);
        $this->render('listPOByPrj',array(
            'model'=>$model,
        ));
    }

    public function actionGetPoDetail(){
        $po_no = Yii::app()->request->getParam("po_no");
        $criteria = new CDbCriteria();
        $criteria->condition = 'PoNo =:po_no';
        $criteria->params = array(':po_no' => $po_no);
        $model = PoInfo::model()->find($criteria);
        $this->renderPartial('poDetail',array(
            'model'=>$model,
        ));
    }
}
