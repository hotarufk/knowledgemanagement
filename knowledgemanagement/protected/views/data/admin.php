<?php
/* @var $this DataController */
/* @var $model Data */



$this->menu=array(
	array('label'=>'List Data', 'url'=>array('index')),
	array('label'=>'Create Data', 'url'=>array('create')),
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

<h1>Manage Datas</h1>


<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'page-form',
    'enableAjaxValidation'=>true,
)); ?>
 
<b>From :</b>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'from_date',  // name of post parameter
	'value'=>isset(Yii::app()->request->cookies['from_date'])?Yii::app()->request->cookies['from_date']->value: '',  // value comes from cookie after submittion
     'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>'yy-mm-dd',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));
?>
<b>To :</b>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'to_date',
    'value'=> isset(Yii::app()->request->cookies['to_date'])?Yii::app()->request->cookies['to_date']->value: '',
     'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>'yy-mm-dd',
 
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));
?>
<?php echo CHtml::submitButton('Go'); ?> // submit button
<?php $this->endWidget(); ?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
$dataProvider = $model->search();
$pagination =  array('pageSize' => 5,);//set jumlah halaman/page
$dataProvider->setPagination($pagination);

$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	'id'=>'data-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
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
		'link'=>array(
								'header'=>'Test Scenario',
								'type'=>'raw',
								'value'=> 'CHtml::button("download",array("onclick"=>"document.location.href=\'".Yii::app()->controller->createUrl("file/download",array("id"=>"$data->id"))."\'"))',
						),
		array(
			'header' => 'Download',
			'class' => 'CButtonColumn',
			'template' => 'download',
			'buttons'=>array(
				'download' => array(
					'label'=>'download', // text label of the button
					'imageUrl'=>'C:\xampp\htdocs\KnowledgeManagement\knowledgemanagement\images\logo.png',
					//'url'=>"index",
					'options' => array('class'=>'copy'), // HTML options for the button
				),
			),
		),
	
		
		array(
			'class'=>'CButtonColumn',
		),
	),
	'htmlOptions'=>array('style'=>'width:100%;overflow-x:scroll;'),
)); ?>
