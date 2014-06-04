<?php
/* @var $this PostatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Postatuses',
);

$this->menu=array(
	array('label'=>'Create Postatus', 'url'=>array('create')),
	array('label'=>'Manage Postatus', 'url'=>array('admin')),
);
?>

<h1>Postatuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
