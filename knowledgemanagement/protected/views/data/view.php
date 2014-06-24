<?php
/* @var $this DataController */
/* @var $model Data */

$this->breadcrumbs=array(
	'Datas'=>array('index'),
	$model->no,
);

$this->menu=array(
	array('label'=>'List Data', 'url'=>array('index')),
	array('label'=>'Create Data', 'url'=>array('create')),
	array('label'=>'Update Data', 'url'=>array('update', 'id'=>$model->no)),
	array('label'=>'Delete Data', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->no),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Data', 'url'=>array('admin')),
);
?>

<h1>View Data #<?php echo $model->no; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'no',
		'no_br',
		'cr_number',
		'status',
		'BA',
		'TS',
		'SRS',
		'BRS',
		'MOM',
		'reflex',
		'application_name',
		'IT_dev_PIC',
		'departement_PIC',
		'IT_testing_PIC',
		'request_date',
		'start_date',
		'end_date',
		'key_achievement',
		'n_status',
	),
)); ?>
