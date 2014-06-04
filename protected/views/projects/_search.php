<?php
/* @var $this ProjectsController */
/* @var $model Projects */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ProjectNo'); ?>
		<?php echo $form->textField($model,'ProjectNo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SaleManagerNo'); ?>
		<?php echo $form->textField($model,'SaleManagerNo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ProjectManagerNo'); ?>
		<?php echo $form->textField($model,'ProjectManagerNo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ProjectName'); ?>
		<?php echo $form->textField($model,'ProjectName',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Password'); ?>
		<?php echo $form->passwordField($model,'Password',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Client_ID'); ?>
		<?php echo $form->textField($model,'Client_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'C_Contact_ID'); ?>
		<?php echo $form->textField($model,'C_Contact_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'C_FContact_ID'); ?>
		<?php echo $form->textField($model,'C_FContact_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'C_PoNo'); ?>
		<?php echo $form->textField($model,'C_PoNo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'C_ProjectNo'); ?>
		<?php echo $form->textField($model,'C_ProjectNo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Budget'); ?>
		<?php echo $form->textField($model,'Budget',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Division_ID'); ?>
		<?php echo $form->textField($model,'Division_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Industry_ID'); ?>
		<?php echo $form->textField($model,'Industry_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Status_ID'); ?>
		<?php echo $form->textField($model,'Status_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FStatus_ID'); ?>
		<?php echo $form->textField($model,'FStatus_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RegDate'); ?>
		<?php echo $form->textField($model,'RegDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DueDate'); ?>
		<?php echo $form->textField($model,'DueDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Balance'); ?>
		<?php echo $form->textField($model,'Balance',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'InternalCost'); ?>
		<?php echo $form->textField($model,'InternalCost',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VATTAX'); ?>
		<?php echo $form->textField($model,'VATTAX',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BuyInsAmount'); ?>
		<?php echo $form->textField($model,'BuyInsAmount',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Amount'); ?>
		<?php echo $form->textField($model,'Amount',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GrossMargin'); ?>
		<?php echo $form->textField($model,'GrossMargin',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Currency_ID'); ?>
		<?php echo $form->textField($model,'Currency_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PoFile'); ?>
		<?php echo $form->textArea($model,'PoFile',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'QuoteFile'); ?>
		<?php echo $form->textArea($model,'QuoteFile',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->