<?php
/* @var $this StatusController */
/* @var $model Status */

$this->breadcrumbs=array(
	'Statuses'=>array('index'),
	$model->Status_ID=>array('view','id'=>$model->Status_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Status', 'url'=>array('index')),
	array('label'=>'Create Status', 'url'=>array('create')),
	array('label'=>'View Status', 'url'=>array('view', 'id'=>$model->Status_ID)),
	array('label'=>'Manage Status', 'url'=>array('admin')),
);
?>

<h1>Update Status <?php echo $model->Status_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>