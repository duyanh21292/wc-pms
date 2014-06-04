<?php
/* @var $this JobassignsController */
/* @var $model Jobassigns */

$this->breadcrumbs=array(
	'Jobassigns'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Jobassigns', 'url'=>array('index')),
	array('label'=>'Create Jobassigns', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#jobassigns-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Jobassigns</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'jobassigns-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'JobAssign_ID',
		'ProjectNo',
		'EmpNo',
		'Task_ID',
		'Activities_ID',
		'Unit_ID',
		/*
		'Quantity',
		'AssignedHour',
		'StartDate',
		'EndDate',
		'Comment',
		'Status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
