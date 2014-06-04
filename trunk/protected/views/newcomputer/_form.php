<?php
/* @var $this NewcomputerController */
/* @var $model Computer */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'computer-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'AssetNumber'); ?>
		<?php echo $form->textField($model,'AssetNumber',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'AssetNumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CompName'); ?>
		<?php echo $form->textField($model,'CompName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'CompName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ManagerNo'); ?>
		<?php echo $form->textField($model,'ManagerNo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ManagerNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UserNo'); ?>
		<?php echo $form->textField($model,'UserNo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'UserNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CPU'); ?>
		<?php echo $form->textArea($model,'CPU',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'CPU'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RAM'); ?>
		<?php echo $form->textArea($model,'RAM',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'RAM'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MB'); ?>
		<?php echo $form->textArea($model,'MB',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'MB'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Graphic'); ?>
		<?php echo $form->textArea($model,'Graphic',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Graphic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'HDD'); ?>
		<?php echo $form->textArea($model,'HDD',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'HDD'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CDROM'); ?>
		<?php echo $form->textArea($model,'CDROM',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'CDROM'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FDD'); ?>
		<?php echo $form->textArea($model,'FDD',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'FDD'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Sound'); ?>
		<?php echo $form->textArea($model,'Sound',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Sound'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Lan'); ?>
		<?php echo $form->textArea($model,'Lan',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Lan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Display'); ?>
		<?php echo $form->textArea($model,'Display',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Display'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'InternetSettings'); ?>
		<?php echo $form->textArea($model,'InternetSettings',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'InternetSettings'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ASDetails'); ?>
		<?php echo $form->textArea($model,'ASDetails',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ASDetails'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'OperatingSystemAndOthers'); ?>
		<?php echo $form->textArea($model,'OperatingSystemAndOthers',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'OperatingSystemAndOthers'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Update'); ?>
		<?php echo $form->textField($model,'Update'); ?>
		<?php echo $form->error($model,'Update'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->