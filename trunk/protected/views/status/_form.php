<?php
/* @var $this StatusController */
/* @var $model Status */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'status-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'StatusName'); ?>
		<?php echo $form->textField($model,'StatusName',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'StatusName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Status_Type'); ?>
		<?php echo $form->textField($model,'Status_Type',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Status_Type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->