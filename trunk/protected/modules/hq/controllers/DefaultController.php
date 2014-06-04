<?php

class DefaultController extends HqController
{
    public $layout = 'column1';

	function accessRules()
	{
    	return CMap::mergeArray(array(
    		array('allow', 'actions'=>array('error')),
    	), parent::accessRules());
	}

	function actionIndex()
	{
    	$this->render('index');
	}

	function actionError()
	{
    	$this->render('error', Yii::app()->errorHandler->error);
	}
}
