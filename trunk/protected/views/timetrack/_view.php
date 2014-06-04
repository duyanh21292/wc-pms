<?php
/* @var $this TimetrackController */
/* @var $data Timetrack */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Timtrack_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Timtrack_ID), array('view', 'id'=>$data->Timtrack_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JobAssign_ID')); ?>:</b>
	<?php echo CHtml::encode($data->JobAssign_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Date')); ?>:</b>
	<?php echo CHtml::encode($data->Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StartTime')); ?>:</b>
	<?php echo CHtml::encode($data->StartTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EndTime')); ?>:</b>
	<?php echo CHtml::encode($data->EndTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Task_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Task_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Activities_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Activities_ID); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Unit')); ?>:</b>
	<?php echo CHtml::encode($data->Unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Quantity')); ?>:</b>
	<?php echo CHtml::encode($data->Quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Comment')); ?>:</b>
	<?php echo CHtml::encode($data->Comment); ?>
	<br />

	*/ ?>

</div>