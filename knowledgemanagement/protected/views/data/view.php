<?php
/* @var $this DataController */
/* @var $model Data */

$this->breadcrumbs=array(
	'Datas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Data', 'url'=>array('index')),
	array('label'=>'Create Data', 'url'=>array('create')),
	array('label'=>'Update Data', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Data', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Data', 'url'=>array('admin')),
	array('label'=>'Upload File', 'url'=>"?r=file/update&id=$model->id"),
	
);
?>

<h1>View Data #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'no_br',
		'cr_number',
		array(
			'header' => 'Status',
            'name'=>'status',
			'value'=>$model-> MORText($model->status),
        ), 
		'reflex',
		'application_name',
         array(
			'header' => 'IT Dev PIC',
            'name'=>'user',
            'value'=>$model->user0->nama ,
        ), 
		'departement_PIC',
        array(
			'header' =>'IT Testing PIC',
            'name'=>'IT_testing_PIC',
            'value'=>$model->TestingPICText($model->IT_testing_PIC),
        ),		
		'request_date',
		'start_date',
		'end_date',
        array(
			'header' =>'Key Achievement',
            'name'=>'key_achievement',
            'value'=>$model->KAchievementText($model->key_achievement),
        ),
        array(
			'header' =>'Month of Register',
            'name'=>'month_of_register',
            'value'=>$model->MORText($model->month_of_register),
        ),			
	),
)); ?>




