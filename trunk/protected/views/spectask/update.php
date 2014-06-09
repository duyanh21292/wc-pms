<?php
/* @var $this SpectaskController */
/* @var $model Spectask */

$this->breadcrumbs=array(
	'Spectasks'=>array('index'),
	$model->SpecTask_ID=>array('view','id'=>$model->SpecTask_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Spectask', 'url'=>array('index')),
	array('label'=>'Create Spectask', 'url'=>array('create')),
	array('label'=>'View Spectask', 'url'=>array('view', 'id'=>$model->SpecTask_ID)),
	array('label'=>'Manage Spectask', 'url'=>array('admin')),
);
?>

<h1>Update Spectask <?php echo $model->SpecTask_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>