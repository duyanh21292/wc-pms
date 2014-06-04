<?php
/* @var $this EmployeesController */
/* @var $model Employees */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employees-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'EmpNo'); ?>
		<?php echo $form->textField($model,'EmpNo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'EmpNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Full_Name'); ?>
		<?php echo $form->textField($model,'Full_Name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Full_Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Division_ID'); ?>
		<?php echo $form->textField($model,'Division_ID'); ?>
		<?php echo $form->error($model,'Division_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Dep_ID'); ?>
		<?php echo $form->textField($model,'Dep_ID'); ?>
		<?php echo $form->error($model,'Dep_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Job_ID'); ?>
		<?php echo $form->textField($model,'Job_ID'); ?>
		<?php echo $form->error($model,'Job_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Entry_Date'); ?>
		<?php echo $form->textField($model,'Entry_Date'); ?>
		<?php echo $form->error($model,'Entry_Date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Reg_Number'); ?>
		<?php echo $form->textField($model,'Reg_Number'); ?>
		<?php echo $form->error($model,'Reg_Number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Mobile'); ?>
		<?php echo $form->textField($model,'Mobile',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'Mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Tel_Home'); ?>
		<?php echo $form->textField($model,'Tel_Home',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'Tel_Home'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Ext_Number'); ?>
		<?php echo $form->textField($model,'Ext_Number',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'Ext_Number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Private_Email'); ?>
		<?php echo $form->textField($model,'Private_Email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Private_Email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Address'); ?>
		<?php echo $form->textField($model,'Address',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Gender'); ?>
		<?php echo $form->textField($model,'Gender'); ?>
		<?php echo $form->error($model,'Gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Birth_Date'); ?>
		<?php echo $form->textField($model,'Birth_Date'); ?>
		<?php echo $form->error($model,'Birth_Date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Marital_Status'); ?>
		<?php echo $form->textField($model,'Marital_Status'); ?>
		<?php echo $form->error($model,'Marital_Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Education_ID'); ?>
		<?php echo $form->textField($model,'Education_ID'); ?>
		<?php echo $form->error($model,'Education_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Manager_ID'); ?>
		<?php echo $form->textField($model,'Manager_ID',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Manager_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Role_ID'); ?>
		<?php echo $form->textField($model,'Role_ID',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Role_ID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->