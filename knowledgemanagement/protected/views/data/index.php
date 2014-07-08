<?php
/* @var $this DataController */
/* @var $dataProvider CActiveDataProvider */



$this->menu=array(
	array('label'=>'Create Data', 'url'=>array('create')),
	array('label'=>'Manage Data', 'url'=>array('admin')),
);
?>

<h1>Datas</h1>

<?php 
$count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM tbl_data')->queryScalar();
$sql='SELECT * FROM tbl_data';
$dataProvider=new CSqlDataProvider($sql, array(
    'totalItemCount'=>$count,
	'keyField'=>'id',
    'sort'=>array(
        'attributes'=>array(
             'id', 'no_br', 'cr_number', 'status', 'BA', 'TS', 'SRS', 'BRS', 'MOM', 'reflex', 'application_name', 'IT_dev_PIC', 'departement_PIC', 'IT_testing_PIC', 'request_date', 'start_date', 'end_date', 'key_achievemnent', 'n_status',
        ),
    ),
    'pagination'=>array(
        'pageSize'=>10,
    ),
));
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$dataProvider,
	'filter'=>null,
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'id', 'header'=>'#'),
        array('name'=>'no_br', 'header'=>'No BR'),
        array('name'=>'cr_number', 'header'=>'CR Number'),
        array('name'=>'status', 'header'=>'Status'),
		array('name'=>'BA', 'header'=>'BA'),
		array('name'=>'TS', 'header'=>'TS'),
		array('name'=>'SRS', 'header'=>'SRS'),
		array('name'=>'BRS', 'header'=>'BRS'),
		array('name'=>'MOM', 'header'=>'MOM'),
		array('name'=>'reflex', 'header'=>'Reflex'),
		array('name'=>'application_name', 'header'=>'Application Name'),
		array('name'=>'IT_dev_PIC', 'header'=>'IT Dev PIC'),
		array('name'=>'departement_PIC', 'header'=>'Departement  PIC'),
		array('name'=>'IT_testing_PIC', 'header'=>'IT Testing PIC'),
		array('name'=>'request_date', 'header'=>'Request Date'),
		array('name'=>'start_date', 'header'=>'Start Date'),
		array('name'=>'end_date', 'header'=>'End Date'),
		array('name'=>'key_achievemnent', 'header'=>'Key Achievement'),
		array('name'=>'n_status', 'header'=>'N Status'),
        
    ),
	'htmlOptions'=>array('style'=>'width: 100%; overflow:scroll;'),
)); ?>
