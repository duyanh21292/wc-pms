<?php
/* @var $this DepartmentController */
/* @var $data Department */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Dep_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Dep_ID), array('view', 'id'=>$data->Dep_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DepName')); ?>:</b>
	<?php echo CHtml::encode($data->DepName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Division_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Division_ID); ?>
	<br />


</div>