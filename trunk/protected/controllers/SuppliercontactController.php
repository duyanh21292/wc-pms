<?php

class SuppliercontactController extends Controller
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
				'actions'=>array('index','view','getSupplierContact','createNewContactW','createNewContact','getSuppContactCb'),
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
		$model=new Suppliercontact;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Suppliercontact']))
		{
			$model->attributes=$_POST['Suppliercontact'];
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

		if(isset($_POST['Suppliercontact']))
		{
			$model->attributes=$_POST['Suppliercontact'];
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
		$dataProvider=new CActiveDataProvider('Suppliercontact');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Suppliercontact('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Suppliercontact']))
			$model->attributes=$_GET['Suppliercontact'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Suppliercontact the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Suppliercontact::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Suppliercontact $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='suppliercontact-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionGetSupplierContact(){
        $result='';
        $supp_no = Yii::app()->request->getParam("supp_no");
        $criteria = new CDbCriteria();
        $criteria->condition = 'SupplierNo =:supp_no';
        $criteria->params = array(':supp_no'=>$supp_no);
        $model = Suppliercontact::model()->findAll($criteria);
        $no = 0;
        foreach ($model as $object) {
            $no++;
            $result = $result.'<tr class="contact_row">
                <td style="text-align:right">'.$no.'.</td>
                <td style="text-align:center"><div style="cursor:pointer" onclick="">'.$object->Name.'</div></td>
                <td style="text-align:center">'.$object->Department.'</td>
                <td style="text-align:center">'.$object->JobTitle.'</td>
                <td style="text-align:center">'.$object->Tel.'</td>
                <td style="text-align:center">'.$object->Fax.'</td>
                <td style="text-align:center">'.$object->Mobile.'</td>
                <td style="text-align:center">'.$object->Email.'</td>
                </tr>';
        }
        echo $result;
    }

    public function actionCreateNewContactW(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $this->renderPartial('createNewContactWindow');
    }

    public function actionCreateNewContact(){
        $supp_no = Yii::app()->request->getParam("supp_no");
        $name = Yii::app()->request->getParam("name");
        $department = Yii::app()->request->getParam("department");
        $job = Yii::app()->request->getParam("job");
        $tel = Yii::app()->request->getParam("tel");
        $fax = Yii::app()->request->getParam("fax");
        $mobile = Yii::app()->request->getParam("mobile");
        $email = Yii::app()->request->getParam("email");
        $memo = Yii::app()->request->getParam("memo");

        $model = new Suppliercontact();
        $model->SupplierNo =  $supp_no;
        $model->Name =  $name;
        $model->Department =  $department;
        $model->JobTitle =  $job;
        $model->Tel =  $tel;
        $model->Fax =  $fax;
        $model->Mobile =  $mobile;
        $model->Email =  $email;
        $model->Memo =  $memo;

        echo $model->save();
    }

    public function actionGetSuppContactCb(){
        $supp_no = Yii::app()->request->getParam("supp_no");
        $criteria = new CDbCriteria();
        $criteria->condition = 'SupplierNo =:supp_no';
        $criteria->params = array(':supp_no'=>$supp_no);
        $model = Suppliercontact::model()->findAll($criteria);
        $result='<select id="cb_supp_contact" name="supp_contact" style="min-width: 150px;margin-left: 5px">';
        foreach($model as $obj) {
            $result = $result.'<option value="'.$obj->Contact_ID.'">'.$obj->Name.'</option>';
        }
        echo $result.'</select>';
    }
}
