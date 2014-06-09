<?php

class ContactController extends Controller
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
				'actions'=>array('index','view','getAllContactCb','getClientContact','createNewContact','createNewContactWindow','modifyContactWindow','modifyContact'),
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
		$model=new Contact;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Contact']))
		{
			$model->attributes=$_POST['Contact'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Contact_ID));
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

		if(isset($_POST['Contact']))
		{
			$model->attributes=$_POST['Contact'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Contact_ID));
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
		$dataProvider=new CActiveDataProvider('Contact');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Contact('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Contact']))
			$model->attributes=$_GET['Contact'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Contact the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Contact::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Contact $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='contact-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionGetAllContactCb(){
        $result='';
        $client_id = Yii::app()->request->getParam("client_id");
        $criteria = new CDbCriteria();
        $criteria->condition = 'Client_ID =:client_id';
        $criteria->params = array(':client_id'=>$client_id);
        $model = Contact::model()->findAll($criteria);

        foreach ($model as $object) {
            $result = $result.'<option value="'.$object->Contact_ID.'">'.$object->ContactName.'</option>';
        }
        echo $result;
    }

    public function actionGetClientContact(){
        $result='';
        $client_id = Yii::app()->request->getParam("client_id");
        $criteria = new CDbCriteria();
        $criteria->condition = 'Client_ID =:client_id';
        $criteria->params = array(':client_id'=>$client_id);
        $model = ClientContactInfo::model()->findAll($criteria);

        foreach ($model as $object) {
            $result = $result.'<tr class="contact_row"><td style="text-align:center"><div style="cursor:pointer" onclick="openNewWindow(\''.Employees::BASE_URL.'/contact/modifyContactWindow?contact_id='.$object->Contact_ID.'&client_name='.$object->ClientName.'\',\'Modify Contact\',800,600)">'.$object->ContactName.'</div></td><td style="text-align:center">'.$object->Department.'</td><td style="text-align:center">'.$object->Job.'</td><td style="text-align:center">'.$object->Tel.'</td><td style="text-align:center">'.$object->Fax.'</td><td style="text-align:center">'.$object->Mobile.'</td><td style="text-align:center">'.$object->Email.'</td></tr>';
        }
        echo $result;
    }

    public function actionCreateNewContact(){
        $client_id = Yii::app()->request->getParam("client_id");
        $contact_name = Yii::app()->request->getParam("contact_name");
        $department = Yii::app()->request->getParam("department");
        $job = Yii::app()->request->getParam("job");
        $tel = Yii::app()->request->getParam("tel");
        $fax = Yii::app()->request->getParam("fax");
        $mobile = Yii::app()->request->getParam("mobile");
        $email = Yii::app()->request->getParam("email");
        $sale_mng_no = Yii::app()->request->getParam("sale_mng_no");
        $prj_mng_no = Yii::app()->request->getParam("prj_mng_no");
        $memo = Yii::app()->request->getParam("memo");

        $model = new Contact();
        $model->Client_ID =  $client_id;
        $model->ContactName =  $contact_name;
        $model->Department =  $department;
        $model->Job =  $job;
        $model->Tel =  $tel;
        $model->Fax =  $fax;
        $model->Mobile =  $mobile;
        $model->Email =  $email;
        $model->SaleMngNo =  $sale_mng_no;
        $model->PrjMngNo =  $prj_mng_no;
        $model->Memo =  $memo;

        echo $model->save();
    }

    public function actionModifyContact(){
        $contact_id = Yii::app()->request->getParam("contact_id");
        $contact_name = Yii::app()->request->getParam("contact_name");
        $department = Yii::app()->request->getParam("department");
        $job = Yii::app()->request->getParam("job");
        $tel = Yii::app()->request->getParam("tel");
        $fax = Yii::app()->request->getParam("fax");
        $mobile = Yii::app()->request->getParam("mobile");
        $email = Yii::app()->request->getParam("email");
        $sale_mng_no = Yii::app()->request->getParam("sale_mng_no");
        $prj_mng_no = Yii::app()->request->getParam("prj_mng_no");
        $memo = Yii::app()->request->getParam("memo");

        $criteria = new CDbCriteria();
        $criteria->condition = 'Contact_ID =:contact_id';
        $criteria->params = array(':contact_id'=>$contact_id);

        $model = Contact::model()->find($criteria);
        $model->ContactName =  $contact_name;
        $model->Department =  $department;
        $model->Job =  $job;
        $model->Tel =  $tel;
        $model->Fax =  $fax;
        $model->Mobile =  $mobile;
        $model->Email =  $email;
        $model->SaleMngNo =  $sale_mng_no;
        $model->PrjMngNo =  $prj_mng_no;
        $model->Memo =  $memo;

        echo $model->save();
    }

    public function actionCreateNewContactWindow(){
        $client_id = Yii::app()->request->getParam("client_id");
        $client_name = Yii::app()->request->getParam("client_name");

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
        <tr><td colspan="2" class="form"><div class="frame_title">New Contact</div></td></tr>
        <tr class="form"><td class="form info_form">Client</td><td class="form value_form"><div class="value_selected" style="font-size: medium">'.$client_name.'</div></td></tr>
        <tr class="form"><td class="form info_form">Name</td><td class="form value_form"><input type="text"  name="contact_name" style="width: 250px"></td></tr>
        <tr class="form"><td class="form info_form">Department</td><td class="form value_form"><input type="text"  name="department" style="width: 250px"></td></tr>
        <tr class="form"><td class="form info_form">Job Title</td><td class="form value_form"><input type="text"  name="job" style="width: 250px"></td></tr>
        <tr class="form"><td class="form info_form">Tel.</td><td class="form value_form"><input type="text"  name="tel" style="width: 250px"></td></tr>
        <tr class="form"><td class="form info_form">Fax.</td><td class="form value_form"><input type="text"  name="fax" style="width: 250px"></td></tr>
        <tr class="form"><td class="form info_form">Mobile</td><td class="form value_form"><input type="text"  name="mobile" style="width: 250px"></td></tr>
        <tr class="form"><td class="form info_form">Email</td><td class="form value_form"><input type="text"  name="email" style="width: 250px"></td></tr>
        <tr class="form"><td class="form info_form">Sales Manager</td><td class="form value_form"><select id="cb_sales_mng" name="sales_mng" style="min-width: 200px"><option value="">-------Select-------</option></select></td></tr>
        <tr class="form"><td class="form info_form">Project Manager</td><td class="form value_form"><select id="cb_prj_mng" name="prj_mng" style="min-width: 200px"><option value="">-------Select-------</option></select></td></tr>
        <tr class="form"><td class="form info_form">Memo</td><td class="form value_form"><textarea name="memo" style="width: 100%;height: 100px;"></textarea></td></tr>
        <tr style="height: 100px"><td colspan="2" class="form" style="text-align: center"><button class="bt_large" style="margin-right: 10px" onclick="actionCreateNewContact()">Create</button><button class="bt_large" onclick="actionCancelNewContact()">Cancel</button></td></tr>
        <script type="text/javascript">
                $.ajax({
                    type: \'GET\',
                    url: \''.Employees::BASE_URL.'/employees/getEmployeeByJob\',
                    data: {job : \'Pm\'}
                }).success(function(data){
                    $(\'#cb_prj_mng\').append(data);
                });
                $.ajax({
                    type: \'GET\',
                    url: \''.Employees::BASE_URL.'/employees/getEmployeeByJob\',
                    data: {job : \'Sales\'}
                }).success(function(data){
                    $(\'#cb_sales_mng\').append(data);
                });

                function actionCreateNewContact(){
                    var client_id = '.$client_id.';
                    var contact_name = $(\'[name="contact_name"]\').val();
                    var department = $(\'[name="department"]\').val();
                    var job = $(\'[name="job"]\').val();
                    var tel = $(\'[name="tel"]\').val();
                    var fax = $(\'[name="fax"]\').val();
                    var mobile = $(\'[name="mobile"]\').val();
                    var email = $(\'[name="email"]\').val();
                    var sale_mng_no = $(\'[name="sales_mng"]\').val();
                    var prj_mng_no = $(\'[name="prj_mng"]\').val();
                    var memo = $(\'[name="memo"]\').val();
                    $.ajax({
                        type: \'POST\',
                        url: \''.Employees::BASE_URL.'/contact/createNewContact\',
                        data: {\'client_id\' : client_id,\'contact_name\' : contact_name,\'department\' : department,\'job\' : job,\'tel\' : tel,\'fax\' : fax,\'mobile\' : mobile,\'email\' : email,\'sale_mng_no\' : sale_mng_no,\'prj_mng_no\' : prj_mng_no,\'memo\' :memo}
                    }).success(function(msg){
                            if(msg == 1){
                                alert("Create Contact successful!");
                                $.ajax({
                                    type: \'GET\',
                                    url: \''.Employees::BASE_URL.'/contact/getClientContact\',
                                    data: {\'client_id\': \''.$client_id.'\'}
                                }).success(function(data){
                                    window.opener.jQuery(".contact_row").remove();
                                    var tbl = window.opener.jQuery("#list_contact");
                                    tbl.append(data);
                                    self.close();
                                });
                            } else {
                                alert("Create Contact fail!");
                            }
                        });
                }
                function actionCancelNewContact(){
                    self.close();
                }
        </script>
        </table></div></body></html>';

        echo $result;
    }

    public function actionModifyContactWindow(){
        $contact_id = Yii::app()->request->getParam("contact_id");
        $client_name = Yii::app()->request->getParam("client_name");
        $criteria = new CDbCriteria();
        $criteria->condition = 'Contact_ID =:contact_id';
        $criteria->params = array(':contact_id'=>$contact_id);
        $model = Contact::model()->find($criteria);

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
        <tr><td colspan="2" class="form"><div class="frame_title">Modify Contact</div></td></tr>
        <tr class="form"><td class="form info_form">Client</td><td class="form value_form"><div class="value_selected" style="font-size: medium">'.$client_name.'</div></td></tr>
        <tr class="form"><td class="form info_form">Name</td><td class="form value_form"><input type="text"  name="contact_name" style="width: 250px" value="'.$model->ContactName.'"></td></tr>
        <tr class="form"><td class="form info_form">Department</td><td class="form value_form"><input type="text"  name="department" style="width: 250px" value="'.$model->Department.'"></td></tr>
        <tr class="form"><td class="form info_form">Job Title</td><td class="form value_form"><input type="text"  name="job" style="width: 250px" value="'.$model->Job.'"></td></tr>
        <tr class="form"><td class="form info_form">Tel.</td><td class="form value_form"><input type="text"  name="tel" style="width: 250px" value="'.$model->Tel.'"></td></tr>
        <tr class="form"><td class="form info_form">Fax.</td><td class="form value_form"><input type="text"  name="fax" style="width: 250px" value="'.$model->Fax.'"></td></tr>
        <tr class="form"><td class="form info_form">Mobile</td><td class="form value_form"><input type="text"  name="mobile" style="width: 250px" value="'.$model->Mobile.'"></td></tr>
        <tr class="form"><td class="form info_form">Email</td><td class="form value_form"><input type="text"  name="email" style="width: 250px" value="'.$model->Email.'"></td></tr>
        <tr class="form"><td class="form info_form">Sales Manager</td><td class="form value_form"><select id="cb_sales_mng" name="sales_mng" style="min-width: 200px"><option value="">-------Select-------</option></select></td></tr>
        <tr class="form"><td class="form info_form">Project Manager</td><td class="form value_form"><select id="cb_prj_mng" name="prj_mng" style="min-width: 200px"><option value="">-------Select-------</option></select></td></tr>
        <tr class="form"><td class="form info_form">Memo</td><td class="form value_form"><textarea name="memo" style="width: 100%;height: 100px;">'.$model->Memo.'</textarea></td></tr>
        <tr style="height: 100px"><td colspan="2" class="form" style="text-align: center"><button class="bt_large" style="margin-right: 10px" onclick="actionModifyContact()">Save</button><button class="bt_large" onclick="actionCancelModifyContact()">Cancel</button></td></tr>
        <script type="text/javascript">
                $.ajax({
                    type: \'GET\',
                    url: \''.Employees::BASE_URL.'/employees/getEmployeeByJob\',
                    data: {job : \'Pm\'}
                }).success(function(data){
                    $(\'#cb_prj_mng\').append(data);
                    $(\'#cb_prj_mng\').children().each(function(){
                        var val = $(this).val();
                        if (val == "'.$model->PrjMngNo.'"){
                            $(this).attr(\'selected\',true);
                        }
                    });
                });
                $.ajax({
                    type: \'GET\',
                    url: \''.Employees::BASE_URL.'/employees/getEmployeeByJob\',
                    data: {job : \'Sales\'}
                }).success(function(data){
                    $(\'#cb_sales_mng\').append(data);
                    $(\'#cb_sales_mng\').children().each(function(){
                        var val = $(this).val();
                        if (val == "'.$model->SaleMngNo.'"){
                            $(this).attr(\'selected\',true);
                        }
                    });
                });

                function actionModifyContact(){
                    var contact_name = $(\'[name="contact_name"]\').val();
                    var department = $(\'[name="department"]\').val();
                    var job = $(\'[name="job"]\').val();
                    var tel = $(\'[name="tel"]\').val();
                    var fax = $(\'[name="fax"]\').val();
                    var mobile = $(\'[name="mobile"]\').val();
                    var email = $(\'[name="email"]\').val();
                    var sale_mng_no = $(\'[name="sales_mng"]\').val();
                    var prj_mng_no = $(\'[name="prj_mng"]\').val();
                    var memo = $(\'[name="memo"]\').val();
                    $.ajax({
                        type: \'POST\',
                        url: \''.Employees::BASE_URL.'/contact/modifyContact\',
                        data: {\'contact_id\' : '.$contact_id.',\'contact_name\' : contact_name,\'department\' : department,\'job\' : job,\'tel\' : tel,\'fax\' : fax,\'mobile\' : mobile,\'email\' : email,\'sale_mng_no\' : sale_mng_no,\'prj_mng_no\' : prj_mng_no,\'memo\' :memo}
                    }).success(function(msg){
                            if(msg == 1){
                                alert("Modify Contact successful!");
                                $.ajax({
                                    type: \'GET\',
                                    url: \''.Employees::BASE_URL.'/contact/getClientContact\',
                                    data: {\'client_id\': \''.$model->Client_ID.'\'}
                                }).success(function(data){
                                    window.opener.jQuery(".contact_row").remove();
                                    var tbl = window.opener.jQuery("#list_contact");
                                    tbl.append(data);
                                    self.close();
                                });
                            } else {
                                alert("Modify Contact fail!");
                            }
                        });
                }
                function actionCancelModifyContact(){
                    self.close();
                }
        </script>
        </table></div></body></html>';

        echo $result;
    }
}
