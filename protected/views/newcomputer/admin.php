<?php
/* @var $this NewcomputerController */
/* @var $model Computer */

$this->breadcrumbs=array(
	'Computers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Computer', 'url'=>array('index')),
	array('label'=>'Create Computer', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#computer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Computers</h1>

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
	'id'=>'computer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Comp_ID',
		'AssetNumber',
		'CompName',
		'ManagerNo',
		'UserNo',
		'CPU',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
