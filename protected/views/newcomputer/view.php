<?php
/* @var $this NewcomputerController */
/* @var $model Computer */

$this->breadcrumbs=array(
	'Computers'=>array('index'),
	$model->Comp_ID,
);

$this->menu=array(
	array('label'=>'List Computer', 'url'=>array('index')),
	array('label'=>'Create Computer', 'url'=>array('create')),
	array('label'=>'Update Computer', 'url'=>array('update', 'id'=>$model->Comp_ID)),
	array('label'=>'Delete Computer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Comp_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Computer', 'url'=>array('admin')),
);
?>

<h1>View Computer #<?php echo $model->Comp_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Comp_ID',
		'AssetNumber',
		'CompName',
		'ManagerNo',
		'UserNo',
		'CPU',
		'RAM',
		'MB',
		'Graphic',
		'HDD',
		'CDROM',
		'FDD',
		'Sound',
		'Lan',
		'Display',
		'InternetSettings',
		'ASDetails',
		'OperatingSystemAndOthers',
		'Update',
	),
)); ?>
