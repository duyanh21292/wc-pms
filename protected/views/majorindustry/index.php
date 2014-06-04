<?php
/* @var $this MajorindustryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Majorindustries',
);

$this->menu=array(
	array('label'=>'Create Majorindustry', 'url'=>array('create')),
	array('label'=>'Manage Majorindustry', 'url'=>array('admin')),
);
?>

<h1>Majorindustries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
