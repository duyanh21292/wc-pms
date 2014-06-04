<?php
/* @var $this ComputerController */
/* @var $data Computer */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Comp_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Comp_ID), array('view', 'id'=>$data->Comp_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AssetNumber')); ?>:</b>
	<?php echo CHtml::encode($data->AssetNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CompName')); ?>:</b>
	<?php echo CHtml::encode($data->CompName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ManagerNo')); ?>:</b>
	<?php echo CHtml::encode($data->ManagerNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserNo')); ?>:</b>
	<?php echo CHtml::encode($data->UserNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CPU')); ?>:</b>
	<?php echo CHtml::encode($data->CPU); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RAM')); ?>:</b>
	<?php echo CHtml::encode($data->RAM); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('MB')); ?>:</b>
	<?php echo CHtml::encode($data->MB); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Graphic')); ?>:</b>
	<?php echo CHtml::encode($data->Graphic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HDD')); ?>:</b>
	<?php echo CHtml::encode($data->HDD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CDROM')); ?>:</b>
	<?php echo CHtml::encode($data->CDROM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FDD')); ?>:</b>
	<?php echo CHtml::encode($data->FDD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sound')); ?>:</b>
	<?php echo CHtml::encode($data->Sound); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Lan')); ?>:</b>
	<?php echo CHtml::encode($data->Lan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Display')); ?>:</b>
	<?php echo CHtml::encode($data->Display); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('InternetSettings')); ?>:</b>
	<?php echo CHtml::encode($data->InternetSettings); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ASDetails')); ?>:</b>
	<?php echo CHtml::encode($data->ASDetails); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OperatingSystemAndOthers')); ?>:</b>
	<?php echo CHtml::encode($data->OperatingSystemAndOthers); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Update')); ?>:</b>
	<?php echo CHtml::encode($data->Update); ?>
	<br />

	*/ ?>

</div>