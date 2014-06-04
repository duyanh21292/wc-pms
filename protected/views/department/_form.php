<?php
/* @var $this DepartmentController */
/* @var $model Department */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'department-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'DepName'); ?>
		<?php echo $form->textField($model,'DepName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'DepName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Division_ID'); ?>
		<?php echo $form->textField($model,'Division_ID'); ?>
		<?php echo $form->error($model,'Division_ID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->