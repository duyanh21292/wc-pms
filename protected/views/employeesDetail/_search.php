<?php
/* @var $this EmployeesDetailController */
/* @var $model Employees */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'EmpNo'); ?>
		<?php echo $form->textField($model,'EmpNo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Full_Name'); ?>
		<?php echo $form->textField($model,'Full_Name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Division_ID'); ?>
		<?php echo $form->textField($model,'Division_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Dep_ID'); ?>
		<?php echo $form->textField($model,'Dep_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Job_ID'); ?>
		<?php echo $form->textField($model,'Job_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Entry_Date'); ?>
		<?php echo $form->textField($model,'Entry_Date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Reg_Number'); ?>
		<?php echo $form->textField($model,'Reg_Number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Mobile'); ?>
		<?php echo $form->textField($model,'Mobile',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tel_Home'); ?>
		<?php echo $form->textField($model,'Tel_Home',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ext_Number'); ?>
		<?php echo $form->textField($model,'Ext_Number',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Private_Email'); ?>
		<?php echo $form->textField($model,'Private_Email',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Address'); ?>
		<?php echo $form->textField($model,'Address',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Gender'); ?>
		<?php echo $form->textField($model,'Gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Birth_Date'); ?>
		<?php echo $form->textField($model,'Birth_Date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Marital_Status'); ?>
		<?php echo $form->textField($model,'Marital_Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Education_ID'); ?>
		<?php echo $form->textField($model,'Education_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Manager_ID'); ?>
		<?php echo $form->textField($model,'Manager_ID',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Role_ID'); ?>
		<?php echo $form->textField($model,'Role_ID',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->