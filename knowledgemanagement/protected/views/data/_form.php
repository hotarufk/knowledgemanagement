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
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
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
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'user');?>
		<?php echo $form->error($model,'user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'departement_PIC'); ?>
		<?php echo $form->textArea($model,'departement_PIC',array('rows'=>6, 'cols'=>50)); ?>
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
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'start_date',
			'options' => array(

				'dateFormat' => 'yy-mm-dd',     // format of "2012-12-25"
				'showOtherMonths' => true,      // show dates in other months
				'selectOtherMonths' => true,    // can seelect dates in other months
				'changeYear' => true,           // can change year
				'changeMonth' => true,          // can change month
				'yearRange' => '2000:2099',     // range of year
				'minDate' => '2000-01-01',      // minimum date
				'maxDate' => '2099-12-31',      // maximum date

			),
			'htmlOptions' => array(
				'size' => '10',         // textField size
				'maxlength' => '10',    // textField maxlength
			),
		));
		?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_date'); ?>
		<?php echo $form->textField($model,'end_date'); ?>
		<?php echo $form->error($model,'end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'key_achievement'); ?>
		<?php echo $form->textField($model,'key_achievement'); ?>
		<?php echo $form->error($model,'key_achievement'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'month_of_register'); ?>
		<?php echo $form->textField($model,'month_of_register'); ?>
		<?php echo $form->error($model,'month_of_register'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->