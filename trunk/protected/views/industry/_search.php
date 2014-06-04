<?php
/* @var $this IndustryController */
/* @var $model Industry */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Industry_ID'); ?>
		<?php echo $form->textField($model,'Industry_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IndustryName'); ?>
		<?php echo $form->textField($model,'IndustryName',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->