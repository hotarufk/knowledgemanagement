<?php
/* @var $this DataController */
/* @var $data Data */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_br')); ?>:</b>
	<?php echo CHtml::encode($data->no_br); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cr_number')); ?>:</b>
	<?php echo CHtml::encode($data->cr_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->StatusText($data->status)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reflex')); ?>:</b>
	<?php echo CHtml::encode($data->reflex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_name')); ?>:</b>
	<?php echo CHtml::encode($data->application_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user')); ?>:</b>
	<?php echo CHtml::encode($data->user0->nama); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('departement_PIC')); ?>:</b>
	<?php echo CHtml::encode($data->departement_PIC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IT_testing_PIC')); ?>:</b>
	<?php echo CHtml::encode($data->IT_testing_PIC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_date')); ?>:</b>
	<?php echo CHtml::encode($data->request_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_date')); ?>:</b>
	<?php echo CHtml::encode($data->end_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('key_achievement')); ?>:</b>
	<?php echo CHtml::encode($data->key_achievement); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('month_of_register')); ?>:</b>
	<?php echo CHtml::encode($data->month_of_register); ?>
	<br />

	*/ ?>

</div>