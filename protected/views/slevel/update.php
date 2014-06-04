<?php
/* @var $this SlevelController */
/* @var $model Slevel */

$this->breadcrumbs=array(
	'Slevels'=>array('index'),
	$model->Level_ID=>array('view','id'=>$model->Level_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Slevel', 'url'=>array('index')),
	array('label'=>'Create Slevel', 'url'=>array('create')),
	array('label'=>'View Slevel', 'url'=>array('view', 'id'=>$model->Level_ID)),
	array('label'=>'Manage Slevel', 'url'=>array('admin')),
);
?>

<h1>Update Slevel <?php echo $model->Level_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>