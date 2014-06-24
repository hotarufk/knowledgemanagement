<?php
/* @var $this DataController */
/* @var $data Data */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('no')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->no), array('view', 'id'=>$data->no)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_br')); ?>:</b>
	<?php echo CHtml::encode($data->no_br); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cr_number')); ?>:</b>
	<?php echo CHtml::encode($data->cr_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BA')); ?>:</b>
	<?php echo CHtml::encode($data->BA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TS')); ?>:</b>
	<?php echo CHtml::encode($data->TS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SRS')); ?>:</b>
	<?php echo CHtml::encode($data->SRS); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('BRS')); ?>:</b>
	<?php echo CHtml::encode($data->BRS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MOM')); ?>:</b>
	<?php echo CHtml::encode($data->MOM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reflex')); ?>:</b>
	<?php echo CHtml::encode($data->reflex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_name')); ?>:</b>
	<?php echo CHtml::encode($data->application_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IT_dev_PIC')); ?>:</b>
	<?php echo CHtml::encode($data->IT_dev_PIC); ?>
	<br />

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

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_status')); ?>:</b>
	<?php echo CHtml::encode($data->n_status); ?>
	<br />

	*/ ?>

</div>