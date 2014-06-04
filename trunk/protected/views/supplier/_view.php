<?php
/* @var $this SupplierController */
/* @var $data Supplier */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('SupplierNo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->SupplierNo), array('view', 'id'=>$data->SupplierNo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SType_ID')); ?>:</b>
	<?php echo CHtml::encode($data->SType_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Location')); ?>:</b>
	<?php echo CHtml::encode($data->Location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Country_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Country_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RegistrationNo')); ?>:</b>
	<?php echo CHtml::encode($data->RegistrationNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserID')); ?>:</b>
	<?php echo CHtml::encode($data->UserID); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Password')); ?>:</b>
	<?php echo CHtml::encode($data->Password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ZipCode')); ?>:</b>
	<?php echo CHtml::encode($data->ZipCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Address')); ?>:</b>
	<?php echo CHtml::encode($data->Address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tel')); ?>:</b>
	<?php echo CHtml::encode($data->Tel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fax')); ?>:</b>
	<?php echo CHtml::encode($data->Fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Mobile')); ?>:</b>
	<?php echo CHtml::encode($data->Mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email1')); ?>:</b>
	<?php echo CHtml::encode($data->Email1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email2')); ?>:</b>
	<?php echo CHtml::encode($data->Email2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Website')); ?>:</b>
	<?php echo CHtml::encode($data->Website); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BankName')); ?>:</b>
	<?php echo CHtml::encode($data->BankName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BranchName')); ?>:</b>
	<?php echo CHtml::encode($data->BranchName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BranchAddress')); ?>:</b>
	<?php echo CHtml::encode($data->BranchAddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BeneficiaryName')); ?>:</b>
	<?php echo CHtml::encode($data->BeneficiaryName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AccountNo')); ?>:</b>
	<?php echo CHtml::encode($data->AccountNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SLevel_ID')); ?>:</b>
	<?php echo CHtml::encode($data->SLevel_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Currency_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Currency_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Language_Pair_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Language_Pair_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ATask_ID')); ?>:</b>
	<?php echo CHtml::encode($data->ATask_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MIndustry_ID')); ?>:</b>
	<?php echo CHtml::encode($data->MIndustry_ID); ?>
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