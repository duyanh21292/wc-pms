<?php

class SpecController extends Controller
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
                'actions'=>array('index','view','getProjectSpec','createNewSpec','createSpec','reloadListSpec'),
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
        $model=new Spec;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Spec']))
        {
            $model->attributes=$_POST['Spec'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->Spec_ID));
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

        if(isset($_POST['Spec']))
        {
            $model->attributes=$_POST['Spec'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->Spec_ID));
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
        $dataProvider=new CActiveDataProvider('Spec');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Spec('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Spec']))
            $model->attributes=$_GET['Spec'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Spec the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Spec::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Spec $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='spec-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function  actionCreateNewSpec(){
        $prj_no = Yii::app()->request->getParam("prj_no");
        $criteria = new CDbCriteria();
        $criteria->condition = 'ProjectNo=:prj_no';
        $criteria->params = array(':prj_no'=>$prj_no);
        $model = Projects::model()->find($criteria);
        $this->renderPartial('createSpec',array(
            'model'=> $model
        ));
    }

    public function actionCreateSpec(){
        $prj_no = Yii::app()->request->getParam("prj_no");
        $spec_task_id = Yii::app()->request->getParam("spec_task_id");
        $file_item = Yii::app()->request->getParam("file_item");
        $unit_id = Yii::app()->request->getParam("unit_id");
        $quantity = Yii::app()->request->getParam("quantity");
        $u_price = Yii::app()->request->getParam("u_price");
        $cur_id = Yii::app()->request->getParam("cur_id");
        $memo = Yii::app()->request->getParam("memo");
        $exch_rate = Yii::app()->request->getParam("exch_rate");

        $model = new Spec();
        $model->ProjectNo = $prj_no;
        $model->SpecTask_ID = $spec_task_id;
        $model->Fileitem = $file_item;
        $model->Unit_ID = $unit_id;
        $model->Quantity = $quantity;
        $model->UPrice = $u_price;
        $model->Currency_ID = $cur_id;
        $model->Memo = $memo;
        $model->ExchRate = $exch_rate;

        echo $model->save();
    }

    public function actionGetProjectSpec(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;

        $this->layout = '//layouts/ajaxLayout';
        $prj_no = Yii::app()->request->getParam("prj_no");
        $criteria = new CDbCriteria();
        $criteria->condition = 'ProjectNo=:prj_no';
        $criteria->params = array(':prj_no'=>$prj_no);

        $model = SpecInfo::model()->findAll($criteria);
        $this->render('listSpecByPrj',array(
            'model'=>$model,
        ));
    }

    public function actionReloadListSpec(){
        $result = '';
        $prj_no = Yii::app()->request->getParam("prj_no");
        $criteria = new CDbCriteria();
        $criteria->condition = 'ProjectNo=:prj_no';
        $criteria->params = array(':prj_no'=>$prj_no);
        $model = SpecInfo::model()->findAll($criteria);
        $total_amount_usd = 0.0000;
        $total_amount_vnd = 0.0000;
        foreach ($model as $object) {
            $total_amount_usd = $total_amount_usd + ($object->Quantity * $object->UPrice);
            $total_amount_vnd = $total_amount_vnd + $object->Amount;
            $result = $result.'<tr class="spec">
                    <td>'.$object->SpecTask_Name.'</td>
                    <td>'.$object->Fileitem.'</td>
                    <td style="text-align: center">'.$object->Unit.'</td>
                    <td style="text-align: right">'.number_format($object->Quantity,4,".",",").'</td>
                    <td style="text-align: right">'.number_format($object->UPrice,4,".",",").' '.$object->CurrencyNo.'</td>
                    <td style="text-align: right">'.number_format($object->ExchRate,4,".",",").'</td>
                    <td style="text-align: right">'.number_format($object->Amount,4,".",",").'</td>
                    <td></td>
                </tr>';
        }
        $result = $result.'<tr class="spec" style="height: 30px">
                    <td class="total" colspan="3">Total Amount</td>
                    <td class="total" colspan="2" style="text-align: right">
                        <div id="total_amount_usd" class="total">'.number_format($total_amount_usd,4,".",",").' USD</div>
                    </td>
                    <td class="total" colspan="2" style="text-align: right">
                        <div id="total_amount_vnd" class="total">VND '.number_format($total_amount_vnd,4,".",",").'</div>
                    </td>
                    <td class="total"></td>
                </tr>';
        echo $result;
    }
}
