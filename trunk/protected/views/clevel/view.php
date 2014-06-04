<?php
/* @var $this ClevelController */
/* @var $model Clevel */

$this->breadcrumbs=array(
	'Clevels'=>array('index'),
	$model->Level_ID,
);

$this->menu=array(
	array('label'=>'List Clevel', 'url'=>array('index')),
	array('label'=>'Create Clevel', 'url'=>array('create')),
	array('label'=>'Update Clevel', 'url'=>array('update', 'id'=>$model->Level_ID)),
	array('label'=>'Delete Clevel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Level_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Clevel', 'url'=>array('admin')),
);
?>

<h1>View Clevel #<?php echo $model->Level_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Level_ID',
		'Level_Name',
		'Description',
	),
)); ?>
