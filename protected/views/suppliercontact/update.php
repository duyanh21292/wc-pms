<?php
/* @var $this SuppliercontactController */
/* @var $model Suppliercontact */

$this->breadcrumbs=array(
	'Suppliercontacts'=>array('index'),
	$model->Name=>array('view','id'=>$model->Contact_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Suppliercontact', 'url'=>array('index')),
	array('label'=>'Create Suppliercontact', 'url'=>array('create')),
	array('label'=>'View Suppliercontact', 'url'=>array('view', 'id'=>$model->Contact_ID)),
	array('label'=>'Manage Suppliercontact', 'url'=>array('admin')),
);
?>

<h1>Update Suppliercontact <?php echo $model->Contact_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>