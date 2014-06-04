<?php
/* @var $this SlevelController */
/* @var $data Slevel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Level_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Level_ID), array('view', 'id'=>$data->Level_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Level_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Level_Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />


</div>