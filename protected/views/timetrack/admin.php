<?php
/* @var $this TimetrackController */
/* @var $model Timetrack */

$this->breadcrumbs=array(
	'Timetracks'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Timetrack', 'url'=>array('index')),
	array('label'=>'Create Timetrack', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#timetrack-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Timetracks</h1>

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
	'id'=>'timetrack-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Timtrack_ID',
		'JobAssign_ID',
		'Date',
		'StartTime',
		'EndTime',
		'Task_ID',
		/*
		'Activities_ID',
		'Unit',
		'Quantity',
		'Comment',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
