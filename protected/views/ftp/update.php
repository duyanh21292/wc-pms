<?php
/* @var $this FtpController */
/* @var $model Ftp */

$this->breadcrumbs=array(
	'Ftps'=>array('index'),
	$model->Name=>array('view','id'=>$model->Ftp_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ftp', 'url'=>array('index')),
	array('label'=>'Create Ftp', 'url'=>array('create')),
	array('label'=>'View Ftp', 'url'=>array('view', 'id'=>$model->Ftp_ID)),
	array('label'=>'Manage Ftp', 'url'=>array('admin')),
);
?>

<h1>Update Ftp <?php echo $model->Ftp_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>