<?php
/* @var $this MajorindustryController */
/* @var $data Majorindustry */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('MIndustry_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->MIndustry_ID), array('view', 'id'=>$data->MIndustry_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />


</div>