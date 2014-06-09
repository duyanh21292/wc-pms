<?php
/* @var $this SpectaskController */
/* @var $model Spectask */

$this->breadcrumbs=array(
	'Spectasks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Spectask', 'url'=>array('index')),
	array('label'=>'Manage Spectask', 'url'=>array('admin')),
);
?>

<h1>Create Spectask</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>