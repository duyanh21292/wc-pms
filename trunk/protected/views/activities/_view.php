<?php
/* @var $this ActivitiesController */
/* @var $data Activities */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Activities_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Activities_ID), array('view', 'id'=>$data->Activities_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ActivitiesName')); ?>:</b>
	<?php echo CHtml::encode($data->ActivitiesName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Task_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Task_ID); ?>
	<br />


</div>