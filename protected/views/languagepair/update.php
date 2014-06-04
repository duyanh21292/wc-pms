<?php
/* @var $this LanguagepairController */
/* @var $model Languagepair */

$this->breadcrumbs=array(
	'Languagepairs'=>array('index'),
	$model->Name=>array('view','id'=>$model->Language_Pair_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Languagepair', 'url'=>array('index')),
	array('label'=>'Create Languagepair', 'url'=>array('create')),
	array('label'=>'View Languagepair', 'url'=>array('view', 'id'=>$model->Language_Pair_ID)),
	array('label'=>'Manage Languagepair', 'url'=>array('admin')),
);
?>

<h1>Update Languagepair <?php echo $model->Language_Pair_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>