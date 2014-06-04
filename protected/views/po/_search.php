<?php
/* @var $this PoController */
/* @var $model Po */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'PoNo'); ?>
		<?php echo $form->textField($model,'PoNo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ProjectNo'); ?>
		<?php echo $form->textField($model,'ProjectNo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SupplierNo'); ?>
		<?php echo $form->textField($model,'SupplierNo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SContact_ID'); ?>
		<?php echo $form->textField($model,'SContact_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Language_Pair_ID'); ?>
		<?php echo $form->textField($model,'Language_Pair_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ATask_ID'); ?>
		<?php echo $form->textField($model,'ATask_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Unit_ID'); ?>
		<?php echo $form->textField($model,'Unit_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Quantity'); ?>
		<?php echo $form->textField($model,'Quantity',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UPrice'); ?>
		<?php echo $form->textField($model,'UPrice',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Currency_ID'); ?>
		<?php echo $form->textField($model,'Currency_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FileItem'); ?>
		<?php echo $form->textField($model,'FileItem',array('size'=>60,'maxlength'=>100)); ?>
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
		<?php echo $form->label($model,'WorkLoad'); ?>
		<?php echo $form->textField($model,'WorkLoad',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DeliveryMethod_ID'); ?>
		<?php echo $form->textField($model,'DeliveryMethod_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Comments'); ?>
		<?php echo $form->textArea($model,'Comments',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Amount'); ?>
		<?php echo $form->textField($model,'Amount',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Status_ID'); ?>
		<?php echo $form->textField($model,'Status_ID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->