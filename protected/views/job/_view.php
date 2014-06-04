<?php
/* @var $this JobController */
/* @var $data Job */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Job_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Job_ID), array('view', 'id'=>$data->Job_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JobName')); ?>:</b>
	<?php echo CHtml::encode($data->JobName); ?>
	<br />


</div>