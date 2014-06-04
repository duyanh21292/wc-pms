<?php
/* @var $this JobController */
/* @var $model Job */

$this->breadcrumbs=array(
	'Jobs'=>array('index'),
	$model->Job_ID=>array('view','id'=>$model->Job_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Job', 'url'=>array('index')),
	array('label'=>'Create Job', 'url'=>array('create')),
	array('label'=>'View Job', 'url'=>array('view', 'id'=>$model->Job_ID)),
	array('label'=>'Manage Job', 'url'=>array('admin')),
);
?>

<h1>Update Job <?php echo $model->Job_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>