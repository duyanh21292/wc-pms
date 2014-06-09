<?php
/* @var $this SpecController */
/* @var $model Spec */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Spec_ID'); ?>
		<?php echo $form->textField($model,'Spec_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ProjectNo'); ?>
		<?php echo $form->textField($model,'ProjectNo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SpecTask_ID'); ?>
		<?php echo $form->textField($model,'SpecTask_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fileitem'); ?>
		<?php echo $form->textField($model,'Fileitem',array('size'=>50,'maxlength'=>50)); ?>
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
		<?php echo $form->label($model,'Memo'); ?>
		<?php echo $form->textArea($model,'Memo',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ExchRate'); ?>
		<?php echo $form->textField($model,'ExchRate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Amount'); ?>
		<?php echo $form->textField($model,'Amount'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->