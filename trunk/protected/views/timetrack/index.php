<?php
/* @var $this TimetrackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Timetracks',
);

$this->menu=array(
	array('label'=>'Create Timetrack', 'url'=>array('create')),
	array('label'=>'Manage Timetrack', 'url'=>array('admin')),
);
?>

<h1>Timetracks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
