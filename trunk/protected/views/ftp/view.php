<?php
/* @var $this FtpController */
/* @var $model Ftp */

$this->breadcrumbs=array(
	'Ftps'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List Ftp', 'url'=>array('index')),
	array('label'=>'Create Ftp', 'url'=>array('create')),
	array('label'=>'Update Ftp', 'url'=>array('update', 'id'=>$model->Ftp_ID)),
	array('label'=>'Delete Ftp', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Ftp_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ftp', 'url'=>array('admin')),
);
?>

<h1>View Ftp #<?php echo $model->Ftp_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Ftp_ID',
		'Client_ID',
		'Name',
		'Url',
		'UserName',
		'Password',
		'Memo',
	),
)); ?>
