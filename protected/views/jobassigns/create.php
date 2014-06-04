<?php
/* @var $this JobassignsController */
/* @var $model Jobassigns */

$this->breadcrumbs=array(
	'Jobassigns'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Jobassigns', 'url'=>array('index')),
	array('label'=>'Manage Jobassigns', 'url'=>array('admin')),
);
?>

<h1>Create Jobassigns</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>