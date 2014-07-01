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

	<div class="row">
		<?php echo $form->labelEx($model,'user'); ?>
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
		<?php echo $form->dropDownList($model,'IT_testing_PIC',array('1'=>'I GP Witraguna','2'=>'Setiawan','3'=>'Sofie Y chaerang','4'=>'Tulus Hamdani'), array('options' => array('1'=>array('selected'=>true)))); ?>
		<?php echo $form->error($model,'IT_testing_PIC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'request_date'); ?>
		<?php 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'request_date',
			'options' => array(
				'showOn' => 'both',             // also opens with a button
				'dateFormat' => 'yy-mm-dd',     // format of "2012-12-25"
				'showOtherMonths' => true,      // show dates in other months
				'changeYear' => true,           // can change year
				'changeMonth' => true,          // can change month
				'yearRange' => '2000:2099',     // range of year
				'minDate' => '2000-01-01',      // minimum date
				'maxDate' => '2099-12-31',      // maximum date
				'showButtonPanel' => true,      // show button panel
			),
			'htmlOptions' => array(
				'size' => '10',
				'maxlength' => '10',
			),
		)); 
		?>
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
				'changeYear' => true,           // can change year
				'changeMonth' => true,          // can change month
				'yearRange' => '2000:2099',     // range of year
				'minDate' => '2000-01-01',      // minimum date
				'maxDate' => '2099-12-31',      // maximum date
			),
			'htmlOptions' => array(
				'size' => '10',
				'maxlength' => '10',
			),
		)); 
		?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_date'); ?>
		<?php 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'end_date',
			'options' => array(
				'dateFormat' => 'yy-mm-dd',     // format of "2012-12-25"
				'showOtherMonths' => true,      // show dates in other months
				'changeYear' => true,           // can change year
				'changeMonth' => true,          // can change month
				'yearRange' => '2000:2099',     // range of year
				'minDate' => '2000-01-01',      // minimum date
				'maxDate' => '2099-12-31',      // maximum date
			),
			'htmlOptions' => array(
				'size' => '10',
				'maxlength' => '10',
			),
		)); 
		?>
		<?php echo $form->error($model,'end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'key_achievement'); ?>
		<?php echo $form->dropDownList($model,'key_achievement',array('0'=>'not Achieved','1'=>'Achieved'), array('options' => array('0'=>array('selected'=>true)))); ?>
		<?php echo $form->error($model,'key_achievement'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'month_of_register'); ?>
		<?php 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'month_of_register',
			'themeUrl' => Yii::app()->baseUrl . '/css/jui',
			'theme' => 'softark',
			'cssFile' => 'jquery-ui-1.9.2.custom.css',
			'options' => array(
				'dateFormat' => 'yy-mm-dd',     // format of "2012-12-25"
				'showOtherMonths' => true,      // show dates in other months
				'changeYear' => true,           // can change year
				'changeMonth' => true,          // can change month
				'yearRange' => '2000:2099',     // range of year
				'minDate' => '2000-01-01',      // minimum date
				'maxDate' => '2099-12-31',      // maximum date
			),
			'htmlOptions' => array(
				'size' => '10',
				'maxlength' => '10',
			),
		)); 
		?>
		<?php echo $form->error($model,'month_of_register'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->