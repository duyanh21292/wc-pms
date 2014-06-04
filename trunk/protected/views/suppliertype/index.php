<?php
/* @var $this SuppliertypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliertypes',
);

$this->menu=array(
	array('label'=>'Create Suppliertype', 'url'=>array('create')),
	array('label'=>'Manage Suppliertype', 'url'=>array('admin')),
);
?>

<h1>Suppliertypes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
