<?php
/* @var $this ClevelController */
/* @var $model Clevel */

$this->breadcrumbs=array(
	'Clevels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Clevel', 'url'=>array('index')),
	array('label'=>'Manage Clevel', 'url'=>array('admin')),
);
?>

<h1>Create Clevel</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>