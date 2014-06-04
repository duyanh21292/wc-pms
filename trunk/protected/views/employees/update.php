<?php
/* @var $this EmployeesController */
/* @var $model Employees */

$this->breadcrumbs=array(
	'Employees'=>array('index'),
	$model->EmpNo=>array('view','id'=>$model->EmpNo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Employees', 'url'=>array('index')),
	array('label'=>'Create Employees', 'url'=>array('create')),
	array('label'=>'View Employees', 'url'=>array('view', 'id'=>$model->EmpNo)),
	array('label'=>'Manage Employees', 'url'=>array('admin')),
);
?>

<h1>Update Employees <?php echo $model->EmpNo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>