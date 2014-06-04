<?php
/* @var $this AvailabletaskController */
/* @var $data Availabletask */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ATask_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ATask_ID), array('view', 'id'=>$data->ATask_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />


</div>