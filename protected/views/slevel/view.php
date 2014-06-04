<?php
/* @var $this SlevelController */
/* @var $model Slevel */

$this->breadcrumbs=array(
	'Slevels'=>array('index'),
	$model->Level_ID,
);

$this->menu=array(
	array('label'=>'List Slevel', 'url'=>array('index')),
	array('label'=>'Create Slevel', 'url'=>array('create')),
	array('label'=>'Update Slevel', 'url'=>array('update', 'id'=>$model->Level_ID)),
	array('label'=>'Delete Slevel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Level_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Slevel', 'url'=>array('admin')),
);
?>

<h1>View Slevel #<?php echo $model->Level_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Level_ID',
		'Level_Name',
		'Description',
	),
)); ?>
