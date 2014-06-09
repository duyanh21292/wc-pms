<?php
/* @var $this SpectaskController */
/* @var $data Spectask */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('SpecTask_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->SpecTask_ID), array('view', 'id'=>$data->SpecTask_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SpecTask_Name')); ?>:</b>
	<?php echo CHtml::encode($data->SpecTask_Name); ?>
	<br />


</div>