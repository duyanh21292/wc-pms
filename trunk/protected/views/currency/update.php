<?php
/* @var $this CurrencyController */
/* @var $model Currency */

$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	$model->Currency_ID=>array('view','id'=>$model->Currency_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Currency', 'url'=>array('index')),
	array('label'=>'Create Currency', 'url'=>array('create')),
	array('label'=>'View Currency', 'url'=>array('view', 'id'=>$model->Currency_ID)),
	array('label'=>'Manage Currency', 'url'=>array('admin')),
);
?>

<h1>Update Currency <?php echo $model->Currency_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>