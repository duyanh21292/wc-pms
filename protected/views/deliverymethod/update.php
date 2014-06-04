<?php
/* @var $this DeliverymethodController */
/* @var $model Deliverymethod */

$this->breadcrumbs=array(
	'Deliverymethods'=>array('index'),
	$model->Name=>array('view','id'=>$model->DeliveryMethod_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Deliverymethod', 'url'=>array('index')),
	array('label'=>'Create Deliverymethod', 'url'=>array('create')),
	array('label'=>'View Deliverymethod', 'url'=>array('view', 'id'=>$model->DeliveryMethod_ID)),
	array('label'=>'Manage Deliverymethod', 'url'=>array('admin')),
);
?>

<h1>Update Deliverymethod <?php echo $model->DeliveryMethod_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>