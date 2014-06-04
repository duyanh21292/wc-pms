<?php
/* @var $this IndustryController */
/* @var $model Industry */

$this->breadcrumbs=array(
	'Industries'=>array('index'),
	$model->Industry_ID=>array('view','id'=>$model->Industry_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Industry', 'url'=>array('index')),
	array('label'=>'Create Industry', 'url'=>array('create')),
	array('label'=>'View Industry', 'url'=>array('view', 'id'=>$model->Industry_ID)),
	array('label'=>'Manage Industry', 'url'=>array('admin')),
);
?>

<h1>Update Industry <?php echo $model->Industry_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>