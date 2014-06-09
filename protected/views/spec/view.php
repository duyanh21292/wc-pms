<?php
/* @var $this SpecController */
/* @var $model Spec */

$this->breadcrumbs=array(
	'Specs'=>array('index'),
	$model->Spec_ID,
);

$this->menu=array(
	array('label'=>'List Spec', 'url'=>array('index')),
	array('label'=>'Create Spec', 'url'=>array('create')),
	array('label'=>'Update Spec', 'url'=>array('update', 'id'=>$model->Spec_ID)),
	array('label'=>'Delete Spec', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Spec_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Spec', 'url'=>array('admin')),
);
?>

<h1>View Spec #<?php echo $model->Spec_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Spec_ID',
		'ProjectNo',
		'SpecTask_ID',
		'Fileitem',
		'Unit_ID',
		'Quantity',
		'UPrice',
		'Currency_ID',
		'Memo',
		'ExchRate',
		'Amount',
	),
)); ?>
