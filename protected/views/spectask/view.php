<?php
/* @var $this SpectaskController */
/* @var $model Spectask */

$this->breadcrumbs=array(
	'Spectasks'=>array('index'),
	$model->SpecTask_ID,
);

$this->menu=array(
	array('label'=>'List Spectask', 'url'=>array('index')),
	array('label'=>'Create Spectask', 'url'=>array('create')),
	array('label'=>'Update Spectask', 'url'=>array('update', 'id'=>$model->SpecTask_ID)),
	array('label'=>'Delete Spectask', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->SpecTask_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Spectask', 'url'=>array('admin')),
);
?>

<h1>View Spectask #<?php echo $model->SpecTask_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'SpecTask_ID',
		'SpecTask_Name',
	),
)); ?>
