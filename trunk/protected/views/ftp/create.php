<?php
/* @var $this FtpController */
/* @var $model Ftp */

$this->breadcrumbs=array(
	'Ftps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ftp', 'url'=>array('index')),
	array('label'=>'Manage Ftp', 'url'=>array('admin')),
);
?>

<h1>Create Ftp</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>