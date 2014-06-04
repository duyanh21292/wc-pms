<?php
/* @var $this LanguagepairController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Languagepairs',
);

$this->menu=array(
	array('label'=>'Create Languagepair', 'url'=>array('create')),
	array('label'=>'Manage Languagepair', 'url'=>array('admin')),
);
?>

<h1>Languagepairs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
