<?php
/* @var $this DivisionController */
/* @var $model Division */

$this->breadcrumbs=array(
	'Divisions'=>array('index'),
	$model->Division_ID=>array('view','id'=>$model->Division_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Division', 'url'=>array('index')),
	array('label'=>'Create Division', 'url'=>array('create')),
	array('label'=>'View Division', 'url'=>array('view', 'id'=>$model->Division_ID)),
	array('label'=>'Manage Division', 'url'=>array('admin')),
);
?>

<h1>Update Division <?php echo $model->Division_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>