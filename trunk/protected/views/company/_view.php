<?php
/* @var $this CompanyController */
/* @var $data Company */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CompanyName')); ?>:</b>
	<?php echo CHtml::encode($data->CompanyName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Address')); ?>:</b>
	<?php echo CHtml::encode($data->Address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Telephone')); ?>:</b>
	<?php echo CHtml::encode($data->Telephone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fax')); ?>:</b>
	<?php echo CHtml::encode($data->Fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Website')); ?>:</b>
	<?php echo CHtml::encode($data->Website); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LicenseNo')); ?>:</b>
	<?php echo CHtml::encode($data->LicenseNo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('TaxCode')); ?>:</b>
	<?php echo CHtml::encode($data->TaxCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BusinessLines')); ?>:</b>
	<?php echo CHtml::encode($data->BusinessLines); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RepOffice')); ?>:</b>
	<?php echo CHtml::encode($data->RepOffice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NoInitial')); ?>:</b>
	<?php echo CHtml::encode($data->NoInitial); ?>
	<br />

	*/ ?>

</div>