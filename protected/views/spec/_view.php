<?php
/* @var $this SpecController */
/* @var $data Spec */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Spec_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Spec_ID), array('view', 'id'=>$data->Spec_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProjectNo')); ?>:</b>
	<?php echo CHtml::encode($data->ProjectNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SpecTask_ID')); ?>:</b>
	<?php echo CHtml::encode($data->SpecTask_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fileitem')); ?>:</b>
	<?php echo CHtml::encode($data->Fileitem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Unit_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Unit_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Quantity')); ?>:</b>
	<?php echo CHtml::encode($data->Quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UPrice')); ?>:</b>
	<?php echo CHtml::encode($data->UPrice); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Currency_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Currency_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Memo')); ?>:</b>
	<?php echo CHtml::encode($data->Memo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ExchRate')); ?>:</b>
	<?php echo CHtml::encode($data->ExchRate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Amount')); ?>:</b>
	<?php echo CHtml::encode($data->Amount); ?>
	<br />

	*/ ?>

</div>