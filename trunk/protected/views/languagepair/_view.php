<?php
/* @var $this LanguagepairController */
/* @var $data Languagepair */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Language_Pair_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Language_Pair_ID), array('view', 'id'=>$data->Language_Pair_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FromLang')); ?>:</b>
	<?php echo CHtml::encode($data->FromLang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ToLang')); ?>:</b>
	<?php echo CHtml::encode($data->ToLang); ?>
	<br />


</div>