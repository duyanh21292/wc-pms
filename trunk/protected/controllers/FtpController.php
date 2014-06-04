<?php

class FtpController extends Controller
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
				'actions'=>array('index','view','getClientFtp','createNewFtp','createNewFtpWindow'),
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
		$model=new Ftp;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ftp']))
		{
			$model->attributes=$_POST['Ftp'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Ftp_ID));
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

		if(isset($_POST['Ftp']))
		{
			$model->attributes=$_POST['Ftp'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Ftp_ID));
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
		$dataProvider=new CActiveDataProvider('Ftp');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Ftp('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ftp']))
			$model->attributes=$_GET['Ftp'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ftp the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ftp::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ftp $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ftp-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionCreateNewFtp(){
        $client_id = Yii::app()->request->getParam("client_id");
        $name = Yii::app()->request->getParam("name");
        $url = Yii::app()->request->getParam("url");
        $user_name = Yii::app()->request->getParam("user_name");
        $password = Yii::app()->request->getParam("password");
        $memo = Yii::app()->request->getParam("memo");

        $model = new Ftp();
        $model->Client_ID = $client_id;
        $model->Name = $name;
        $model->Url = $url;
        $model->UserName = $user_name;
        $model->Password = $password;
        $model->Memo = $memo;
         echo $model->save();
    }

    public function actionGetClientFtp(){
        $client_id = Yii::app()->request->getParam("client_id");
        $criteria = new CDbCriteria();
        $criteria->condition = 'Client_ID =:client_id';
        $criteria->params = array(':client_id'=>$client_id);
        $model = Ftp::model()->findAll($criteria);
        $result = '';

        foreach ($model as $object) {
            $result = $result.'<tr class="ftp_row"><td style="text-align:center">'.$object->Name.'</td><td style="text-align:center">'.$object->Url.'</td><td style="text-align:center">'.$object->UserName.'</td><td style="text-align:center">'.$object->Password.'</td></tr>';
        }
        echo $result;
    }

    public function actionCreateNewFtpWindow(){
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
        <tr><td colspan="2" class="form"><div class="frame_title">New FTP</div></td></tr>
        <tr class="form"><td class="form info_form">Client</td><td class="form value_form"><div class="value_selected" style="font-size: medium">'.$client_name.'</div></td></tr>
        <tr class="form"><td class="form info_form">Name</td><td class="form value_form"><input type="text"  name="name" style="width: 250px"></td></tr>
        <tr class="form"><td class="form info_form">Url</td><td class="form value_form"><input type="text"  name="url" style="width: 100%"></td></tr>
        <tr class="form"><td class="form info_form">ID</td><td class="form value_form"><input type="text"  name="user_name" style="width: 250px"></td></tr>
        <tr class="form"><td class="form info_form">Password</td><td class="form value_form"><input type="text"  name="password" style="width: 250px"></td></tr>
        <tr class="form"><td class="form info_form">Memo</td><td class="form value_form"><textarea name="memo" style="width: 100%;height: 100px;"></textarea></td></tr>
        <tr style="height: 100px"><td colspan="2" class="form" style="text-align: center"><button class="bt_large" style="margin-right: 10px" onclick="actionCreateNewFtp()">Create</button><button class="bt_large" onclick="actionCancelNewFtp()">Cancel</button></td></tr>
        <script type="text/javascript">
            function actionCreateNewFtp(){
                var client_id = '.$client_id.';
                var name = $(\'[name="name"]\').val();
                var url = $(\'[name="url"]\').val();
                var user_name = $(\'[name="user_name"]\').val();
                var password = $(\'[name="password"]\').val();
                var memo = $(\'[name="memo"]\').val();
                $.ajax({
                    type: \'POST\',
                    url: \'http://x.pms/ftp/createNewFtp\',
                    data: {\'client_id\' : client_id,\'name\' : name,\'url\' : url,\'user_name\' : user_name,\'password\' : password,\'memo\' :memo}
                }).success(function(msg){
                        if(msg == 1){
                            alert("Create FTP successful!");
                            $.ajax({
                                type: \'GET\',
                                url: \'http://x.pms/ftp/getClientFtp\',
                                data: {\'client_id\': \''.$client_id.'\'}
                            }).success(function(data){
                                window.opener.jQuery(".ftp_row").remove();
                                var tbl = window.opener.jQuery("#list_ftp");
                                tbl.append(data);
                                self.close();
                            });
                        } else {
                            alert("Create FTP fail!");
                        }
                    });
            }
            function actionCancelNewFtp(){
                self.close();
            }
        </script>
        </table></div></body></html>';

        echo $result;
    }
}
