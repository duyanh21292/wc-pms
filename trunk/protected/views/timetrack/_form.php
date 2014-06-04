<?php
/* @var $this TimetrackController */
/* @var $model Timetrack */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'timetrack-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'JobAssign_ID'); ?>
		<?php echo $form->textField($model,'JobAssign_ID'); ?>
		<?php echo $form->error($model,'JobAssign_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Date'); ?>
		<?php echo $form->textField($model,'Date'); ?>
		<?php echo $form->error($model,'Date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'StartTime'); ?>
		<?php echo $form->textField($model,'StartTime'); ?>
		<?php echo $form->error($model,'StartTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EndTime'); ?>
		<?php echo $form->textField($model,'EndTime'); ?>
		<?php echo $form->error($model,'EndTime'); ?>
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
		<?php echo $form->labelEx($model,'Unit'); ?>
		<?php echo $form->textField($model,'Unit',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Quantity'); ?>
		<?php echo $form->textField($model,'Quantity'); ?>
		<?php echo $form->error($model,'Quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Comment'); ?>
		<?php echo $form->textArea($model,'Comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Comment'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->