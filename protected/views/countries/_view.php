<?php
/* @var $this CountriesController */
/* @var $data Countries */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Country_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Country_ID), array('view', 'id'=>$data->Country_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Code')); ?>:</b>
	<?php echo CHtml::encode($data->Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />


</div>