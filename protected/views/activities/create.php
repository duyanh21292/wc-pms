<?php
/* @var $this ActivitiesController */
/* @var $model Activities */

$this->breadcrumbs=array(
	'Activities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Activities', 'url'=>array('index')),
	array('label'=>'Manage Activities', 'url'=>array('admin')),
);
?>

<h1>Create Activities</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>