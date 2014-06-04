<?php
/* @var $this MajorindustryController */
/* @var $model Majorindustry */

$this->breadcrumbs=array(
	'Majorindustries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Majorindustry', 'url'=>array('index')),
	array('label'=>'Manage Majorindustry', 'url'=>array('admin')),
);
?>

<h1>Create Majorindustry</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>