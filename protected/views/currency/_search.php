<?php
/* @var $this CurrencyController */
/* @var $model Currency */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Currency_ID'); ?>
		<?php echo $form->textField($model,'Currency_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CurrencyNo'); ?>
		<?php echo $form->textField($model,'CurrencyNo',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ExchangeVND'); ?>
		<?php echo $form->textField($model,'ExchangeVND',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AppliedDate'); ?>
		<?php echo $form->textField($model,'AppliedDate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->