<?php
/* @var $this PoController */
/* @var $model Po */

$this->breadcrumbs=array(
	'Pos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Po', 'url'=>array('index')),
	array('label'=>'Manage Po', 'url'=>array('admin')),
);
?>

<h1>Create Po</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>