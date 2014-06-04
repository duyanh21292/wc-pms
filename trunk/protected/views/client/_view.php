<?php
/* @var $this ClientController */
/* @var $data Client */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Client_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Client_ID), array('view', 'id'=>$data->Client_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ClientName')); ?>:</b>
	<?php echo CHtml::encode($data->ClientName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tel')); ?>:</b>
	<?php echo CHtml::encode($data->Tel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fax')); ?>:</b>
	<?php echo CHtml::encode($data->Fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ZipCode')); ?>:</b>
	<?php echo CHtml::encode($data->ZipCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Address')); ?>:</b>
	<?php echo CHtml::encode($data->Address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Url')); ?>:</b>
	<?php echo CHtml::encode($data->Url); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Location')); ?>:</b>
	<?php echo CHtml::encode($data->Location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Country_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Country_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('C_Level_ID')); ?>:</b>
	<?php echo CHtml::encode($data->C_Level_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Memo')); ?>:</b>
	<?php echo CHtml::encode($data->Memo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RegDate')); ?>:</b>
	<?php echo CHtml::encode($data->RegDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ModifyDate')); ?>:</b>
	<?php echo CHtml::encode($data->ModifyDate); ?>
	<br />

	*/ ?>

</div>