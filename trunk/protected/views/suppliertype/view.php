<?php
/* @var $this SuppliertypeController */
/* @var $model Suppliertype */

$this->breadcrumbs=array(
	'Suppliertypes'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List Suppliertype', 'url'=>array('index')),
	array('label'=>'Create Suppliertype', 'url'=>array('create')),
	array('label'=>'Update Suppliertype', 'url'=>array('update', 'id'=>$model->SType_ID)),
	array('label'=>'Delete Suppliertype', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->SType_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Suppliertype', 'url'=>array('admin')),
);
?>

<h1>View Suppliertype #<?php echo $model->SType_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'SType_ID',
		'Name',
		'Description',
	),
)); ?>
