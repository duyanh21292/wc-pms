<?php
/* @var $this IndustryController */
/* @var $data Industry */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Industry_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Industry_ID), array('view', 'id'=>$data->Industry_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IndustryName')); ?>:</b>
	<?php echo CHtml::encode($data->IndustryName); ?>
	<br />


</div>