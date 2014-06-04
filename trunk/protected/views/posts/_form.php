<?php
/* @var $this PostsController */
/* @var $model Posts */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'posts-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'post_author'); ?>
		<?php echo $form->textField($model,'post_author'); ?>
		<?php echo $form->error($model,'post_author'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_date'); ?>
		<?php echo $form->textField($model,'post_date'); ?>
		<?php echo $form->error($model,'post_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_content'); ?>
		<?php echo $form->textArea($model,'post_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'post_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_title'); ?>
		<?php echo $form->textArea($model,'post_title',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'post_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_modified'); ?>
		<?php echo $form->textField($model,'post_modified'); ?>
		<?php echo $form->error($model,'post_modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_status'); ?>
		<?php echo $form->textField($model,'post_status'); ?>
		<?php echo $form->error($model,'post_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'on_home'); ?>
		<?php echo $form->textField($model,'on_home'); ?>
		<?php echo $form->error($model,'on_home'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id'); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->