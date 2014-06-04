<?php
/* @var $this CurrencyController */
/* @var $model Currency */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'currency-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CurrencyNo'); ?>
		<?php echo $form->textField($model,'CurrencyNo',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'CurrencyNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ExchangeVND'); ?>
		<?php echo $form->textField($model,'ExchangeVND',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ExchangeVND'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'AppliedDate'); ?>
		<?php echo $form->textField($model,'AppliedDate'); ?>
		<?php echo $form->error($model,'AppliedDate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->