<?php
/* @var $this ContactController */
/* @var $model Contact */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Client_ID'); ?>
		<?php echo $form->textField($model,'Client_ID'); ?>
		<?php echo $form->error($model,'Client_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ContactName'); ?>
		<?php echo $form->textField($model,'ContactName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ContactName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Department'); ?>
		<?php echo $form->textField($model,'Department',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Department'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Job'); ?>
		<?php echo $form->textField($model,'Job',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Job'); ?>
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
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SaleMngNo'); ?>
		<?php echo $form->textField($model,'SaleMngNo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'SaleMngNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PrjMngNo'); ?>
		<?php echo $form->textField($model,'PrjMngNo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'PrjMngNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Memo'); ?>
		<?php echo $form->textArea($model,'Memo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Memo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->