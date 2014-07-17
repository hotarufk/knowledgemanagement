<?php
/* @var $this DataController */
/* @var $model Data */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'data-form',
	'stateful'=>true,
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
		<?php echo $form->dropDownList($model,'status',array('1'=>'Pre-Register','2'=>'In Progress','3'=>'Closed-Cancelled','4'=>'Closed-Pending','5'=>'Closed-Finished'), array('options' => array('1'=>array('selected'=>true)))); ?>
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

	<div class="row buttons">
	<?php echo CHtml::submitButton('Next', array(
	'name'=>'page2'
	)); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->