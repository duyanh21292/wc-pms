<?php

class JobassignsController extends Controller
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
				'actions'=>array('index','view','getAllJobassigns','createJobassigns','getAllJobassignsByEmp','createNewJobassigns','reloadListJobassigns'),
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
		$model=new Jobassigns;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Jobassigns']))
		{
			$model->attributes=$_POST['Jobassigns'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->JobAssign_ID));
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

		if(isset($_POST['Jobassigns']))
		{
			$model->attributes=$_POST['Jobassigns'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->JobAssign_ID));
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
		$dataProvider=new CActiveDataProvider('Jobassigns');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Jobassigns('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Jobassigns']))
			$model->attributes=$_GET['Jobassigns'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Jobassigns the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Jobassigns::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Jobassigns $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='jobassigns-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionCreateNewJobassigns(){
        $prj_no = Yii::app()->request->getParam("prj_no");
        $criteria = new CDbCriteria();
        $criteria->condition = 'ProjectNo=:prj_no';
        $criteria->params = array(':prj_no'=>$prj_no);
        $model = Projects::model()->find($criteria);
        $this->renderPartial('createJobassign',array(
            'model'=>$model,
        ));
    }

    public function actionCreateJobassigns(){
        $prj_no = Yii::app()->request->getParam("prj_no");
        $emp_no = Yii::app()->request->getParam("emp_no");
        $task_id = Yii::app()->request->getParam("task_id");
        $act_id = Yii::app()->request->getParam("act_id");
        $unit = Yii::app()->request->getParam("unit");
        $quantity = Yii::app()->request->getParam("quantity");
        $assigned_hour = Yii::app()->request->getParam("assigned_hour");
        $start_date = Yii::app()->request->getParam("start_date");
        $end_date = Yii::app()->request->getParam("end_date");
        $comment = Yii::app()->request->getParam("comment");

        $model = new Jobassigns();
        $model->ProjectNo = $prj_no;
        $model->EmpNo = $emp_no;
        $model->Task_ID = $task_id;
        $model->Activities_ID = $act_id;
        $model->Unit_ID = $unit;
        $model->Quantity = $quantity;
        $model->AssignedHour = $assigned_hour;
        $model->StartDate = $start_date;
        $model->EndDate = $end_date;
        $model->Comment = $comment;
        $model->Status = 'Open';

        echo $model->save();
    }

    public function actionGetAllJobassigns(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $result = '';
        $prj_no = Yii::app()->request->getParam("prj_no");
        $criteria = new CDbCriteria();
        $criteria->condition = 'ProjectNo=:prj_no';
        $criteria->params = array(':prj_no'=>$prj_no);
        $model = JobassignsInfo::model()->findAll($criteria);

        $this->layout = '//layouts/ajaxLayout';
        $this->render('jobassignByProj',array(
            'model'=>$model,
        ));
    }

    public function actionReloadListJobassigns(){
        $result = '';
        $prj_no = Yii::app()->request->getParam("prj_no");
        $criteria = new CDbCriteria();
        $criteria->condition = 'ProjectNo=:prj_no';
        $criteria->params = array(':prj_no'=>$prj_no);
        $model = JobassignsInfo::model()->findAll($criteria);
        foreach ($model as $object) {
            $comment = 'No Comment';
            if (!empty($object->Comment)){
                $comment = '<div class="icon ion-ios7-eye bt_crud_26 view"></div>';
            }
            $stDate = date("y-m-d", strtotime($object->StartDate));
            $endDate = date("y-m-d", strtotime($object->EndDate));
            $result = $result.'<tr class="job_assign">
                    <td>'.$object->Full_Name.'</td>
                    <td>'.$object->TaskName.' > '.$object->ActivitiesName.'</td>
                    <td style="text-align: center">'.$object->Unit.'</td>
                    <td style="text-align: center">'.$object->Quantity.'</td>
                    <td style="text-align: center">'.$stDate.' ~ '.$endDate.'</td>
                    <td style="text-align: center">'.$object->AssignedHour.'</td>
                    <td style="text-align: center">'.$object->Status.'</td>
                    <td style="text-align: center">'.$comment.'</td>
                    <td style="text-align:center"><input type="checkbox" name="lqa_'.$object->EmpNo.'"></td>
                </tr>';
        }
        echo $result;
    }

    public function actionGetAllJobassignsByEmp(){
        $result = '';
        $emp_no = $_SESSION['emp_no'];
        $criteria = new CDbCriteria();
        $criteria->condition = 'EmpNo=:emp_no AND Status=:status';
        $criteria->params = array(':emp_no'=>$emp_no,':status'=>'Open');
        $model = JobassignsInfo::model()->findAll($criteria);
        foreach ($model as $object) {
            $stDate = date("y-m-d", strtotime($object->StartDate));
            $endDate = date("y-m-d", strtotime($object->EndDate));
            $result = $result.'<tr>
                    <td>'.$object->ProjectName.'</td>
                    <td>'.$stDate.' ~ '.$endDate.'<br>'.$object->TaskName.' > '.$object->ActivitiesName.'</td>
                    <td style="text-align: center">'.$object->Quantity.'<br>'.$object->Unit.'</td>
                    <td style="text-align: center">'.$object->AssignedHour.'</td>
                    <td style="text-align: center">'.$object->Status.'<button class="bt_select" style="margin-left: 5px;">Complete</button></td>
                    <td style="text-align:center"><div class="tool" onclick="openNewWindow(\'http://x.pms/timetrack/createTimetrackWindow?ja_id='.$object->JobAssign_ID.'\',\'Clients List\')">New</div></td>
                </tr>';
        }
        echo $result;
    }
}
