<?php
/* @var $this SuppliercontactController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliercontacts',
);

$this->menu=array(
	array('label'=>'Create Suppliercontact', 'url'=>array('create')),
	array('label'=>'Manage Suppliercontact', 'url'=>array('admin')),
);
?>

<h1>Suppliercontacts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
