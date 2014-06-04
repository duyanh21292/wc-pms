<?php
/* @var $this TimetrackController */
/* @var $model Timetrack */

$this->breadcrumbs=array(
	'Timetracks'=>array('index'),
	$model->Timtrack_ID=>array('view','id'=>$model->Timtrack_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Timetrack', 'url'=>array('index')),
	array('label'=>'Create Timetrack', 'url'=>array('create')),
	array('label'=>'View Timetrack', 'url'=>array('view', 'id'=>$model->Timtrack_ID)),
	array('label'=>'Manage Timetrack', 'url'=>array('admin')),
);
?>

<h1>Update Timetrack <?php echo $model->Timtrack_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>