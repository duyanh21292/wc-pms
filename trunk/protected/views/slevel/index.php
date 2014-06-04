<?php
/* @var $this SlevelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Slevels',
);

$this->menu=array(
	array('label'=>'Create Slevel', 'url'=>array('create')),
	array('label'=>'Manage Slevel', 'url'=>array('admin')),
);
?>

<h1>Slevels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
