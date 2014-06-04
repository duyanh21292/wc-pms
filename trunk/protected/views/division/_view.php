<?php
/* @var $this DivisionController */
/* @var $data Division */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Division_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Division_ID), array('view', 'id'=>$data->Division_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DivisionName')); ?>:</b>
	<?php echo CHtml::encode($data->DivisionName); ?>
	<br />


</div>