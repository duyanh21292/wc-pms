<?php
/* @var $this SuppliercontactController */
/* @var $model Suppliercontact */

$this->breadcrumbs=array(
	'Suppliercontacts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Suppliercontact', 'url'=>array('index')),
	array('label'=>'Manage Suppliercontact', 'url'=>array('admin')),
);
?>

<h1>Create Suppliercontact</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>