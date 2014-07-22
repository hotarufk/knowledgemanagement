<?php
/* @var $this FileController */
/* @var $data File */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_id')); ?>:</b>
	<?php echo CHtml::encode($data->project_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_ba')); ?>:</b>
	<?php echo CHtml::encode($data->file_ba); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_ts')); ?>:</b>
	<?php echo CHtml::encode($data->file_ts); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_testscenario')); ?>:</b>
	<?php echo CHtml::encode($data->file_testscenario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_brs')); ?>:</b>
	<?php echo CHtml::encode($data->file_brs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_srs')); ?>:</b>
	<?php echo CHtml::encode($data->file_srs); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('file_mom')); ?>:</b>
	<?php echo CHtml::encode($data->file_mom); ?>
	<br />

	*/ ?>

</div>