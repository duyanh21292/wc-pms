<?php
/* @var $this ComputerController */
/* @var $model Computer */

$this->breadcrumbs=array(
	'Computers'=>array('index'),
	$model->Comp_ID=>array('view','id'=>$model->Comp_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Computer', 'url'=>array('index')),
	array('label'=>'Create Computer', 'url'=>array('create')),
	array('label'=>'View Computer', 'url'=>array('view', 'id'=>$model->Comp_ID)),
	array('label'=>'Manage Computer', 'url'=>array('admin')),
);
?>

<h1>Update Computer <?php echo $model->Comp_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>