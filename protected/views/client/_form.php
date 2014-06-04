<?php
/* @var $this ClientController */
/* @var $model Client */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ClientName'); ?>
		<?php echo $form->textField($model,'ClientName',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'ClientName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Tel'); ?>
		<?php echo $form->textField($model,'Tel',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Tel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Fax'); ?>
		<?php echo $form->textField($model,'Fax',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Fax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ZipCode'); ?>
		<?php echo $form->textField($model,'ZipCode',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ZipCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Address'); ?>
		<?php echo $form->textArea($model,'Address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Url'); ?>
		<?php echo $form->textField($model,'Url',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Location'); ?>
		<?php echo $form->textField($model,'Location',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Country_ID'); ?>
		<?php echo $form->textField($model,'Country_ID'); ?>
		<?php echo $form->error($model,'Country_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'C_Level_ID'); ?>
		<?php echo $form->textField($model,'C_Level_ID'); ?>
		<?php echo $form->error($model,'C_Level_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Memo'); ?>
		<?php echo $form->textArea($model,'Memo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Memo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->textField($model,'Status',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RegDate'); ?>
		<?php echo $form->textField($model,'RegDate'); ?>
		<?php echo $form->error($model,'RegDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ModifyDate'); ?>
		<?php echo $form->textField($model,'ModifyDate'); ?>
		<?php echo $form->error($model,'ModifyDate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->