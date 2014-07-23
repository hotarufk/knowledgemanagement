<?php
/* @var $this FileController */
/* @var $model File */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'file-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'project_id'); ?>
		<?php echo $form->textField($model,'project_id'); ?>
		<?php echo $form->error($model,'project_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_ba'); ?>
		<?php echo $form->fileField($model,'file_ba'); ?>
		<?php echo $form->error($model,'file_ba'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_ts'); ?>
		<?php echo $form->fileField($model,'file_ts',array('size'=>60,'maxlength'=>127)); ?>
		<?php echo $form->error($model,'file_ts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_testscenario'); ?>
		<?php echo $form->fileField($model,'file_test'); ?>
		<?php //echo $form->error($model,'file_testscenario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_brs'); ?>
		<?php echo $form->fileField($model,'file_brs',array('size'=>60,'maxlength'=>127)); ?>
		<?php echo $form->error($model,'file_brs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_srs'); ?>
		<?php echo $form->fileField($model,'file_srs',array('size'=>60,'maxlength'=>127)); ?>
		<?php echo $form->error($model,'file_srs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_mom'); ?>
		<?php echo $form->fileField($model,'file_mom',array('size'=>60,'maxlength'=>127)); ?>
		<?php echo $form->error($model,'file_mom'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->