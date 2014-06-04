<?php
/* @var $this SuppliertypeController */
/* @var $model Suppliertype */

$this->breadcrumbs=array(
	'Suppliertypes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Suppliertype', 'url'=>array('index')),
	array('label'=>'Manage Suppliertype', 'url'=>array('admin')),
);
?>

<h1>Create Suppliertype</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>