<?php
/* @var $this SpectaskController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Spectasks',
);

$this->menu=array(
	array('label'=>'Create Spectask', 'url'=>array('create')),
	array('label'=>'Manage Spectask', 'url'=>array('admin')),
);
?>

<h1>Spectasks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
