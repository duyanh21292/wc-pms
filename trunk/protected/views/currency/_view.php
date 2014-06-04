<?php
/* @var $this CurrencyController */
/* @var $data Currency */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Currency_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Currency_ID), array('view', 'id'=>$data->Currency_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CurrencyNo')); ?>:</b>
	<?php echo CHtml::encode($data->CurrencyNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ExchangeVND')); ?>:</b>
	<?php echo CHtml::encode($data->ExchangeVND); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AppliedDate')); ?>:</b>
	<?php echo CHtml::encode($data->AppliedDate); ?>
	<br />


</div>