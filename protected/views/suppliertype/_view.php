<?php
/* @var $this SuppliertypeController */
/* @var $data Suppliertype */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('SType_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->SType_ID), array('view', 'id'=>$data->SType_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />


</div>