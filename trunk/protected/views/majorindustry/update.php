<?php
/* @var $this MajorindustryController */
/* @var $model Majorindustry */

$this->breadcrumbs=array(
	'Majorindustries'=>array('index'),
	$model->Name=>array('view','id'=>$model->MIndustry_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Majorindustry', 'url'=>array('index')),
	array('label'=>'Create Majorindustry', 'url'=>array('create')),
	array('label'=>'View Majorindustry', 'url'=>array('view', 'id'=>$model->MIndustry_ID)),
	array('label'=>'Manage Majorindustry', 'url'=>array('admin')),
);
?>

<h1>Update Majorindustry <?php echo $model->MIndustry_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>