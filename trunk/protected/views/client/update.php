<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	$model->Client_ID=>array('view','id'=>$model->Client_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Client', 'url'=>array('index')),
	array('label'=>'Create Client', 'url'=>array('create')),
	array('label'=>'View Client', 'url'=>array('view', 'id'=>$model->Client_ID)),
	array('label'=>'Manage Client', 'url'=>array('admin')),
);
?>

<h1>Update Client <?php echo $model->Client_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>