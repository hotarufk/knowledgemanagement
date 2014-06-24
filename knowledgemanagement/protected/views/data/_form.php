<?php
/* @var $this DataController */
/* @var $model Data */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'data-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'no_br'); ?>
		<?php echo $form->textField($model,'no_br',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'no_br'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cr_number'); ?>
		<?php echo $form->textField($model,'cr_number',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'cr_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BA'); ?>
		<?php echo $form->textField($model,'BA'); ?>
		<?php echo $form->error($model,'BA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TS'); ?>
		<?php echo $form->textField($model,'TS'); ?>
		<?php echo $form->error($model,'TS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SRS'); ?>
		<?php echo $form->textField($model,'SRS'); ?>
		<?php echo $form->error($model,'SRS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BRS'); ?>
		<?php echo $form->textField($model,'BRS'); ?>
		<?php echo $form->error($model,'BRS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MOM'); ?>
		<?php echo $form->textField($model,'MOM'); ?>
		<?php echo $form->error($model,'MOM'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reflex'); ?>
		<?php echo $form->textArea($model,'reflex',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'reflex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'application_name'); ?>
		<?php echo $form->textField($model,'application_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'application_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IT_dev_PIC'); ?>
		<?php echo $form->textField($model,'IT_dev_PIC'); ?>
		<?php echo $form->error($model,'IT_dev_PIC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'departement_PIC'); ?>
		<?php echo $form->textField($model,'departement_PIC'); ?>
		<?php echo $form->error($model,'departement_PIC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IT_testing_PIC'); ?>
		<?php echo $form->textField($model,'IT_testing_PIC'); ?>
		<?php echo $form->error($model,'IT_testing_PIC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'request_date'); ?>
		<?php echo $form->textField($model,'request_date'); ?>
		<?php echo $form->error($model,'request_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date'); ?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_date'); ?>
		<?php echo $form->textField($model,'end_date'); ?>
		<?php echo $form->error($model,'end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'key_achievement'); ?>
		<?php echo $form->textArea($model,'key_achievement',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'key_achievement'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_status'); ?>
		<?php echo $form->textField($model,'n_status'); ?>
		<?php echo $form->error($model,'n_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->