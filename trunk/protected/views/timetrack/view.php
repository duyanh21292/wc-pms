<?php
/* @var $this TimetrackController */
/* @var $model Timetrack */

$this->breadcrumbs=array(
	'Timetracks'=>array('index'),
	$model->Timtrack_ID,
);

$this->menu=array(
	array('label'=>'List Timetrack', 'url'=>array('index')),
	array('label'=>'Create Timetrack', 'url'=>array('create')),
	array('label'=>'Update Timetrack', 'url'=>array('update', 'id'=>$model->Timtrack_ID)),
	array('label'=>'Delete Timetrack', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Timtrack_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Timetrack', 'url'=>array('admin')),
);
?>

<h1>View Timetrack #<?php echo $model->Timtrack_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Timtrack_ID',
		'JobAssign_ID',
		'Date',
		'StartTime',
		'EndTime',
		'Task_ID',
		'Activities_ID',
		'Unit',
		'Quantity',
		'Comment',
	),
)); ?>
