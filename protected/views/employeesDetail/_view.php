<?php
/* @var $this EmployeesDetailController */
/* @var $data Employees */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('EmpNo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->EmpNo), array('view', 'id'=>$data->EmpNo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Full_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Full_Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Division_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Division_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Dep_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Dep_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Job_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Job_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Entry_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Entry_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Reg_Number')); ?>:</b>
	<?php echo CHtml::encode($data->Reg_Number); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Mobile')); ?>:</b>
	<?php echo CHtml::encode($data->Mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tel_Home')); ?>:</b>
	<?php echo CHtml::encode($data->Tel_Home); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ext_Number')); ?>:</b>
	<?php echo CHtml::encode($data->Ext_Number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Private_Email')); ?>:</b>
	<?php echo CHtml::encode($data->Private_Email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Address')); ?>:</b>
	<?php echo CHtml::encode($data->Address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Gender')); ?>:</b>
	<?php echo CHtml::encode($data->Gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Birth_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Birth_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Marital_Status')); ?>:</b>
	<?php echo CHtml::encode($data->Marital_Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Education_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Education_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Manager_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Manager_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Role_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Role_ID); ?>
	<br />

	*/ ?>

</div>