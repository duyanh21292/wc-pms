<?php
/* @var $this ComputerController */
/* @var $model Computer */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Comp_ID'); ?>
		<?php echo $form->textField($model,'Comp_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AssetNumber'); ?>
		<?php echo $form->textField($model,'AssetNumber',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CompName'); ?>
		<?php echo $form->textField($model,'CompName',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ManagerNo'); ?>
		<?php echo $form->textField($model,'ManagerNo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UserNo'); ?>
		<?php echo $form->textField($model,'UserNo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CPU'); ?>
		<?php echo $form->textArea($model,'CPU',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RAM'); ?>
		<?php echo $form->textArea($model,'RAM',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MB'); ?>
		<?php echo $form->textArea($model,'MB',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Graphic'); ?>
		<?php echo $form->textArea($model,'Graphic',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HDD'); ?>
		<?php echo $form->textArea($model,'HDD',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CDROM'); ?>
		<?php echo $form->textArea($model,'CDROM',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FDD'); ?>
		<?php echo $form->textArea($model,'FDD',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sound'); ?>
		<?php echo $form->textArea($model,'Sound',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Lan'); ?>
		<?php echo $form->textArea($model,'Lan',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Display'); ?>
		<?php echo $form->textArea($model,'Display',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'InternetSettings'); ?>
		<?php echo $form->textArea($model,'InternetSettings',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ASDetails'); ?>
		<?php echo $form->textArea($model,'ASDetails',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'OperatingSystemAndOthers'); ?>
		<?php echo $form->textArea($model,'OperatingSystemAndOthers',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Update'); ?>
		<?php echo $form->textField($model,'Update'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->