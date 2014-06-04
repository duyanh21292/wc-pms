<?php
/* @var $this ContactController */
/* @var $data Contact */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Contact_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Contact_ID), array('view', 'id'=>$data->Contact_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Client_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Client_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ContactName')); ?>:</b>
	<?php echo CHtml::encode($data->ContactName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Department')); ?>:</b>
	<?php echo CHtml::encode($data->Department); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Job')); ?>:</b>
	<?php echo CHtml::encode($data->Job); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('SaleMngNo')); ?>:</b>
	<?php echo CHtml::encode($data->SaleMngNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PrjMngNo')); ?>:</b>
	<?php echo CHtml::encode($data->PrjMngNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Memo')); ?>:</b>
	<?php echo CHtml::encode($data->Memo); ?>
	<br />

	*/ ?>

</div>