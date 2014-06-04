<?php
/* @var $this DeliverymethodController */
/* @var $model Deliverymethod */

$this->breadcrumbs=array(
	'Deliverymethods'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List Deliverymethod', 'url'=>array('index')),
	array('label'=>'Create Deliverymethod', 'url'=>array('create')),
	array('label'=>'Update Deliverymethod', 'url'=>array('update', 'id'=>$model->DeliveryMethod_ID)),
	array('label'=>'Delete Deliverymethod', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->DeliveryMethod_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Deliverymethod', 'url'=>array('admin')),
);
?>

<h1>View Deliverymethod #<?php echo $model->DeliveryMethod_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'DeliveryMethod_ID',
		'Name',
	),
)); ?>
