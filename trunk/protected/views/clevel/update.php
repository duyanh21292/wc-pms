<?php
/* @var $this ClevelController */
/* @var $model Clevel */

$this->breadcrumbs=array(
	'Clevels'=>array('index'),
	$model->Level_ID=>array('view','id'=>$model->Level_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Clevel', 'url'=>array('index')),
	array('label'=>'Create Clevel', 'url'=>array('create')),
	array('label'=>'View Clevel', 'url'=>array('view', 'id'=>$model->Level_ID)),
	array('label'=>'Manage Clevel', 'url'=>array('admin')),
);
?>

<h1>Update Clevel <?php echo $model->Level_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>