<?php
/* @var $this TimetrackController */
/* @var $model Timetrack */

$this->breadcrumbs=array(
	'Timetracks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Timetrack', 'url'=>array('index')),
	array('label'=>'Manage Timetrack', 'url'=>array('admin')),
);
?>

<h1>Create Timetrack</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>