<?php
/* @var $this SuppliercontactController */
/* @var $model Suppliercontact */

$this->breadcrumbs=array(
	'Suppliercontacts'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List Suppliercontact', 'url'=>array('index')),
	array('label'=>'Create Suppliercontact', 'url'=>array('create')),
	array('label'=>'Update Suppliercontact', 'url'=>array('update', 'id'=>$model->Contact_ID)),
	array('label'=>'Delete Suppliercontact', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Contact_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Suppliercontact', 'url'=>array('admin')),
);
?>

<h1>View Suppliercontact #<?php echo $model->Contact_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Contact_ID',
		'SupplierNo',
		'Name',
		'Department',
		'JobTitle',
		'Tel',
		'Fax',
		'Mobile',
		'Email',
		'Memo',
	),
)); ?>
