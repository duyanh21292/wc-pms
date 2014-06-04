<?php
/* @var $this ActivitiesController */
/* @var $model Activities */

$this->breadcrumbs=array(
	'Activities'=>array('index'),
	$model->Activities_ID,
);

$this->menu=array(
	array('label'=>'List Activities', 'url'=>array('index')),
	array('label'=>'Create Activities', 'url'=>array('create')),
	array('label'=>'Update Activities', 'url'=>array('update', 'id'=>$model->Activities_ID)),
	array('label'=>'Delete Activities', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Activities_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Activities', 'url'=>array('admin')),
);
?>

<h1>View Activities #<?php echo $model->Activities_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Activities_ID',
		'ActivitiesName',
		'Task_ID',
	),
)); ?>
