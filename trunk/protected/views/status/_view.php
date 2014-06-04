<?php
/* @var $this StatusController */
/* @var $data Status */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Status_ID), array('view', 'id'=>$data->Status_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StatusName')); ?>:</b>
	<?php echo CHtml::encode($data->StatusName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status_Type')); ?>:</b>
	<?php echo CHtml::encode($data->Status_Type); ?>
	<br />


</div>