<?php
/* @var $this AvailabletaskController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Availabletasks',
);

$this->menu=array(
	array('label'=>'Create Availabletask', 'url'=>array('create')),
	array('label'=>'Manage Availabletask', 'url'=>array('admin')),
);
?>

<h1>Availabletasks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
