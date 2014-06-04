<?php
/* @var $this PoController */
/* @var $data Po */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('PoNo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PoNo), array('view', 'id'=>$data->PoNo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProjectNo')); ?>:</b>
	<?php echo CHtml::encode($data->ProjectNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SupplierNo')); ?>:</b>
	<?php echo CHtml::encode($data->SupplierNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SContact_ID')); ?>:</b>
	<?php echo CHtml::encode($data->SContact_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Language_Pair_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Language_Pair_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ATask_ID')); ?>:</b>
	<?php echo CHtml::encode($data->ATask_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Unit_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Unit_ID); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Quantity')); ?>:</b>
	<?php echo CHtml::encode($data->Quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UPrice')); ?>:</b>
	<?php echo CHtml::encode($data->UPrice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Currency_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Currency_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FileItem')); ?>:</b>
	<?php echo CHtml::encode($data->FileItem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RegDate')); ?>:</b>
	<?php echo CHtml::encode($data->RegDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DueDate')); ?>:</b>
	<?php echo CHtml::encode($data->DueDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('WorkLoad')); ?>:</b>
	<?php echo CHtml::encode($data->WorkLoad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DeliveryMethod_ID')); ?>:</b>
	<?php echo CHtml::encode($data->DeliveryMethod_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Comments')); ?>:</b>
	<?php echo CHtml::encode($data->Comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Amount')); ?>:</b>
	<?php echo CHtml::encode($data->Amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Status_ID); ?>
	<br />

	*/ ?>

</div>