<?php
/* @var $this DataController */
/* @var $model Data */

?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	 'dataProvider'=> $model->search(),
     'title'=>'data Report',
     'autoWidth'=>false,
	'columns'=>array(
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
