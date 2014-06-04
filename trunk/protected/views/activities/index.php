<?php
/* @var $this ActivitiesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Activities',
);

$this->menu=array(
	array('label'=>'Create Activities', 'url'=>array('create')),
	array('label'=>'Manage Activities', 'url'=>array('admin')),
);
?>

<h1>Activities</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
