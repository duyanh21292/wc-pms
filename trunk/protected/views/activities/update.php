<?php
/* @var $this ActivitiesController */
/* @var $model Activities */

$this->breadcrumbs=array(
	'Activities'=>array('index'),
	$model->Activities_ID=>array('view','id'=>$model->Activities_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Activities', 'url'=>array('index')),
	array('label'=>'Create Activities', 'url'=>array('create')),
	array('label'=>'View Activities', 'url'=>array('view', 'id'=>$model->Activities_ID)),
	array('label'=>'Manage Activities', 'url'=>array('admin')),
);
?>

<h1>Update Activities <?php echo $model->Activities_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>