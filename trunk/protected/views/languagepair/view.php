<?php
/* @var $this LanguagepairController */
/* @var $model Languagepair */

$this->breadcrumbs=array(
	'Languagepairs'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List Languagepair', 'url'=>array('index')),
	array('label'=>'Create Languagepair', 'url'=>array('create')),
	array('label'=>'Update Languagepair', 'url'=>array('update', 'id'=>$model->Language_Pair_ID)),
	array('label'=>'Delete Languagepair', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Language_Pair_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Languagepair', 'url'=>array('admin')),
);
?>

<h1>View Languagepair #<?php echo $model->Language_Pair_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Language_Pair_ID',
		'Name',
		'FromLang',
		'ToLang',
	),
)); ?>
