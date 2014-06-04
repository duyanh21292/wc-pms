<?php
/* @var $this SupplierController */
/* @var $model Supplier */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'supplier-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'SupplierNo'); ?>
		<?php echo $form->textField($model,'SupplierNo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'SupplierNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SType_ID'); ?>
		<?php echo $form->textField($model,'SType_ID'); ?>
		<?php echo $form->error($model,'SType_ID'); ?>
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
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RegistrationNo'); ?>
		<?php echo $form->textField($model,'RegistrationNo',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'RegistrationNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UserID'); ?>
		<?php echo $form->textField($model,'UserID',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'UserID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Password'); ?>
		<?php echo $form->passwordField($model,'Password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Password'); ?>
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
		<?php echo $form->labelEx($model,'Mobile'); ?>
		<?php echo $form->textField($model,'Mobile',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Email1'); ?>
		<?php echo $form->textField($model,'Email1',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Email1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Email2'); ?>
		<?php echo $form->textField($model,'Email2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Email2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Website'); ?>
		<?php echo $form->textField($model,'Website',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Website'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BankName'); ?>
		<?php echo $form->textArea($model,'BankName',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'BankName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BranchName'); ?>
		<?php echo $form->textField($model,'BranchName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'BranchName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BranchAddress'); ?>
		<?php echo $form->textArea($model,'BranchAddress',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'BranchAddress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BeneficiaryName'); ?>
		<?php echo $form->textField($model,'BeneficiaryName',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'BeneficiaryName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'AccountNo'); ?>
		<?php echo $form->textField($model,'AccountNo',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'AccountNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SLevel_ID'); ?>
		<?php echo $form->textField($model,'SLevel_ID'); ?>
		<?php echo $form->error($model,'SLevel_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Currency_ID'); ?>
		<?php echo $form->textField($model,'Currency_ID'); ?>
		<?php echo $form->error($model,'Currency_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Language_Pair_ID'); ?>
		<?php echo $form->textArea($model,'Language_Pair_ID',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Language_Pair_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ATask_ID'); ?>
		<?php echo $form->textArea($model,'ATask_ID',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ATask_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MIndustry_ID'); ?>
		<?php echo $form->textArea($model,'MIndustry_ID',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'MIndustry_ID'); ?>
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