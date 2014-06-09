<?php

class TimetrackController extends Controller
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
				'actions'=>array('index','view','createTimetrackWindow','createTimetrack','getAllTimetrackByEmp'),
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
		$model=new Timetrack;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Timetrack']))
		{
			$model->attributes=$_POST['Timetrack'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Timtrack_ID));
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

		if(isset($_POST['Timetrack']))
		{
			$model->attributes=$_POST['Timetrack'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Timtrack_ID));
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
		$dataProvider=new CActiveDataProvider('Timetrack');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Timetrack('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Timetrack']))
			$model->attributes=$_GET['Timetrack'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Timetrack the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Timetrack::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Timetrack $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='timetrack-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionCreateTimetrack(){
        $ja_id = Yii::app()->request->getParam("ja_id");
        $date = Yii::app()->request->getParam("date");
        $start_time = Yii::app()->request->getParam("start_time");
        $end_time = Yii::app()->request->getParam("end_time");
        $task_id = Yii::app()->request->getParam("task_id");
        $activities_id = Yii::app()->request->getParam("activities_id");
        $unit = Yii::app()->request->getParam("unit");
        $quantity = Yii::app()->request->getParam("quantity");
        $comment = Yii::app()->request->getParam("comment");

        $model = new Timetrack();
        $model->JobAssign_ID = $ja_id;
        $model->Date = $date;
        $model->StartTime = $start_time;
        $model->EndTime = $end_time;
        $model->Task_ID = $task_id;
        $model->Activities_ID = $activities_id;
        $model->Unit = $unit;
        $model->Quantity = $quantity;
        $model->Comment = $comment;

        echo $model->save();
    }

    public function actionCreateTimetrackWindow(){
        $ja_id = Yii::app()->request->getParam("ja_id");
        $criteria = new CDbCriteria();
        $criteria->condition = 'JobAssign_ID=:ja_id';
        $criteria->params = array(':ja_id'=>$ja_id);
        $model = JobassignsInfo::model()->find($criteria);
        $prj_name = $model->ProjectName;
        $task_id = $model->Task_ID;
        $activities_id = $model->Activities_ID;
        $unit = $model->Unit;
        $quantity = $model->Quantity;

        $result='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
            "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" type="text/css" href="../../../css/PLcss.css">
            <script type="text/javascript" src="/assets/18e7d7ae/jquery.min.js"></script>
            <script type="text/javascript"  src="../../../scripts/PL-javascript.js"></script>
        </head>

        <body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true">
        <div class="content_main content_main_dlg_window" style="left: 20px;top:10px;right: 20px;min-width:750px;opacity: 1">
        <table border="0" style="margin:auto">
        <tr><td colspan="2" class="form"><div class="frame_title">New Time Track</div></td></tr>
        <tr class="form"><td class="form info_form">Project Name</td><td class="form value_form"><div class="value_selected" id="prj_selected_name" style="font-size: medium;margin-top:2px">'.$prj_name.'</div><button class="bt_select">Project Select</button></td></tr>
        <tr class="form"><td class="form info_form">Date</td><td class="form value_form"><select id="cb_year" name="year"></select>&nbsp;Year&nbsp;<select id="cb_month" name="month"></select>&nbsp;Month&nbsp;<select id="cb_day" name="day"></select>&nbsp;Day&nbsp;</td></tr>
        <tr class="form"><td class="form info_form">Time</td><td class="form value_form"><input  class="time" type="text" name="hour_start">&nbsp;:&nbsp;<input class="time" type="text" name="min_start"><button class="bt_select" style="margin-left: 5px;" onclick="getTimeStartNow()">Now</button>&nbsp;~&nbsp;<input class="time" type="text" name="hour_end">&nbsp;:&nbsp;<input class="time" type="text" name="min_end"><button class="bt_select" style="margin-left: 5px;" onclick="getTimeEndNow()">Now</button></td></tr>
        <tr class="form"><td class="form info_form">Task</td><td class="form value_form"><select id="cb_task" name="task" style="min-width: 300px" onchange="cbTaskSelectionChange()"><option value="select">------Select------</option></select></td></tr>
        <tr class="form"><td class="form info_form">Activities</td><td class="form value_form"><select id="cb_activities" name="activities" style="min-width: 200px"></select></td></tr>
        <tr class="form"><td class="form info_form">Unit&nbsp;/&nbsp;Quantity</td><td class="form value_form"><select id="cb_unit" name="unit" style="min-width: 150px"></select>&nbsp;/&nbsp;<input type="text" name="quantity" style="width: 100px" value="'.$quantity.'"></td></tr>
        <tr class="form"><td class="form info_form">Comments</td><td class="form value_form"><input type="text"  name="comments" style="width: 250px"></td></tr>
        <tr style="height: 100px"><td colspan="2" class="form" style="text-align: center"><button class="bt_large" style="margin-right: 10px" onclick="actionCreateNewTimetrack()">Create</button><button class="bt_large" onclick="actionCancelNewTimetrack()">Cancel</button></td></tr>
        <script type="text/javascript">
                $.ajax({
                    type: \'GET\',
                    url: \''.Employees::BASE_URL.'/task/getAllTaskCb\'
                }).success(function(data){
                    $("#cb_task").append(data);
                    $("#cb_task").children().each(function(){
                        var val = $(this).val();
                        if (val == \''.$task_id.'\'){
                            $(this).attr(\'selected\',true);
                        }
                    });
                });
                $.ajax({
                    type: \'GET\',
                    url: \''.Employees::BASE_URL.'/activities/getAllActivitiesCb\',
                    data: {task_id: \''.$task_id.'\'}
                }).success(function(data){
                    $("#cb_activities").html(\'<option value="select">------Select------</option>\' + data);
                    $("#cb_activities").children().each(function(){
                        var val = $(this).val();
                        if (val == \''.$activities_id.'\'){
                            $(this).attr(\'selected\',true);
                        }
                    });
                });
                $.ajax({
                    type: \'GET\',
                    url: \''.Employees::BASE_URL.'/unit/getAllUnitCb\'
                }).success(function(data){
                    $("#cb_unit").html(data);
                    $("#cb_unit").children().each(function(){
                        var val = $(this).val();
                        if (val == \''.$unit.'\'){
                            $(this).attr(\'selected\',true);
                        }
                    });
                });
                $("#cb_year").html(getYearCbData(new Date().getFullYear()));
                $("#cb_month").html(getMonthCbData(new Date().getMonth()));
                $("#cb_day").html(getDayCbData(new Date().getDate()));
                function getTimeStartNow(){
                    $(\'[name="hour_start"]\').val(getHourData());
                    $(\'[name="min_start"]\').val(getMinuteData());
                }
                function getTimeEndNow(){
                    $(\'[name="hour_end"]\').val(getHourData());
                    $(\'[name="min_end"]\').val(getMinuteData());
                }
                function actionCreateNewTimetrack(){
                    var ja_id = '.$ja_id.';
                    var date = $(\'[name="year"]\').val() + \'-\' + $(\'[name="month"]\').val() + \'-\' + $(\'[name="day"]\').val();
                    var start_time = $(\'[name="hour_start"]\').val() + \':\' + $(\'[name="min_start"]\').val();
                    var end_time = $(\'[name="hour_end"]\').val() + \':\' + $(\'[name="min_end"]\').val();
                    var task_id = $(\'[name="task"]\').val();
                    var activities_id = $(\'[name="activities"]\').val();
                    var unit = $(\'[name="unit"]\').val();
                    var quantity = $(\'[name="quantity"]\').val();
                    var comment = $(\'[name="comments"]\').val();
                    $.ajax({
                        type: \'GET\',
                        url: \''.Employees::BASE_URL.'/timetrack/createTimetrack\',
                        data: {\'ja_id\': ja_id, \'date\': date, \'start_time\': start_time, \'end_time\': end_time, \'task_id\': task_id, \'activities_id\': activities_id, \'unit\': unit, \'quantity\': quantity, \'comment\':comment}
                    }).success(function(msg){
                            if(msg == 1){
                                alert("Create Jobassign successful!");
                                self.close();
                            } else {
                                alert("Create Jobassign fail!");
                            }
                        });
                }
                function actionCancelNewTimetrack(){
                    self.close();
                }
        </script>
        </table></div></body></html>';

        echo $result;
    }


    public function actionGetAllTimetrackByEmp(){
        $result = '';
        $emp_no = $_SESSION['emp_no'];
        $criteria = new CDbCriteria();
        $criteria->condition = 'EmpNo=:emp_no';
        $criteria->params = array(':emp_no'=>$emp_no);
        $model = TimetrackInfo::model()->findAll($criteria);
        $no =0;
        foreach ($model as $object) {
            $no++;
            $date = date("Y-m-d", strtotime($object->Date));
            $start_time = date("H:i",strtotime($object->StartTime));
            $end_time = date("H:i",strtotime($object->EndTime));
            $result = $result.'<tr>
                    <td class="cell_no">'.$no.'.</td>
                    <td style="text-align: center">'.$date.'</td>
                    <td>'.$object->ProjectName.'</td>
                    <td style="text-align: center">'.$start_time.'&nbsp;~&nbsp;'.$end_time.'</td>
                    <td style="text-align: center">'.$object->TaskName.'</td>
                    <td style="text-align: center">'.$object->ActivitiesName.'</td>
                    <td style="text-align: center">'.$object->Unit.'</td>
                    <td style="text-align: center">'.$object->Quantity.'</td>
                    <td style="text-align:center">Copy&nbsp;Modify&nbsp;Del</td>
                </tr>';
        }
        echo $result;
    }
}
