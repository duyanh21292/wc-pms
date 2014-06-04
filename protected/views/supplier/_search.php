<?php
/* @var $this SupplierController */
/* @var $model Supplier */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'SupplierNo'); ?>
		<?php echo $form->textField($model,'SupplierNo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SType_ID'); ?>
		<?php echo $form->textField($model,'SType_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Location'); ?>
		<?php echo $form->textField($model,'Location',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Country_ID'); ?>
		<?php echo $form->textField($model,'Country_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RegistrationNo'); ?>
		<?php echo $form->textField($model,'RegistrationNo',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UserID'); ?>
		<?php echo $form->textField($model,'UserID',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Password'); ?>
		<?php echo $form->passwordField($model,'Password',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ZipCode'); ?>
		<?php echo $form->textField($model,'ZipCode',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Address'); ?>
		<?php echo $form->textArea($model,'Address',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tel'); ?>
		<?php echo $form->textField($model,'Tel',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fax'); ?>
		<?php echo $form->textField($model,'Fax',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Mobile'); ?>
		<?php echo $form->textField($model,'Mobile',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email1'); ?>
		<?php echo $form->textField($model,'Email1',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email2'); ?>
		<?php echo $form->textField($model,'Email2',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Website'); ?>
		<?php echo $form->textField($model,'Website',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BankName'); ?>
		<?php echo $form->textArea($model,'BankName',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BranchName'); ?>
		<?php echo $form->textField($model,'BranchName',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BranchAddress'); ?>
		<?php echo $form->textArea($model,'BranchAddress',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BeneficiaryName'); ?>
		<?php echo $form->textField($model,'BeneficiaryName',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AccountNo'); ?>
		<?php echo $form->textField($model,'AccountNo',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SLevel_ID'); ?>
		<?php echo $form->textField($model,'SLevel_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Currency_ID'); ?>
		<?php echo $form->textField($model,'Currency_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Language_Pair_ID'); ?>
		<?php echo $form->textArea($model,'Language_Pair_ID',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ATask_ID'); ?>
		<?php echo $form->textArea($model,'ATask_ID',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MIndustry_ID'); ?>
		<?php echo $form->textArea($model,'MIndustry_ID',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Status'); ?>
		<?php echo $form->textField($model,'Status',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RegDate'); ?>
		<?php echo $form->textField($model,'RegDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ModifyDate'); ?>
		<?php echo $form->textField($model,'ModifyDate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->