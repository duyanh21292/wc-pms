<?php
/* @var $this SuppliercontactController */
/* @var $data Suppliercontact */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Contact_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Contact_ID), array('view', 'id'=>$data->Contact_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SupplierNo')); ?>:</b>
	<?php echo CHtml::encode($data->SupplierNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Department')); ?>:</b>
	<?php echo CHtml::encode($data->Department); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JobTitle')); ?>:</b>
	<?php echo CHtml::encode($data->JobTitle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tel')); ?>:</b>
	<?php echo CHtml::encode($data->Tel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fax')); ?>:</b>
	<?php echo CHtml::encode($data->Fax); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Mobile')); ?>:</b>
	<?php echo CHtml::encode($data->Mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Memo')); ?>:</b>
	<?php echo CHtml::encode($data->Memo); ?>
	<br />

	*/ ?>

</div>