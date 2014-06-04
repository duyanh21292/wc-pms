<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('User_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->User_ID), array('view', 'id'=>$data->User_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EmpNo')); ?>:</b>
	<?php echo CHtml::encode($data->EmpNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Password')); ?>:</b>
	<?php echo CHtml::encode($data->Password); ?>
	<br />


</div>