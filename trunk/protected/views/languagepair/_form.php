<?php
/* @var $this LanguagepairController */
/* @var $model Languagepair */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'languagepair-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FromLang'); ?>
		<?php echo $form->textField($model,'FromLang',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'FromLang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ToLang'); ?>
		<?php echo $form->textField($model,'ToLang',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ToLang'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->