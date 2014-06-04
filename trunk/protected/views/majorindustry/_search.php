<?php
/* @var $this MajorindustryController */
/* @var $model Majorindustry */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'MIndustry_ID'); ?>
		<?php echo $form->textField($model,'MIndustry_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Name'); ?>
		<?php echo $form->textArea($model,'Name',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Description'); ?>
		<?php echo $form->textArea($model,'Description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->