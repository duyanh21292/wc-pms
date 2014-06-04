<?php
/* @var $this AvailabletaskController */
/* @var $model Availabletask */

$this->breadcrumbs=array(
	'Availabletasks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Availabletask', 'url'=>array('index')),
	array('label'=>'Manage Availabletask', 'url'=>array('admin')),
);
?>

<h1>Create Availabletask</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>