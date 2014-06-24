<?php
/* @var $this DataController */
/* @var $model Data */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'no'); ?>
		<?php echo $form->textField($model,'no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_br'); ?>
		<?php echo $form->textField($model,'no_br',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cr_number'); ?>
		<?php echo $form->textField($model,'cr_number',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BA'); ?>
		<?php echo $form->textField($model,'BA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TS'); ?>
		<?php echo $form->textField($model,'TS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SRS'); ?>
		<?php echo $form->textField($model,'SRS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BRS'); ?>
		<?php echo $form->textField($model,'BRS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MOM'); ?>
		<?php echo $form->textField($model,'MOM'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reflex'); ?>
		<?php echo $form->textArea($model,'reflex',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'application_name'); ?>
		<?php echo $form->textField($model,'application_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IT_dev_PIC'); ?>
		<?php echo $form->textField($model,'IT_dev_PIC'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'departement_PIC'); ?>
		<?php echo $form->textField($model,'departement_PIC'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IT_testing_PIC'); ?>
		<?php echo $form->textField($model,'IT_testing_PIC'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'request_date'); ?>
		<?php echo $form->textField($model,'request_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'end_date'); ?>
		<?php echo $form->textField($model,'end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'key_achievement'); ?>
		<?php echo $form->textArea($model,'key_achievement',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_status'); ?>
		<?php echo $form->textField($model,'n_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->