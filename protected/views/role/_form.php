<?php
/* @var $this RoleController */
/* @var $model Role */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'role-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Role_ID'); ?>
		<?php echo $form->textField($model,'Role_ID',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Role_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Role_Name'); ?>
		<?php echo $form->textField($model,'Role_Name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Role_Name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->