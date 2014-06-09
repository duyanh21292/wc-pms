<?php

class EmployeesController extends Controller
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
				'actions'=>array('index','view','login','getEmpResult','getAllEmployees','getEmployeeByJob','getAllEmpWindow','getAllContactInfo','getTotalPageNum','logout'),
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
		$model=new Employees;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Employees']))
		{
			$model->attributes=$_POST['Employees'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->EmpNo));
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

		if(isset($_POST['Employees']))
		{
			$model->attributes=$_POST['Employees'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->EmpNo));
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
		$dataProvider=new CActiveDataProvider('Employees');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Employees('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Employees']))
			$model->attributes=$_GET['Employees'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Employees the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Employees::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Employees $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='employees-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionGetEmployeeByJob(){
        $result='';
        $job = Yii::app()->request->getParam("job");
        $criteria = new CDbCriteria();
        $criteria->condition = 'JobName =:job';
        $criteria->params = array(':job'=>$job);
        $model = AllEmployees::model()->findAll($criteria);
        foreach ($model as $object) {
            $result = $result.'<option value="'.$object->EmpNo.'">'.$object->Full_Name.'</option>';
        }
        echo $result;
    }

    public function actionGetAllEmployees(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $div_id = Yii::app()->request->getParam("div_id");
        $this->layout = '//layouts/ajaxLayout';
        $criteria = new CDbCriteria();
        if (!empty($div_id)){
            $criteria->condition = 'Level_ID =:level_id';
            $criteria->params = array(':level_id'=>$div_id);
        }
        $criteria->limit = 20;
        $criteria->offset = 0;
        $model = AllEmployees::model()->findAll($criteria);
        $this->render('view',array(
            'model'=>$model,
        ));;
    }

    public function actionGetEmpResult(){
        $result='';
        $page = Yii::app()->request->getParam("page");
        $search_type = Yii::app()->request->getParam("search_type");
        $search_content = Yii::app()->request->getParam("search_content");
        $status = Yii::app()->request->getParam("status");
        $job_id = Yii::app()->request->getParam("job_id");
        $div_id = Yii::app()->request->getParam("div_id");
        $dep_id = Yii::app()->request->getParam("dep_id");
        $emp_type = Yii::app()->request->getParam("emp_type");
        $row_start = (0 + (20*($page-1)));
        $criteria = new CDbCriteria();
        if(empty($status)){
            $status = '%%';
        }
        if (empty($job_id)){
            $job_id = '%%';
        }
        if (empty($div_id)){
            $div_id = '%%';
        }
        if (empty($dep_id)){
            $dep_id = '%%';
        }
        if (empty($search_type)){
            $criteria->condition = 'Division_ID LIKE :div_id AND Status LIKE :status AND Job_ID LIKE :job_id AND Dep_ID LIKE :dep_id';
            $criteria->params = array(':div_id'=>$div_id,':status'=>$status,':job_id'=>$job_id,':dep_id'=>$dep_id);
        } else {
            $criteria->condition = $search_type.' LIKE :search_content AND Division_ID LIKE :div_id AND Status LIKE :status AND Job_ID LIKE :job_id AND Dep_ID LIKE :dep_id';
            $criteria->params = array(':search_content'=>'%'.$search_content.'%',':div_id'=>$div_id,':status'=>$status,':job_id'=>$job_id,':dep_id'=>$dep_id);
        }
        $criteria->limit = 20;
        $criteria->offset = $row_start;
        $model = AllEmployees::model()->findAll($criteria);
        if (empty($emp_type)) {
            foreach ($model as $object) {
                $row_start++;
                $entryDate = date("Y-m-d", strtotime($object->Entry_Date));
                $result = $result.'<tr class="tr_data">
                    <td class="cell_no">'.$row_start.'.</td>
                    <td>'.$object->EmpNo.'</td>
                    <td>'.$object->User_ID.'</td>
                    <td>'.$object->Full_Name.'</td>
                    <td>'.$object->DivisionName.'</td>
                    <td>'.$object->DepName.'</td>
                    <td>'.$object->JobName.'</td>
                    <td>'.$entryDate.'</td>
                </tr>';
            }
        } elseif ($emp_type == 'employee_contact') {
            foreach ($model as $object) {
                $row_start++;
                $result = $result.'<tr class="tr_data">
                    <td class="cell_no">'.$row_start.'.</td>
                    <td>'.$object->Full_Name.'</td>
                    <td>'.$object->Mobile.'</td>
                    <td>'.$object->Tel_Home.'</td>
                    <td>'.$object->Email.'</td>
                    <td>'.$object->Private_Email.'</td>
                </tr>';
            }
        }
        echo $result;
    }

    public function actionLogout(){
        session_start();
        session_destroy();
        Header( "Location: ".Employees::BASE_URL );
    }

    public function actionLogin(){

        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $this->layout = '//layouts/ajaxLayout';
        $user_id = Yii::app()->request->getParam("user_id");
        $pass = Yii::app()->request->getParam("pass");
        $criteria = new CDbCriteria();
        $criteria->condition = 'User_ID=:User_ID AND Password=:Password';
        $criteria->params = array(':User_ID'=>$user_id, ':Password'=>$pass);
        $modelUser = Users::model()->find($criteria);

        if(!empty($modelUser)) {
            session_start();
            $emp_no = $modelUser->EmpNo;
            $_SESSION['user'] = $user_id;
            $_SESSION['emp_no'] = $emp_no;

            $criteria2 = new CDbCriteria();
            $criteria2->condition = 'EmpNo=:emp_no';
            $criteria2->params = array(':emp_no'=>$emp_no);
            $modelEmp = Employees::model()->find($criteria2);

            if(!empty($modelEmp->Role_ID)) {
                $_SESSION['role']   = $modelEmp->Role_ID;
            } else {
                $_SESSION['role'] = 'User';
            }

            $criteria3 = new CDbCriteria();
            $criteria3->limit = 20;
            $criteria3->offset = 0;
            $model = AllEmployees::model()->findAll($criteria3);
            $this->render('view',array(
                'model'=>$model,
            ));
        }   else {
            echo "Login Fail!";
        }
    }

    public function actionGetAllEmpWindow(){
        $result='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
            "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" type="text/css" href="../../../css/PLcss.css">
            <script type="text/javascript" src="/assets/18e7d7ae/jquery.min.js"></script>
            <script type="text/javascript"  src="../../../scripts/PL-javascript.js"></script>
            <script type="text/javascript">
            function selectEmp(no,name) {
                window.opener.document.getElementById("emp_selected_name").innerHTML=name;
                window.opener.document.getElementById("emp_selected_name").value=name;
                window.opener.document.getElementById("emp_selected_name").setAttribute("empNo",no);
                self.close();
            }
            </script>
        </head>

        <body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true">
        <div class="content_main content_main_dlg_window" style="left: 0;opacity: 1">
        <div class="tool_frame">
            <div class="search_frame">
                <form id="search_form">
                    Search:
                    <select id="cb_search_type" name="search_type">
                        <option value="EmpNo">EmployeeNo.</option>
                        <option value="Full_Name">Full Name</option>
                    </select>
                    <input id="ip_search_content" type="text" name="search_content">
                    <input type="submit" value="Search">
                </form>
            </div>
            <div class="sort_frame">
                Sort by:
                <select id="cb_sort_by" name="sort_by">
                    <option value="EmpNo">EmployeeNo.</option>
                    <option value="Full_Name">Full Name</option>
                    <option value="Workload">Workload</option>
                </select>
            </div>
        </div>
        <table class="list_data">
            <tr>
                <th>No.</th>
                <th>EmployeeNo.</th>
                <th>Full Name</th>
                <th>Workload</th>
            </tr>';
        $model = Employees::model()->findAll();
        $no = 0;
        foreach ($model as $object) {
            $no++;
            $result = $result.'<tr>
                    <td class="cell_no">'.$no.'.</td>
                    <td><div style="cursor:pointer" onclick="selectEmp(\''.$object->EmpNo.'\',\''.$object->Full_Name.'\')">'.$object->EmpNo.'</div></td>
                    <td>'.$object->Full_Name.'</td>
                    <td>0/8 hour</td>
                </tr>';
        }
        echo $result.'</table></div></body></html>';
    }

    public function actionGetAllContactInfo(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;
        $this->layout = '//layouts/ajaxLayout';
        $model = Employees::model()->findAll();
        $this->render('empContact',array(
            'model'=>$model,
        ));
    }

    public function actionGetTotalPageNum(){
        $search_type = Yii::app()->request->getParam("search_type");
        $search_content = Yii::app()->request->getParam("search_content");
        $status = Yii::app()->request->getParam("status");
        $job_id = Yii::app()->request->getParam("job_id");
        $dep_id = Yii::app()->request->getParam("dep_id");
        $div_id = Yii::app()->request->getParam("div_id");
        $criteria = new CDbCriteria();
        if(empty($div_id)){
            $div_id = '%%';
        }
        if(empty($status)){
            $status = '%%';
        }
        if (empty($job_id)){
            $job_id = '%%';
        }
        if (empty($dep_id)){
            $dep_id = '%%';
        }
        if (empty($search_type)){
            $criteria->condition = 'Division_ID LIKE :div_id AND Status LIKE :status AND Job_ID LIKE :job_id AND Dep_ID LIKE :dep_id';
            $criteria->params = array(':div_id'=>$div_id,':status'=>$status,':job_id'=>$job_id,':dep_id'=>$dep_id);
        } else {
            $criteria->condition = $search_type.' LIKE :search_content AND Division_ID LIKE :div_id AND Status LIKE :status AND Job_ID LIKE :job_id AND Dep_ID LIKE :dep_id';
            $criteria->params = array(':search_content'=>'%'.$search_content.'%',':div_id'=>$div_id,':status'=>$status,':job_id'=>$job_id,':dep_id'=>$dep_id);
        }
        $all_emp = AllEmployees::model()->findAll($criteria);
        $count = count($all_emp);
        $x = $count/20;
        $y = (int) $x;
        $total = 1;
        if ($x > $y) {
            $total = (int) ($x + 1);
        } elseif ($x == $y) {
            $total = $y;
        }
        $result = '<div class="icon ion-ios7-rewind previous_page"></div>';
        for ($i = 1; $i <= $total; $i++) {
            if($i == 1){
                if ($total == 1) {
                    $result = $result.'<div class="page_number first_page last_page page_number_selected">'.$i.'</div>';
                } else {
                    $result = $result.'<div class="page_number first_page page_number_selected">'.$i.'</div>';
                }
            } elseif ($i == $total){
                $result = $result.'<div style="float:left">-</div><div class="page_number last_page">'.$i.'</div>';
            } else {
                $result = $result.'<div style="float:left">-</div><div class="page_number">'.$i.'</div>';
            }
        }
        echo $result.'<div class="icon ion-ios7-fastforward next_page"></div>';
    }
}
