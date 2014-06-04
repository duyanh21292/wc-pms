<?php
/* @var $this PoController */
/* @var $model Po */

$this->breadcrumbs=array(
	'Pos'=>array('index'),
	$model->PoNo=>array('view','id'=>$model->PoNo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Po', 'url'=>array('index')),
	array('label'=>'Create Po', 'url'=>array('create')),
	array('label'=>'View Po', 'url'=>array('view', 'id'=>$model->PoNo)),
	array('label'=>'Manage Po', 'url'=>array('admin')),
);
?>

<h1>Update Po <?php echo $model->PoNo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>