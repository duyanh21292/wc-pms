<?php
/* @var $this AvailabletaskController */
/* @var $model Availabletask */

$this->breadcrumbs=array(
	'Availabletasks'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List Availabletask', 'url'=>array('index')),
	array('label'=>'Create Availabletask', 'url'=>array('create')),
	array('label'=>'Update Availabletask', 'url'=>array('update', 'id'=>$model->ATask_ID)),
	array('label'=>'Delete Availabletask', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ATask_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Availabletask', 'url'=>array('admin')),
);
?>

<h1>View Availabletask #<?php echo $model->ATask_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ATask_ID',
		'Name',
		'Description',
	),
)); ?>
