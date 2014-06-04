<?php
/* @var $this JobassignsController */
/* @var $model Jobassigns */

$this->breadcrumbs=array(
	'Jobassigns'=>array('index'),
	$model->JobAssign_ID=>array('view','id'=>$model->JobAssign_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Jobassigns', 'url'=>array('index')),
	array('label'=>'Create Jobassigns', 'url'=>array('create')),
	array('label'=>'View Jobassigns', 'url'=>array('view', 'id'=>$model->JobAssign_ID)),
	array('label'=>'Manage Jobassigns', 'url'=>array('admin')),
);
?>

<h1>Update Jobassigns <?php echo $model->JobAssign_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>