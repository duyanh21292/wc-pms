<?php
/* @var $this IndustryController */
/* @var $model Industry */

$this->breadcrumbs=array(
	'Industries'=>array('index'),
	$model->Industry_ID,
);

$this->menu=array(
	array('label'=>'List Industry', 'url'=>array('index')),
	array('label'=>'Create Industry', 'url'=>array('create')),
	array('label'=>'Update Industry', 'url'=>array('update', 'id'=>$model->Industry_ID)),
	array('label'=>'Delete Industry', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Industry_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Industry', 'url'=>array('admin')),
);
?>

<h1>View Industry #<?php echo $model->Industry_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Industry_ID',
		'IndustryName',
	),
)); ?>
