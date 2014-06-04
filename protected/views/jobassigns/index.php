<?php
/* @var $this JobassignsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jobassigns',
);

$this->menu=array(
	array('label'=>'Create Jobassigns', 'url'=>array('create')),
	array('label'=>'Manage Jobassigns', 'url'=>array('admin')),
);
?>

<h1>Jobassigns</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
