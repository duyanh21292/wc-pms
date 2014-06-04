<?php
/* @var $this ActivitiesController */
/* @var $model Activities */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'activities-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ActivitiesName'); ?>
		<?php echo $form->textField($model,'ActivitiesName',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'ActivitiesName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Task_ID'); ?>
		<?php echo $form->textField($model,'Task_ID'); ?>
		<?php echo $form->error($model,'Task_ID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->