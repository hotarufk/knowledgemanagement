<?php
/* @var $this DataController */
/* @var $model Data */

$this->breadcrumbs=array(
	'Datas'=>array('index'),
	'Manage',
);

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

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'data-grid',
	'dataProvider'=>$model->search(),
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
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
