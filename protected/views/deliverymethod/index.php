<?php
/* @var $this DeliverymethodController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Deliverymethods',
);

$this->menu=array(
	array('label'=>'Create Deliverymethod', 'url'=>array('create')),
	array('label'=>'Manage Deliverymethod', 'url'=>array('admin')),
);
?>

<h1>Deliverymethods</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
