<?php
/* @var $this ProjectsController */
/* @var $model Projects */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'projects-form',
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
		<?php echo $form->labelEx($model,'SaleManagerNo'); ?>
		<?php echo $form->textField($model,'SaleManagerNo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'SaleManagerNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ProjectManagerNo'); ?>
		<?php echo $form->textField($model,'ProjectManagerNo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ProjectManagerNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ProjectName'); ?>
		<?php echo $form->textField($model,'ProjectName',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'ProjectName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Password'); ?>
		<?php echo $form->passwordField($model,'Password',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Client_ID'); ?>
		<?php echo $form->textField($model,'Client_ID'); ?>
		<?php echo $form->error($model,'Client_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'C_Contact_ID'); ?>
		<?php echo $form->textField($model,'C_Contact_ID'); ?>
		<?php echo $form->error($model,'C_Contact_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'C_FContact_ID'); ?>
		<?php echo $form->textField($model,'C_FContact_ID'); ?>
		<?php echo $form->error($model,'C_FContact_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'C_PoNo'); ?>
		<?php echo $form->textField($model,'C_PoNo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'C_PoNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'C_ProjectNo'); ?>
		<?php echo $form->textField($model,'C_ProjectNo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'C_ProjectNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Budget'); ?>
		<?php echo $form->textField($model,'Budget',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Budget'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Division_ID'); ?>
		<?php echo $form->textField($model,'Division_ID'); ?>
		<?php echo $form->error($model,'Division_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Industry_ID'); ?>
		<?php echo $form->textField($model,'Industry_ID'); ?>
		<?php echo $form->error($model,'Industry_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Status_ID'); ?>
		<?php echo $form->textField($model,'Status_ID'); ?>
		<?php echo $form->error($model,'Status_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FStatus_ID'); ?>
		<?php echo $form->textField($model,'FStatus_ID'); ?>
		<?php echo $form->error($model,'FStatus_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RegDate'); ?>
		<?php echo $form->textField($model,'RegDate'); ?>
		<?php echo $form->error($model,'RegDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DueDate'); ?>
		<?php echo $form->textField($model,'DueDate'); ?>
		<?php echo $form->error($model,'DueDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Balance'); ?>
		<?php echo $form->textField($model,'Balance',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Balance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'InternalCost'); ?>
		<?php echo $form->textField($model,'InternalCost',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'InternalCost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'VATTAX'); ?>
		<?php echo $form->textField($model,'VATTAX',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'VATTAX'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BuyInsAmount'); ?>
		<?php echo $form->textField($model,'BuyInsAmount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'BuyInsAmount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Amount'); ?>
		<?php echo $form->textField($model,'Amount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'GrossMargin'); ?>
		<?php echo $form->textField($model,'GrossMargin',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'GrossMargin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Currency_ID'); ?>
		<?php echo $form->textField($model,'Currency_ID'); ?>
		<?php echo $form->error($model,'Currency_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PoFile'); ?>
		<?php echo $form->textArea($model,'PoFile',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'PoFile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'QuoteFile'); ?>
		<?php echo $form->textArea($model,'QuoteFile',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'QuoteFile'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->