<?php
/* @var $this AvailabletaskController */
/* @var $model Availabletask */

$this->breadcrumbs=array(
	'Availabletasks'=>array('index'),
	$model->Name=>array('view','id'=>$model->ATask_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Availabletask', 'url'=>array('index')),
	array('label'=>'Create Availabletask', 'url'=>array('create')),
	array('label'=>'View Availabletask', 'url'=>array('view', 'id'=>$model->ATask_ID)),
	array('label'=>'Manage Availabletask', 'url'=>array('admin')),
);
?>

<h1>Update Availabletask <?php echo $model->ATask_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>