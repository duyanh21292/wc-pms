<?php
/* @var $this SlevelController */
/* @var $model Slevel */

$this->breadcrumbs=array(
	'Slevels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Slevel', 'url'=>array('index')),
	array('label'=>'Manage Slevel', 'url'=>array('admin')),
);
?>

<h1>Create Slevel</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>