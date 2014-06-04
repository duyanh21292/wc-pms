<?php
/* @var $this ActivitiesController */
/* @var $model Activities */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Activities_ID'); ?>
		<?php echo $form->textField($model,'Activities_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ActivitiesName'); ?>
		<?php echo $form->textField($model,'ActivitiesName',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Task_ID'); ?>
		<?php echo $form->textField($model,'Task_ID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->