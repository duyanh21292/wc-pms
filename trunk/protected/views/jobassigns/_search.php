<?php
/* @var $this JobassignsController */
/* @var $model Jobassigns */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'JobAssign_ID'); ?>
		<?php echo $form->textField($model,'JobAssign_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ProjectNo'); ?>
		<?php echo $form->textField($model,'ProjectNo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EmpNo'); ?>
		<?php echo $form->textField($model,'EmpNo',array('size'=>50,'maxlength'=>50)); ?>
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
		<?php echo $form->label($model,'Unit_ID'); ?>
		<?php echo $form->textField($model,'Unit_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Quantity'); ?>
		<?php echo $form->textField($model,'Quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AssignedHour'); ?>
		<?php echo $form->textField($model,'AssignedHour'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'StartDate'); ?>
		<?php echo $form->textField($model,'StartDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EndDate'); ?>
		<?php echo $form->textField($model,'EndDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Comment'); ?>
		<?php echo $form->textArea($model,'Comment',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Status'); ?>
		<?php echo $form->textField($model,'Status',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->