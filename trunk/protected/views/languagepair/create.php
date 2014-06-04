<?php
/* @var $this LanguagepairController */
/* @var $model Languagepair */

$this->breadcrumbs=array(
	'Languagepairs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Languagepair', 'url'=>array('index')),
	array('label'=>'Manage Languagepair', 'url'=>array('admin')),
);
?>

<h1>Create Languagepair</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>