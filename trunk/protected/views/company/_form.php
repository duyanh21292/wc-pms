<?php
/* @var $this CompanyController */
/* @var $model Company */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'company-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CompanyName'); ?>
		<?php echo $form->textField($model,'CompanyName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'CompanyName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Address'); ?>
		<?php echo $form->textArea($model,'Address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Telephone'); ?>
		<?php echo $form->textField($model,'Telephone',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Telephone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Fax'); ?>
		<?php echo $form->textField($model,'Fax',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Fax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Website'); ?>
		<?php echo $form->textField($model,'Website',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Website'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LicenseNo'); ?>
		<?php echo $form->textField($model,'LicenseNo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'LicenseNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TaxCode'); ?>
		<?php echo $form->textField($model,'TaxCode',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'TaxCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BusinessLines'); ?>
		<?php echo $form->textArea($model,'BusinessLines',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'BusinessLines'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RepOffice'); ?>
		<?php echo $form->textField($model,'RepOffice',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'RepOffice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NoInitial'); ?>
		<?php echo $form->textField($model,'NoInitial',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'NoInitial'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->