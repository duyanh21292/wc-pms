<?php
/* @var $this DeliverymethodController */
/* @var $data Deliverymethod */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('DeliveryMethod_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->DeliveryMethod_ID), array('view', 'id'=>$data->DeliveryMethod_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />


</div>