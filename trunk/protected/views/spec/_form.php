<?php
/* @var $this SpecController */
/* @var $model Spec */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'spec-form',
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
		<?php echo $form->labelEx($model,'SpecTask_ID'); ?>
		<?php echo $form->textField($model,'SpecTask_ID'); ?>
		<?php echo $form->error($model,'SpecTask_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Fileitem'); ?>
		<?php echo $form->textField($model,'Fileitem',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Fileitem'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Unit_ID'); ?>
		<?php echo $form->textField($model,'Unit_ID'); ?>
		<?php echo $form->error($model,'Unit_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Quantity'); ?>
		<?php echo $form->textField($model,'Quantity',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UPrice'); ?>
		<?php echo $form->textField($model,'UPrice',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'UPrice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Currency_ID'); ?>
		<?php echo $form->textField($model,'Currency_ID'); ?>
		<?php echo $form->error($model,'Currency_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Memo'); ?>
		<?php echo $form->textArea($model,'Memo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Memo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ExchRate'); ?>
		<?php echo $form->textField($model,'ExchRate'); ?>
		<?php echo $form->error($model,'ExchRate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Amount'); ?>
		<?php echo $form->textField($model,'Amount'); ?>
		<?php echo $form->error($model,'Amount'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->