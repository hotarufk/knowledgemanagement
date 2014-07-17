<?php
/* @var $this DataController */
/* @var $model Data */



$this->menu=array(
	array('label'=>'Manage Data', 'url'=>array('admin')),
	array('label'=>'Create Data', 'url'=>array('create')),
	array('label'=>'Report Data', 'url'=>array('test')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#data-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<br><br><br>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'page-form',
    'enableAjaxValidation'=>true,
)); 


	$select=isset(Yii::app()->request->cookies['Bulan'])?Yii::app()->request->cookies['Bulan']->value:0;
	$year=isset(Yii::app()->request->cookies['year'])?Yii::app()->request->cookies['year']->value:2012;
	echo CHtml::beginForm(CHtml::normalizeUrl(array('message/index')), 'get', array('id'=>'filter-form'))
	. CHtml::dropDownList('Bulan', $select, 
              array('01' => 'Januari', '02' => 'Februari','03' => 'Maret', '04' => 'April','05' => 'Mei', '06' => 'Juni','07' => 'Juli', '08' => 'Agustus','09' => 'September', '10' => 'Oktober','11' => 'November', '12' => 'Desember'))
    . CHtml::numberField('year', $year,$htmlOptions= array ('min'=>'2008', 'max'=>'2099' ))
    . CHtml::submitButton('Search', array('name'=>''))
    . CHtml::endForm();
//	echo CHtml::submitButton('Go'); 
	$this->endWidget(); 
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	'id'=>'data-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		//'id',
		'no_br',
		'cr_number', 
		array(
			'header' => 'Status',
            'name'=>'status',
            'value'=>'$data->StatusText($data->status)',
			'filter'=>array("1" =>"Pre-Register", "2" => "In Progress", "3" =>"Closed-Cancelled","4" => "Closed-Pending", "5" => "Closed-Finished"),
        ),
		'reflex',
		'application_name',
		array(
		'header' => 'IT Dev PIC',
        'name' => 'user',
        'value' => '$data->user0->nama',   //where name is Client model attribute 
		'filter'=>CHtml::listData(User::model()->findAll(), 'id', 'nama'),

		),
		'departement_PIC',
		array(
			'header' =>'IT Testing PIC',
            'name'=>'IT_testing_PIC',
            'value'=>'$data->TestingPICText($data->IT_testing_PIC)',
			'filter'=>array("1" =>"I GP Witraguna", "2" => "Setiawan", "3" =>"Sofie Y Chaerang","4" => "Tulus Hamdani"),
        ),		
		'request_date',
		'start_date',
		'end_date',
		array(
			'header' =>'Key Achievement',
            'name'=>'key_achievement',
            'value'=>'$data->KAchievementText($data->key_achievement)',
			'filter'=>array("0" =>"not Achieved", "1" => "Achieved"),
        ),
		array(
			'header' => 'Month of Register',
            'name'=>'month_of_register',
            'value'=>'$data-> MORText($data->month_of_register)',
        ),
		array(
			'class'=>'CButtonColumn',
			'template' => '{view}',
		),
	),
)); ?>
