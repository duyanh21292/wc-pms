<?php

class DepartmentController extends Controller
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
				'actions'=>array('index','view','getDeptOrganization','createNewDept','deleteDept','modifyDept','getDeptByDiv'),
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
		$model=new Department;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Department']))
		{
			$model->attributes=$_POST['Department'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Dep_ID));
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

		if(isset($_POST['Department']))
		{
			$model->attributes=$_POST['Department'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Dep_ID));
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
		$dataProvider=new CActiveDataProvider('Department');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Department('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Department']))
			$model->attributes=$_GET['Department'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Department the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Department::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Department $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='department-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionCreateNewDept(){
        $div_id = Yii::app()->request->getParam("div_id");
        $dept_name = Yii::app()->request->getParam("dept_name");

        $model = new Department();
        $model->DepName = $dept_name;
        $model->Division_ID = $div_id;

        echo $model->save();
    }

    public function actionGetDeptOrganization(){
        $result = '';
        $div_id = Yii::app()->request->getParam("div_id");
        $criteria = new CDbCriteria();
        if (empty($div_id)) {
            $div_id = '%%';
        }
        $criteria->condition = 'Division_ID LIKE :div_id';
        $criteria->params = array(':div_id'=>$div_id);
        $model = Department::model()->findAll($criteria);
        foreach ($model as $object) {
            $result = $result.'<tr style="height:29px">
                    <td id="td_org_dep_name_'.$object->Dep_ID.'" class="form value_form org_dep_name" style="text-align:center">- '.$object->DepName.'</td>
                    <td class="form org_tool" style="text-align: center;font-weight: normal">
                    <div id="org_dept_tool_'.$object->Dep_ID.'" style="margin: auto;">
                    <i class="icon ion-ios7-compose bt_crud_26 modify" onclick="showFormModifyDep(\''.$object->Dep_ID.'\')" style="margin-right: 7px"></i>
                    <i class="icon ion-ios7-trash bt_crud_26 delete" onclick="delDept(\''.$object->Dep_ID.'\',\''.$object->DepName.'\')"></i>
                    </div>
                    </td>
                </tr>';
        }
        echo $result;
    }

    public function actionGetDeptByDiv(){
        $result = '';
        $div_id = Yii::app()->request->getParam("div_id");
        $criteria = new CDbCriteria();
        $criteria->condition = 'Division_ID=:div_id';
        $criteria->params = array(':div_id'=>$div_id);
        $model = Department::model()->findAll($criteria);
        foreach ($model as $object) {
            $result = $result.'<div class="nav_item_child_emp" depid="'.$object->Dep_ID.'">- '.$object->DepName.'</div>';
        }
        echo $result;
    }

    public function actionModifyDept(){
        $dept_id = Yii::app()->request->getParam("dept_id");
        $dept_name = Yii::app()->request->getParam("dept_name");
        $criteria = new CDbCriteria();
        $criteria->condition = 'Dep_ID=:dep_id';
        $criteria->params = array(':dep_id'=>$dept_id);
        $model = Department::model()->find($criteria);
        $model->DepName = $dept_name;
        echo $model->save();
    }

    public function actionDeleteDept(){
        $dept_id = Yii::app()->request->getParam("dept_id");
        $criteria = new CDbCriteria();
        $criteria->condition = 'Dep_ID=:dep_id';
        $criteria->params = array(':dep_id'=>$dept_id);
        $model = Department::model()->find($criteria);
        echo $model->delete();
    }
}
