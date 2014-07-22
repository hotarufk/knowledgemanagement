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
		<?php echo $form->labelEx($model,'request_date'); ?>
		<?php 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'request_date',
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
		<?php echo $form->labelEx($model,'month_of_register'); ?>
		<?php 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'month_of_register',
			'options' => array(  
				'dateFormat'=>'mm.yy',
				//'minDate'=>0,
				'changeYear' => true,           // can change year
				'changeMonth' => true,

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
	<?php echo CHtml::submitButton('Back', array(
	'name'=>'page2'
	)); ?>
	<?php echo CHtml::submitButton('submit', array(
	'name'=>'create'
	)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->