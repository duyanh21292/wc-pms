<?php
/* @var $this SpecController */
/* @var $model Spec */

$this->breadcrumbs=array(
	'Specs'=>array('index'),
	$model->Spec_ID=>array('view','id'=>$model->Spec_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Spec', 'url'=>array('index')),
	array('label'=>'Create Spec', 'url'=>array('create')),
	array('label'=>'View Spec', 'url'=>array('view', 'id'=>$model->Spec_ID)),
	array('label'=>'Manage Spec', 'url'=>array('admin')),
);
?>

<h1>Update Spec <?php echo $model->Spec_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>