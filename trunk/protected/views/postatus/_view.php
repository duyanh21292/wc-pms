<?php
/* @var $this PostatusController */
/* @var $data Postatus */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Status_ID), array('view', 'id'=>$data->Status_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />


</div>