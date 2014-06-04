<?php
/* @var $this FtpController */
/* @var $data Ftp */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ftp_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Ftp_ID), array('view', 'id'=>$data->Ftp_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Client_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Client_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Url')); ?>:</b>
	<?php echo CHtml::encode($data->Url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserName')); ?>:</b>
	<?php echo CHtml::encode($data->UserName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Password')); ?>:</b>
	<?php echo CHtml::encode($data->Password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Memo')); ?>:</b>
	<?php echo CHtml::encode($data->Memo); ?>
	<br />


</div>