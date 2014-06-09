<?php

class ProjectsController extends Controller
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
				'actions'=>array('index','view','getAllProjects','createProject','createNewProject','getProjectDetail','getAllProjectWindow','getProjectName','getTotalPageNum','getProjectResult','modifyProject','updateProject'),
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
		$model=new Projects;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Projects']))
		{
			$model->attributes=$_POST['Projects'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ProjectNo));
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

		if(isset($_POST['Projects']))
		{
			$model->attributes=$_POST['Projects'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ProjectNo));
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
		$dataProvider=new CActiveDataProvider('Projects');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Projects('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Projects']))
			$model->attributes=$_GET['Projects'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Projects the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Projects::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Projects $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='projects-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionCreateProject(){
        $prj_no = Yii::app()->request->getParam("prj_no");
        $project_name = Yii::app()->request->getParam("project_name");
        $password = Yii::app()->request->getParam("password");
        $division_id = Yii::app()->request->getParam("division_id");
        $industry_id = Yii::app()->request->getParam("industry_id");
        $client_id = Yii::app()->request->getParam("client_id");
        $c_contact_id = Yii::app()->request->getParam("c_contact_id");
        $c_fcontact_id = Yii::app()->request->getParam("c_fcontact_id");
        $c_po_no = Yii::app()->request->getParam("c_po_no");
        $c_pj_no = Yii::app()->request->getParam("c_pj_no");
        $pj_mng_no = Yii::app()->request->getParam("pj_mng_no");
        $sales_mng_no = Yii::app()->request->getParam("sales_mng_no");
        $vat_tax = Yii::app()->request->getParam("vat_tax");
        $currency_id = Yii::app()->request->getParam("currency_id");
        $due_date = Yii::app()->request->getParam("due_date");
        $reg_date = Yii::app()->request->getParam("reg_date");

        $no = 'VN-'.$prj_no;

        $criteria = new CDbCriteria();
        $criteria->select='max(ProjectNo) as maxProjectNo';
        $criteria->condition = 'ProjectNo LIKE :prj_no';
        $criteria->params = array(':prj_no'=>'%'.$no.'%');
        $all_project = Projects::model()->find($criteria);
        $count = count($all_project);


        for ($i = 1; $i < 4;$i++) {
            $j = 4 - strlen((string) ($count + 1));
            if($i == $j){
                $no = $no.($count + 1);
                break;
            }
            $no = $no.'0';
        }

        $model = new Projects();
        $model->ProjectNo = $no;
        $model->SaleManagerNo = $sales_mng_no;
        $model->ProjectManagerNo = $pj_mng_no;
        $model->ProjectName = $project_name;
        $model->Client_ID = $client_id;
        $model->C_Contact_ID = $c_contact_id;
        $model->C_FContact_ID = $c_fcontact_id;
        $model->C_PoNo = $c_po_no;
        $model->C_ProjectNo = $c_pj_no;
        $model->Budget = 0;
        $model->Division_ID = $division_id;
        $model->Status_ID = 2;
        $model->FStatus_ID = 6;
        $model->RegDate = $reg_date;
        $model->DueDate = $due_date;
        $model->Balance = 0;
        $model->InternalCost = 0;
        $model->VATTAX = $vat_tax;
        $model->BuyInsAmount = 0;
        $model->Amount = 0;
        $model->GrossMargin = 0;
        $model->Industry_ID = $industry_id;
        $model->Password = $password;
        $model->Currency_ID = $currency_id;

        echo $model->save();
    }

    public function actionGetAllProjects(){
        $status_id = Yii::app()->request->getParam("status_id");
        if (empty($status_id)) {
            $status_id = '%%';
        }
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;
        $this->layout = '//layouts/ajaxLayout';
        $criteria = new CDbCriteria();
        $criteria->condition = 'Status_ID LIKE :status_id';
        $criteria->params = array(':status_id'=>$status_id);
        $criteria->limit = 20;
        $criteria->offset = 0;
        $model = ProjectsInfo::model()->findAll($criteria);
        $this->render('view',array(
            'model'=>$model,
        ));
    }

    public function actionCreateNewProject(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $this->layout = '//layouts/ajaxLayout';
        $this->render('createProject');
    }

    public function actionGetProjectDetail(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $this->layout = '//layouts/ajaxLayout';
        $prj_no = Yii::app()->request->getParam("prj_no");
        $criteria = new CDbCriteria();
        $criteria->condition = 'ProjectNo=:prj_no';
        $criteria->params = array(':prj_no'=>$prj_no);

        $model = PrjDetail::model()->find($criteria);
        $this->render('projectDetail',array(
            'model'=>$model,
        ));
    }

    public function actionGetAllProjectWindow(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $model = ProjectsInfo::model()->findAll();
        $this->renderPartial('projectChooserWindow',array(
            'model'=>$model,
        ));
    }

    public function actionGetProjectName(){
        $prj_no = Yii::app()->request->getParam("prj_no");
        $criteria = new CDbCriteria();
        $criteria->condition = 'ProjectNo=:prj_no';
        $criteria->params = array(':prj_no'=>$prj_no);

        $model = Projects::model()->find($criteria);
        $prj_name = $model->ProjectName;
        echo $prj_name;
    }

    public function actionGetProjectResult(){
        $result='';
        $page = Yii::app()->request->getParam("page");
        $search_type = Yii::app()->request->getParam("search_type");
        $search_content = Yii::app()->request->getParam("search_content");
        $status_id = Yii::app()->request->getParam("status_id");
        $f_status_id = Yii::app()->request->getParam("f_status_id");
        $industry_id = Yii::app()->request->getParam("industry_id");
        $reg_date_from = Yii::app()->request->getParam("reg_date_from");
        $reg_date_to = Yii::app()->request->getParam("reg_date_to");

        $row_start = (0 + (20*($page-1)));

        $criteria = new CDbCriteria();
        if(empty($status_id)){
            $status_id = '%%';
        }
        if(empty($f_status_id)){
            $f_status_id = '%%';
        }
        if (empty($industry_id)){
            $industry_id = '%%';
        }
        if (empty($search_type)){
            $criteria->condition = 'Status_ID LIKE :status_id AND FStatus_ID LIKE :f_status_id AND Industry_ID LIKE :industry_id AND RegDate >= :reg_date_from AND RegDate <= :reg_date_to';
            $criteria->params = array(':status_id'=>$status_id,':f_status_id'=>$f_status_id,':industry_id'=>$industry_id,':reg_date_from'=>$reg_date_from,':reg_date_to'=>$reg_date_to);
        } else {
            $criteria->condition = $search_type.' LIKE :search_content AND Status_ID LIKE :status_id AND FStatus_ID LIKE :f_status_id AND Industry_ID LIKE :industry_id AND RegDate >= :reg_date_from AND RegDate <= :reg_date_to';
            $criteria->params = array(':search_content'=>'%'.$search_content.'%',':status_id'=>$status_id,':f_status_id'=>$f_status_id,':industry_id'=>$industry_id,':reg_date_from'=>$reg_date_from,':reg_date_to'=>$reg_date_to);
        }
        $criteria->limit = 20;
        $criteria->offset = $row_start;
        $model = ProjectsInfo::model()->findAll($criteria);
        $total = 0;
        foreach ($model as $object) {
            $row_start++;
            $total = $total + $object->Budget;
            $regDate = date("y-m-d", strtotime($object->RegDate));
            $dueDate = date("y-m-d", strtotime($object->DueDate));
            $result = $result.'<tr class="tr_data">
                    <td style="text-align: center">'.$object->ProjectNo.'</td>
                    <td style="min-width: 750px">
                        <div><a class="prj_name" href="'.Employees::BASE_URL.'/projects/getProjectDetail?prj_no='.$object->ProjectNo .'">'.$object->ProjectName .'</a></div>
                        <div style="font-family: pms-font-regular, Arial, sans-serif;text-align: right">'.$object->ProjectManagerName.'</div>
                    </td>
                    <td style="width: 250px;text-align: center">'.$object->ClientName.'
                        <div style="font-family: pms-font-regular, Arial, sans-serif;">'.$object->ContactName.'</div></td>
                    <td class="cell_no" style="width: 200px"><div style="float: left"><input name="select_budget" type="checkbox" value="'.$object->Budget.'"></div>'.number_format($object->Budget,4,".",",").' VND</td>
                    <td class="cell_no" style="width: 100px">0</td>
                    <td style="text-align: center;width: 95px">'.$object->Status .'<br>'.$object->FStatus .'</td>
                    <td style="text-align: center;width: 80px">'.$regDate .'<br>'.$dueDate.'</td>
                </tr>';
        }
        $result = $result.'<tr class="tr_data" style="height: 30px">
                <td class="total" colspan="3">Total</td>
                <td class="total">
                    <div class="num_total_selected">0.0000</div>
                    <div class="num_total">'.number_format($total,4,".",",").' VND</div>
                </td>
                <td class="total" colspan="3"></td>
            </tr>
            <script>
            budgetSelected();
        </script>';
        echo $result;
    }

    public function actionGetTotalPageNum(){
        $search_type = Yii::app()->request->getParam("search_type");
        $search_content = Yii::app()->request->getParam("search_content");
        $status_id = Yii::app()->request->getParam("status_id");
        $f_status_id = Yii::app()->request->getParam("f_status_id");
        $industry_id = Yii::app()->request->getParam("industry_id");
        $reg_date_from = Yii::app()->request->getParam("reg_date_from");
        $reg_date_to = Yii::app()->request->getParam("reg_date_to");

        $criteria = new CDbCriteria();
        if(empty($status_id)){
            $status_id = '%%';
        }
        if(empty($f_status_id)){
            $f_status_id = '%%';
        }
        if (empty($industry_id)){
            $industry_id = '%%';
        }
        if (!empty($reg_date_to) && !empty($reg_date_from)) {
            if (empty($search_type)){
                $criteria->condition = 'Status_ID LIKE :status_id AND FStatus_ID LIKE :f_status_id AND Industry_ID LIKE :industry_id AND RegDate >= :reg_date_from AND RegDate <= :reg_date_to';
                $criteria->params = array(':status_id'=>$status_id,':f_status_id'=>$f_status_id,':industry_id'=>$industry_id,':reg_date_from'=>$reg_date_from,':reg_date_to'=>$reg_date_to);
            } else {
                $criteria->condition = $search_type.' LIKE :search_content AND Status_ID LIKE :status_id AND FStatus_ID LIKE :f_status_id AND Industry_ID LIKE :industry_id AND RegDate >= :reg_date_from AND RegDate <= :reg_date_to';
                $criteria->params = array(':search_content'=>'%'.$search_content.'%',':status_id'=>$status_id,':f_status_id'=>$f_status_id,':industry_id'=>$industry_id,':reg_date_from'=>$reg_date_from,':reg_date_to'=>$reg_date_to);
            }
        } else {
            if (empty($search_type)){
                $criteria->condition = 'Status_ID LIKE :status_id AND FStatus_ID LIKE :f_status_id AND Industry_ID LIKE :industry_id';
                $criteria->params = array(':status_id'=>$status_id,':f_status_id'=>$f_status_id,':industry_id'=>$industry_id);
            } else {
                $criteria->condition = $search_type.' LIKE :search_content AND Status_ID LIKE :status_id AND FStatus_ID LIKE :f_status_id AND Industry_ID LIKE :industry_id';
                $criteria->params = array(':search_content'=>'%'.$search_content.'%',':status_id'=>$status_id,':f_status_id'=>$f_status_id,':industry_id'=>$industry_id);
            }
        }

        $all_prj = ProjectsInfo::model()->findAll($criteria);
        $count = count($all_prj);
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

    public function actionModifyProject(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $this->layout = '//layouts/ajaxLayout';
        $prj_no = Yii::app()->request->getParam("prj_no");
        $criteria = new CDbCriteria();
        $criteria->condition = 'ProjectNo =:prj_no';
        $criteria->params = array(':prj_no'=>$prj_no);
        $model = ProjectsInfo::model()->find($criteria);
        $this->render('modifyProject',array(
            'model'=>$model,
        ));
    }

    public function actionUpdateProject(){
        $prj_no = Yii::app()->request->getParam("prj_no");
        $project_name = Yii::app()->request->getParam("project_name");
        $password = Yii::app()->request->getParam("password");
        $division_id = Yii::app()->request->getParam("division_id");
        $industry_id = Yii::app()->request->getParam("industry_id");
        $client_id = Yii::app()->request->getParam("client_id");
        $c_contact_id = Yii::app()->request->getParam("c_contact_id");
        $c_fcontact_id = Yii::app()->request->getParam("c_fcontact_id");
        $c_po_no = Yii::app()->request->getParam("c_po_no");
        $c_pj_no = Yii::app()->request->getParam("c_pj_no");
        $pj_mng_no = Yii::app()->request->getParam("pj_mng_no");
        $sales_mng_no = Yii::app()->request->getParam("sales_mng_no");
        $vat_tax = Yii::app()->request->getParam("vat_tax");
        $currency_id = Yii::app()->request->getParam("currency_id");
        $due_date = Yii::app()->request->getParam("due_date");
        $reg_date = Yii::app()->request->getParam("reg_date");

        $criteria = new CDbCriteria();
        $criteria->condition = 'ProjectNo =:prj_no';
        $criteria->params = array(':prj_no'=>$prj_no);
        $model = Projects::model()->find($criteria);
        $model->SaleManagerNo = $sales_mng_no;
        $model->ProjectManagerNo = $pj_mng_no;
        $model->ProjectName = $project_name;
        $model->Client_ID = $client_id;
        $model->C_Contact_ID = $c_contact_id;
        $model->C_FContact_ID = $c_fcontact_id;
        $model->C_PoNo = $c_po_no;
        $model->C_ProjectNo = $c_pj_no;
        $model->Budget = 0;
        $model->Division_ID = $division_id;
        $model->Status_ID = 2;
        $model->FStatus_ID = 6;
        $model->RegDate = $reg_date;
        $model->DueDate = $due_date;
        $model->Balance = 0;
        $model->InternalCost = 0;
        $model->VATTAX = $vat_tax;
        $model->BuyInsAmount = 0;
        $model->Amount = 0;
        $model->GrossMargin = 0;
        $model->Industry_ID = $industry_id;
        $model->Password = $password;
        $model->Currency_ID = $currency_id;

        echo $model->save();
    }
}
