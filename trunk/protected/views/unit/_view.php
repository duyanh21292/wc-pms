<?php
/* @var $this UnitController */
/* @var $data Unit */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Unit_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Unit_ID), array('view', 'id'=>$data->Unit_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Unit')); ?>:</b>
	<?php echo CHtml::encode($data->Unit); ?>
	<br />


</div>