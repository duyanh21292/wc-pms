<?php
/* @var $this ProjectsController */
/* @var $model Projects */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Projects', 'url'=>array('index')),
	array('label'=>'Create Projects', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#projects-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Projects</h1>

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
	'id'=>'projects-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ProjectNo',
		'SaleManagerNo',
		'ProjectManagerNo',
		'ProjectName',
		'Password',
		'Client_ID',
		/*
		'C_Contact_ID',
		'C_FContact_ID',
		'C_PoNo',
		'C_ProjectNo',
		'Budget',
		'Division_ID',
		'Industry_ID',
		'Status_ID',
		'FStatus_ID',
		'RegDate',
		'DueDate',
		'Balance',
		'InternalCost',
		'VATTAX',
		'BuyInsAmount',
		'Amount',
		'GrossMargin',
		'Currency_ID',
		'PoFile',
		'QuoteFile',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
