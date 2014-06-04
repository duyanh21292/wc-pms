<?php
/* @var $this EducationController */
/* @var $data Education */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Education_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Education_ID), array('view', 'id'=>$data->Education_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EducationName')); ?>:</b>
	<?php echo CHtml::encode($data->EducationName); ?>
	<br />


</div>