<?php
/* @var $this TaskController */
/* @var $data Task */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Task_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Task_ID), array('view', 'id'=>$data->Task_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TaskName')); ?>:</b>
	<?php echo CHtml::encode($data->TaskName); ?>
	<br />


</div>