<?php
/* @var $this TimetrackController */
/* @var $model Timetrack */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Timtrack_ID'); ?>
		<?php echo $form->textField($model,'Timtrack_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'JobAssign_ID'); ?>
		<?php echo $form->textField($model,'JobAssign_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Date'); ?>
		<?php echo $form->textField($model,'Date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'StartTime'); ?>
		<?php echo $form->textField($model,'StartTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EndTime'); ?>
		<?php echo $form->textField($model,'EndTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Task_ID'); ?>
		<?php echo $form->textField($model,'Task_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Activities_ID'); ?>
		<?php echo $form->textField($model,'Activities_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Unit'); ?>
		<?php echo $form->textField($model,'Unit',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Quantity'); ?>
		<?php echo $form->textField($model,'Quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Comment'); ?>
		<?php echo $form->textArea($model,'Comment',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->