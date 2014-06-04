<?php
/* @var $this MajorindustryController */
/* @var $model Majorindustry */

$this->breadcrumbs=array(
	'Majorindustries'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List Majorindustry', 'url'=>array('index')),
	array('label'=>'Create Majorindustry', 'url'=>array('create')),
	array('label'=>'Update Majorindustry', 'url'=>array('update', 'id'=>$model->MIndustry_ID)),
	array('label'=>'Delete Majorindustry', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->MIndustry_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Majorindustry', 'url'=>array('admin')),
);
?>

<h1>View Majorindustry #<?php echo $model->MIndustry_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'MIndustry_ID',
		'Name',
		'Description',
	),
)); ?>
