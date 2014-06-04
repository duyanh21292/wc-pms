<?php

class ClientController extends Controller
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
				'actions'=>array('index','view','getAllClientWindow','getAllClient','createClient','createNewClient','modifyClient','updateClient','getClientDetail','getTotalPageNum','getClientResult','clientMailing','searchContactMail'),
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
		$model=new Client;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Client']))
		{
			$model->attributes=$_POST['Client'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Client_ID));
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

		if(isset($_POST['Client']))
		{
			$model->attributes=$_POST['Client'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Client_ID));
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
		$dataProvider=new CActiveDataProvider('Client');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Client('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Client']))
			$model->attributes=$_GET['Client'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Client the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Client::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Client $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='client-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionGetAllClientWindow(){
        $result='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
            "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" type="text/css" href="../../../css/PLcss.css">
            <script type="text/javascript" src="/assets/18e7d7ae/jquery.min.js"></script>
            <script type="text/javascript"  src="../../../scripts/PL-javascript.js"></script>
            <script type="text/javascript">
            function selectClient(no,name) {
                $.ajax({
                    type: \'GET\',
                    url: \'http://x.pms/contact/getAllContactCb\',
                    data: {client_id : no}
                }).success(function(data){
                    window.opener.document.getElementById("cb_c_contact").disabled = false
                    window.opener.document.getElementById("cb_c_contact").innerHTML=data;
                    $.ajax({
                        type: \'GET\',
                        url: \'http://x.pms/contact/getAllContactCb\',
                        data: {client_id : no}
                    }).success(function(data){
                        window.opener.document.getElementById("cb_c_fcontact").disabled = false
                        window.opener.document.getElementById("cb_c_fcontact").innerHTML=data;
                        window.opener.document.getElementById("client_selected_name").innerHTML=name;
                        window.opener.document.getElementById("client_selected_name").setAttribute("clientID",no);
                        self.close();
                    });
                });
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
                        <option value="ClientName">Client Name</option>
                    </select>
                    <input id="ip_search_content" type="text" name="search_content">
                    <input type="submit" value="Search">
                </form>
            </div>
            <div class="sort_frame">
                Sort by:
                <select id="cb_sort_by" name="sort_by">
                    <option value="ClientName">Client Name</option>
                    <option value="Country">Country</option>
                    <option value="Tel">Tel</option>
                </select>
            </div>
        </div>
        <table class="list_data">
            <tr>
                <th>No.</th>
                <th>Client Name</th>
                <th>Country</th>
                <th>Tel</th>
            </tr>';
        $model = ClientInfo::model()->findAll();
        $no = 0;
        foreach ($model as $object) {
            $no++;
            $result = $result.'<tr>
                    <td class="cell_no">'.$no.'.</td>
                    <td><div class="cell_click" onclick="selectClient(\''.$object->Client_ID.'\',\''.$object->ClientName.'\')">'.$object->ClientName.'</div></td>
                    <td>'.$object->CountryName.'</td>
                    <td>'.$object->Tel.'</td>
                </tr>';
        }
        echo $result.'</table></div></body></html>';
    }

    public function actionCreateClient(){
        $client_name = Yii::app()->request->getParam("client_name");
        $tel = Yii::app()->request->getParam("tel");
        $fax = Yii::app()->request->getParam("fax");
        $zip_code = Yii::app()->request->getParam("zip_code");
        $address = Yii::app()->request->getParam("address");
        $url = Yii::app()->request->getParam("url");
        $location = Yii::app()->request->getParam("location");
        $country_id = Yii::app()->request->getParam("country_id");
        $level_id = Yii::app()->request->getParam("level_id");
        $memo = Yii::app()->request->getParam("memo");
        $status = Yii::app()->request->getParam("status");
        $reg_date = Yii::app()->request->getParam("reg_date");
        $modify_date = Yii::app()->request->getParam("modify_date");

        $model = new Client();
        $model->ClientName = $client_name;
        $model->Tel = $tel;
        $model->Fax = $fax;
        $model->ZipCode = $zip_code;
        $model->Address = $address;
        $model->Url = $url;
        $model->Location = $location;
        $model->Country_ID = $country_id;
        $model->C_Level_ID = $level_id;
        $model->Memo = $memo;
        $model->Status = $status;
        $model->RegDate = $reg_date;
        $model->ModifyDate = $modify_date;
        echo $model->save();
    }

    public function actionUpdateClient(){
        $client_id = Yii::app()->request->getParam("client_id");
        $client_name = Yii::app()->request->getParam("client_name");
        $tel = Yii::app()->request->getParam("tel");
        $fax = Yii::app()->request->getParam("fax");
        $zip_code = Yii::app()->request->getParam("zip_code");
        $address = Yii::app()->request->getParam("address");
        $url = Yii::app()->request->getParam("url");
        $location = Yii::app()->request->getParam("location");
        $country_id = Yii::app()->request->getParam("country_id");
        $level_id = Yii::app()->request->getParam("level_id");
        $memo = Yii::app()->request->getParam("memo");
        $status = Yii::app()->request->getParam("status");
        $modify_date = Yii::app()->request->getParam("modify_date");

        $criteria = new CDbCriteria();
        $criteria->condition = 'Client_ID=:client_id';
        $criteria->params = array(':client_id'=>$client_id);
        $model = Client::model()->find($criteria);
        $model->ClientName = $client_name;
        $model->Tel = $tel;
        $model->Fax = $fax;
        $model->ZipCode = $zip_code;
        $model->Address = $address;
        $model->Url = $url;
        $model->Location = $location;
        $model->Country_ID = $country_id;
        $model->C_Level_ID = $level_id;
        $model->Memo = $memo;
        $model->Status = $status;
        $model->ModifyDate = $modify_date;
        echo $model->save();
    }

    public function actionGetAllClient(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;
        $level_id = Yii::app()->request->getParam("level_id");
        $this->layout = '//layouts/ajaxLayout';
        $criteria = new CDbCriteria();
        if (!empty($level_id)){
            $criteria->condition = 'Level_ID =:level_id';
            $criteria->params = array(':level_id'=>$level_id);
        }
        $criteria->limit = 20;
        $criteria->offset = 0;
        $model = ClientInfo::model()->findAll($criteria);
        $this->render('view',array(
            'model'=>$model,
        ));
    }

    public function actionCreateNewClient(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;
        $this->layout = '//layouts/ajaxLayout';
        $this->render('createClient');
    }

    public function actionModifyClient(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $client_id = Yii::app()->request->getParam("client_id");
        $criteria = new CDbCriteria();
        $criteria->condition = 'Client_ID =:client_id';
        $criteria->params = array(':client_id'=>$client_id);
        $model = Client::model()->find($criteria);

        $this->layout = '//layouts/ajaxLayout';
        $this->render('modifyClient',array(
            'model'=>$model,
        ));
    }

    public function actionGetClientDetail(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $client_id = Yii::app()->request->getParam("client_id");
        $criteria = new CDbCriteria();
        $criteria->condition = 'Client_ID=:client_id';
        $criteria->params = array(':client_id'=>$client_id);
        $model = ClientInfo::model()->find($criteria);
        $this->layout = '//layouts/ajaxLayout';
        $this->render('clientDetail',array(
            'model'=>$model,
        ));
    }

    public function actionGetClientResult(){
        $result='';
        $page = Yii::app()->request->getParam("page");
        $search_type = Yii::app()->request->getParam("search_type");
        $search_content = Yii::app()->request->getParam("search_content");
        $status = Yii::app()->request->getParam("status");
        $location = Yii::app()->request->getParam("location");
        $level_id = Yii::app()->request->getParam("level_id");
        $row_start = (0 + (20*($page-1)));
        $criteria = new CDbCriteria();
        if(empty($status)){
            $status = '%%';
        }
        if (empty($location)){
            $location = '%%';
        }
        if (empty($level_id)){
            $level_id = '%%';
        }
        if (empty($search_type)){
            $criteria->condition = 'Status LIKE :status AND Location LIKE :location AND Level_ID LIKE :level_id';
            $criteria->params = array(':status'=>$status,':location'=>$location,':level_id'=>$level_id);
        } else {
            $criteria->condition = $search_type.' LIKE :search_content AND Status LIKE :status AND Location LIKE :location AND Level_ID LIKE :level_id';
            $criteria->params = array(':search_content'=>'%'.$search_content.'%',':status'=>$status,':location'=>$location,':level_id'=>$level_id);
        }
        $criteria->limit = 20;
        $criteria->offset = $row_start;
        $model = ClientInfo::model()->findAll($criteria);
        foreach ($model as $object) {
            $row_start++;
            $result = $result.'<tr class="tr_data">
                    <td class="cell_no">'.$row_start.'.</td>
                    <td style="min-width: 200px"><a class="client_name" href="'.Employees::BASE_URL.'/client/getClientDetail?client_id='.$object->Client_ID.'">'.$object->ClientName.'</a></td>
                    <td style="width: 70px">'.$object->Level.'</td>
                    <td style="width: 150px">'.$object->Location.'</td>
                    <td style="width: 275px">'.$object->CountryName.'</td>
                    <td style="width: 300px">'.$object->Tel.'</td>
                    <td style="width: 300px">'.$object->Fax.'</td>
                </tr>';
        }
        echo $result;
    }

    public function actionGetTotalPageNum(){
        $search_type = Yii::app()->request->getParam("search_type");
        $search_content = Yii::app()->request->getParam("search_content");
        $status = Yii::app()->request->getParam("status");
        $location = Yii::app()->request->getParam("location");
        $level_id = Yii::app()->request->getParam("level_id");
        $criteria = new CDbCriteria();
        if(empty($status)){
            $status = '%%';
        }
        if (empty($location)){
            $location = '%%';
        }
        if (empty($level_id)){
            $level_id = '%%';
        }
        if (empty($search_type)){
            $criteria->condition = 'Status LIKE :status AND Location LIKE :location AND Level_ID LIKE :level_id';
            $criteria->params = array(':status'=>$status,':location'=>$location,':level_id'=>$level_id);
        } else {
            $criteria->condition = $search_type.' LIKE :search_content AND Status LIKE :status AND Location LIKE :location AND Level_ID LIKE :level_id';
            $criteria->params = array(':search_content'=>'%'.$search_content.'%',':status'=>$status,':location'=>$location,':level_id'=>$level_id);
        }
        $all_client = ClientInfo::model()->findAll($criteria);
        $count = count($all_client);
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

    public function actionClientMailing(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $this->layout = '//layouts/ajaxLayout';
        $model = ClientContactInfo::model()->findAll();
        $this->render('clientMailing',array(
            'model'=>$model,
        ));
    }

    public function actionSearchContactMail(){
        $search_type = Yii::app()->request->getParam("search_type");
        $search_content = Yii::app()->request->getParam("search_content");
        $status = Yii::app()->request->getParam("status");
        $location = Yii::app()->request->getParam("location");
        $level_id = Yii::app()->request->getParam("level_id");
        $criteria = new CDbCriteria();
        if(empty($status)){
            $status = '%%';
        }
        if (empty($location)){
            $location = '%%';
        }
        if (empty($level_id)){
            $level_id = '%%';
        }
        if (empty($search_type)){
            $criteria->condition = 'Status LIKE :status AND Location LIKE :location AND Level_ID LIKE :level_id';
            $criteria->params = array(':status'=>$status,':location'=>$location,':level_id'=>$level_id);
        } else {
            $criteria->condition = $search_type.' LIKE :search_content AND Status LIKE :status AND Location LIKE :location AND Level_ID LIKE :level_id';
            $criteria->params = array(':search_content'=>'%'.$search_content.'%',':status'=>$status,':location'=>$location,':level_id'=>$level_id);
        }
        $result = '';
        $model = ClientContactInfo::model()->findAll($criteria);
        foreach ($model as $object) {
            if (!empty($object->Email)) {
                $result = $result.'<div class="contact_mail_highlight">
                <div style="float: left">'.$object->ContactName.'</div>
                <div style="float: left;font-family: pms-font-regular,Arial,sans-serif">
                &nbsp;- '.$object->Email.'</div>
                </div>';
            }
        }
        echo $result;
    }
}
