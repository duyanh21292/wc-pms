<?php
/* @var $this JobassignsController */
/* @var $model Jobassigns */

$this->breadcrumbs=array(
	'Jobassigns'=>array('index'),
	$model->JobAssign_ID,
);

$this->menu=array(
	array('label'=>'List Jobassigns', 'url'=>array('index')),
	array('label'=>'Create Jobassigns', 'url'=>array('create')),
	array('label'=>'Update Jobassigns', 'url'=>array('update', 'id'=>$model->JobAssign_ID)),
	array('label'=>'Delete Jobassigns', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->JobAssign_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Jobassigns', 'url'=>array('admin')),
);
?>

<h1>View Jobassigns #<?php echo $model->JobAssign_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'JobAssign_ID',
		'ProjectNo',
		'EmpNo',
		'Task_ID',
		'Activities_ID',
		'Unit_ID',
		'Quantity',
		'AssignedHour',
		'StartDate',
		'EndDate',
		'Comment',
		'Status',
	),
)); ?>
