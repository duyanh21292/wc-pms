<?php
/* @var $this PostatusController */
/* @var $model Postatus */

$this->breadcrumbs=array(
	'Postatuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Postatus', 'url'=>array('index')),
	array('label'=>'Manage Postatus', 'url'=>array('admin')),
);
?>

<h1>Create Postatus</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>