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
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required. </p>
	 

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('readonly'=>true)); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'file_ba'); ?>
		<?php echo $form->fileField($model,'ba'); ?>
		<?php echo $form->error($model,'file_ba'); ?>
		<p> Only .doc and .docx files can be uploaded. </p>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'file_ts'); ?>
		<?php echo $form->fileField($model,'ts'); ?>
		<?php echo $form->error($model,'file_ts'); ?>
		<p> Only .doc and .docx files can be uploaded. </p>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_testscenario'); ?>
		<?php echo $form->fileField($model,'file_test'); ?>
		<?php echo $form->error($model,'file_testscenario'); ?>
		<p>Only .doc, .docx, .xls, .xlsx, .zip, and .rar can be uploaded</p>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_brs'); ?>
		<?php echo $form->fileField($model,'brs'); ?>
		<?php echo $form->error($model,'file_brs'); ?>
		<p> Only .doc and .docx files can be uploaded. </p>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_srs'); ?>
		<?php echo $form->fileField($model,'srs'); ?>
		<?php echo $form->error($model,'file_srs'); ?>
		<p> Only .doc and .docx files can be uploaded. </p>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_mom'); ?>
		<?php echo $form->fileField($model,'mom'); ?>
		<?php echo $form->error($model,'file_mom'); ?>
		<p> Only .doc and .docx files can be uploaded. </p>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->