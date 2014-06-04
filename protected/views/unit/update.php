<?php
/* @var $this UnitController */
/* @var $model Unit */

$this->breadcrumbs=array(
	'Units'=>array('index'),
	$model->Unit_ID=>array('view','id'=>$model->Unit_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Unit', 'url'=>array('index')),
	array('label'=>'Create Unit', 'url'=>array('create')),
	array('label'=>'View Unit', 'url'=>array('view', 'id'=>$model->Unit_ID)),
	array('label'=>'Manage Unit', 'url'=>array('admin')),
);
?>

<h1>Update Unit <?php echo $model->Unit_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>