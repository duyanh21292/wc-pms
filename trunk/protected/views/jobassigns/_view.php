<?php
/* @var $this JobassignsController */
/* @var $data Jobassigns */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('JobAssign_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->JobAssign_ID), array('view', 'id'=>$data->JobAssign_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProjectNo')); ?>:</b>
	<?php echo CHtml::encode($data->ProjectNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EmpNo')); ?>:</b>
	<?php echo CHtml::encode($data->EmpNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Task_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Task_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Activities_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Activities_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Unit_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Unit_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Quantity')); ?>:</b>
	<?php echo CHtml::encode($data->Quantity); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('AssignedHour')); ?>:</b>
	<?php echo CHtml::encode($data->AssignedHour); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StartDate')); ?>:</b>
	<?php echo CHtml::encode($data->StartDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EndDate')); ?>:</b>
	<?php echo CHtml::encode($data->EndDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Comment')); ?>:</b>
	<?php echo CHtml::encode($data->Comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	*/ ?>

</div>