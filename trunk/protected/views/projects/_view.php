<?php
/* @var $this ProjectsController */
/* @var $data Projects */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProjectNo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ProjectNo), array('view', 'id'=>$data->ProjectNo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SaleManagerNo')); ?>:</b>
	<?php echo CHtml::encode($data->SaleManagerNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProjectManagerNo')); ?>:</b>
	<?php echo CHtml::encode($data->ProjectManagerNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProjectName')); ?>:</b>
	<?php echo CHtml::encode($data->ProjectName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Password')); ?>:</b>
	<?php echo CHtml::encode($data->Password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Client_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Client_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('C_Contact_ID')); ?>:</b>
	<?php echo CHtml::encode($data->C_Contact_ID); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('C_FContact_ID')); ?>:</b>
	<?php echo CHtml::encode($data->C_FContact_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('C_PoNo')); ?>:</b>
	<?php echo CHtml::encode($data->C_PoNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('C_ProjectNo')); ?>:</b>
	<?php echo CHtml::encode($data->C_ProjectNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Budget')); ?>:</b>
	<?php echo CHtml::encode($data->Budget); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Division_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Division_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Industry_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Industry_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Status_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FStatus_ID')); ?>:</b>
	<?php echo CHtml::encode($data->FStatus_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RegDate')); ?>:</b>
	<?php echo CHtml::encode($data->RegDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DueDate')); ?>:</b>
	<?php echo CHtml::encode($data->DueDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Balance')); ?>:</b>
	<?php echo CHtml::encode($data->Balance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('InternalCost')); ?>:</b>
	<?php echo CHtml::encode($data->InternalCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VATTAX')); ?>:</b>
	<?php echo CHtml::encode($data->VATTAX); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BuyInsAmount')); ?>:</b>
	<?php echo CHtml::encode($data->BuyInsAmount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Amount')); ?>:</b>
	<?php echo CHtml::encode($data->Amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GrossMargin')); ?>:</b>
	<?php echo CHtml::encode($data->GrossMargin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Currency_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Currency_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PoFile')); ?>:</b>
	<?php echo CHtml::encode($data->PoFile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('QuoteFile')); ?>:</b>
	<?php echo CHtml::encode($data->QuoteFile); ?>
	<br />

	*/ ?>

</div>