<?php
/* @var $this FtpController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ftps',
);

$this->menu=array(
	array('label'=>'Create Ftp', 'url'=>array('create')),
	array('label'=>'Manage Ftp', 'url'=>array('admin')),
);
?>

<h1>Ftps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
