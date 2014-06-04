<?php
/* @var $this SuppliertypeController */
/* @var $model Suppliertype */

$this->breadcrumbs=array(
	'Suppliertypes'=>array('index'),
	$model->Name=>array('view','id'=>$model->SType_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Suppliertype', 'url'=>array('index')),
	array('label'=>'Create Suppliertype', 'url'=>array('create')),
	array('label'=>'View Suppliertype', 'url'=>array('view', 'id'=>$model->SType_ID)),
	array('label'=>'Manage Suppliertype', 'url'=>array('admin')),
);
?>

<h1>Update Suppliertype <?php echo $model->SType_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>