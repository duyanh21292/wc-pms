<?php
/* @var $this JobassignsController */
/* @var $model Jobassigns */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jobassigns-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ProjectNo'); ?>
		<?php echo $form->textField($model,'ProjectNo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ProjectNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EmpNo'); ?>
		<?php echo $form->textField($model,'EmpNo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'EmpNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Task_ID'); ?>
		<?php echo $form->textField($model,'Task_ID'); ?>
		<?php echo $form->error($model,'Task_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Activities_ID'); ?>
		<?php echo $form->textField($model,'Activities_ID'); ?>
		<?php echo $form->error($model,'Activities_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Unit_ID'); ?>
		<?php echo $form->textField($model,'Unit_ID'); ?>
		<?php echo $form->error($model,'Unit_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Quantity'); ?>
		<?php echo $form->textField($model,'Quantity'); ?>
		<?php echo $form->error($model,'Quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'AssignedHour'); ?>
		<?php echo $form->textField($model,'AssignedHour'); ?>
		<?php echo $form->error($model,'AssignedHour'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'StartDate'); ?>
		<?php echo $form->textField($model,'StartDate'); ?>
		<?php echo $form->error($model,'StartDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EndDate'); ?>
		<?php echo $form->textField($model,'EndDate'); ?>
		<?php echo $form->error($model,'EndDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Comment'); ?>
		<?php echo $form->textArea($model,'Comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->textField($model,'Status',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->