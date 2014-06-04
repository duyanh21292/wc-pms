<?php
/* @var $this PoController */
/* @var $model Po */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'po-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'PoNo'); ?>
		<?php echo $form->textField($model,'PoNo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'PoNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ProjectNo'); ?>
		<?php echo $form->textField($model,'ProjectNo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ProjectNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SupplierNo'); ?>
		<?php echo $form->textField($model,'SupplierNo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'SupplierNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SContact_ID'); ?>
		<?php echo $form->textField($model,'SContact_ID'); ?>
		<?php echo $form->error($model,'SContact_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Language_Pair_ID'); ?>
		<?php echo $form->textField($model,'Language_Pair_ID'); ?>
		<?php echo $form->error($model,'Language_Pair_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ATask_ID'); ?>
		<?php echo $form->textField($model,'ATask_ID'); ?>
		<?php echo $form->error($model,'ATask_ID'); ?>
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
		<?php echo $form->labelEx($model,'FileItem'); ?>
		<?php echo $form->textField($model,'FileItem',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'FileItem'); ?>
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
		<?php echo $form->labelEx($model,'WorkLoad'); ?>
		<?php echo $form->textField($model,'WorkLoad',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'WorkLoad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DeliveryMethod_ID'); ?>
		<?php echo $form->textField($model,'DeliveryMethod_ID'); ?>
		<?php echo $form->error($model,'DeliveryMethod_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Comments'); ?>
		<?php echo $form->textArea($model,'Comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Amount'); ?>
		<?php echo $form->textField($model,'Amount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Status_ID'); ?>
		<?php echo $form->textField($model,'Status_ID'); ?>
		<?php echo $form->error($model,'Status_ID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->