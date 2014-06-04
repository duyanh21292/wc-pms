<?php
/* @var $this ClevelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clevels',
);

$this->menu=array(
	array('label'=>'Create Clevel', 'url'=>array('create')),
	array('label'=>'Manage Clevel', 'url'=>array('admin')),
);
?>

<h1>Clevels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
