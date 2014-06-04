<?php
/* @var $this EducationController */
/* @var $model Education */

$this->breadcrumbs=array(
	'Educations'=>array('index'),
	$model->Education_ID,
);

$this->menu=array(
	array('label'=>'List Education', 'url'=>array('index')),
	array('label'=>'Create Education', 'url'=>array('create')),
	array('label'=>'Update Education', 'url'=>array('update', 'id'=>$model->Education_ID)),
	array('label'=>'Delete Education', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Education_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Education', 'url'=>array('admin')),
);
?>

<h1>View Education #<?php echo $model->Education_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Education_ID',
		'EducationName',
	),
)); ?>
