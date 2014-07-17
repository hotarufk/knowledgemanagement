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
		<?php echo $form->labelEx($model,'IT_testing_PIC'); ?>
		<?php echo $form->dropDownList($model,'user', CHtml::listData(User::model()->findAll(), 'id', 'username'), array('empty'=>'select Type')); ?>
		<?php echo $form->error($model,'user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'departement_PIC'); ?>
		<?php echo $form->textArea($model,'departement_PIC',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'departement_PIC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IT_testing_PIC'); ?>
		<?php echo $form->dropDownList($model,'IT_testing_PIC',array('1'=>'I GP Witraguna','2'=>'Setiawan','3'=>'Sofie Y Chaerang','4'=>'Tulus Hamdani'), array('options' => array('1'=>array('selected'=>true)))); ?>
		<?php echo $form->error($model,'IT_testing_PIC'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'key_achievement'); ?>
		<?php echo $form->dropDownList($model,'key_achievement',array('0'=>'not Achieved','1'=>'Achieved'), array('options' => array('0'=>array('selected'=>true)))); ?>
		<?php echo $form->error($model,'key_achievement'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton('back', array(
		'name'=>'page1'
		)); ?>
		<?php echo CHtml::submitButton('Next', array(
		'name'=>'page3'
		)); ?>
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->