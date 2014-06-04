<?php
/* @var $this PostatusController */
/* @var $model Postatus */

$this->breadcrumbs=array(
	'Postatuses'=>array('index'),
	$model->Status_ID,
);

$this->menu=array(
	array('label'=>'List Postatus', 'url'=>array('index')),
	array('label'=>'Create Postatus', 'url'=>array('create')),
	array('label'=>'Update Postatus', 'url'=>array('update', 'id'=>$model->Status_ID)),
	array('label'=>'Delete Postatus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Status_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Postatus', 'url'=>array('admin')),
);
?>

<h1>View Postatus #<?php echo $model->Status_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Status_ID',
		'Status',
	),
)); ?>
