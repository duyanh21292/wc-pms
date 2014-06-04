<?php
/* @var $this NewcomputerController */
/* @var $model Computer */

$this->breadcrumbs=array(
	'Computers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Computer', 'url'=>array('index')),
	array('label'=>'Manage Computer', 'url'=>array('admin')),
);
?>

<h1>Create Computer</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>