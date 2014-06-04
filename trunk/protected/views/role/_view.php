<?php
/* @var $this RoleController */
/* @var $data Role */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Role_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Role_ID), array('view', 'id'=>$data->Role_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Role_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Role_Name); ?>
	<br />


</div>