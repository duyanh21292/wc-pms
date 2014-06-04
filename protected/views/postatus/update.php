<?php
/* @var $this PostatusController */
/* @var $model Postatus */

$this->breadcrumbs=array(
	'Postatuses'=>array('index'),
	$model->Status_ID=>array('view','id'=>$model->Status_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Postatus', 'url'=>array('index')),
	array('label'=>'Create Postatus', 'url'=>array('create')),
	array('label'=>'View Postatus', 'url'=>array('view', 'id'=>$model->Status_ID)),
	array('label'=>'Manage Postatus', 'url'=>array('admin')),
);
?>

<h1>Update Postatus <?php echo $model->Status_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>