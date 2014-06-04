<?php
/* @var $this DeliverymethodController */
/* @var $model Deliverymethod */

$this->breadcrumbs=array(
	'Deliverymethods'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Deliverymethod', 'url'=>array('index')),
	array('label'=>'Manage Deliverymethod', 'url'=>array('admin')),
);
?>

<h1>Create Deliverymethod</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>