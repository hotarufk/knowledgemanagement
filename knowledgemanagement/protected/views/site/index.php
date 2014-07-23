
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<head>

<?php 
$count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM tbl_data')->queryScalar();
$dt = date('Y-m-d');
$datesql=" WHERE(tbl_data.user = tbl_user.id and start_date  <= '".$dt."' and (end_date >= '".$dt."' or (start_date !='0000-00-00' and end_date='0000-00-00')))";

	$sql='SELECT tbl_data.*,tbl_user.nama as pid FROM tbl_data,tbl_user  '.$datesql;
$dataProvider=new CSqlDataProvider($sql, array(
    'totalItemCount'=>$count,
    'sort'=>array(
        'attributes'=>array(
             'no_br',
        ),
    ),
    'pagination'=>array(
        'pageSize'=>10,
    ),
));
?>
<div style="width:30%; margin-left:10%; float:left;">
<?php
echo("<center><p style=\"font-family: 'Open Sans', sans-serif;\">Proyek yang Sedang Berjalan</p></center>");
$dataProvider->setPagination(false);

$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	//'id'=>'data-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		//'id',
		array('name'=>'no_br', 'header'=>'No BR'),
		/*array(
		'header' => 'IT Dev PIC',
        'name' => 'user',
        'value' => '$data->user0->nama',   //where name is Client model attribute 
		'filter'=>CHtml::listData(User::model()->findAll(), 'id', 'nama'), */

		//),
		
	),
	'htmlOptions'=>array('style'=>'overflow:auto;'),
));

?>

<?php 
$count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM tbl_user')->queryScalar();
$dt = date('Y-m-d');
$datesql=" WHERE(tbl_data.user = tbl_user.id and start_date  <= '".$dt."' and (end_date >= '".$dt."' or (start_date !='0000-00-00' and end_date='0000-00-00')))";

	$sql='SELECT  distinct tbl_user.nama as pid, tbl_data.*  FROM tbl_data,tbl_user  '.$datesql;
$dataProvider=new CSqlDataProvider($sql, array(
    'totalItemCount'=>$count,
    'sort'=>array(
        'attributes'=>array(
             'pid',
        ),
    ),
    'pagination'=>array(
        'pageSize'=>10,
    ),
));
?>

<?php
echo("<center><p style=\"font-family: 'Open Sans', sans-serif;\">Proyek yang Sedang Berjalan</p></center>");
$dataProvider->setPagination(false);

$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	//'id'=>'data-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		//'id',
		array('name'=>'pid', 'header'=>'IT Dev PIC'),
		/*array(
		'header' => 'IT Dev PIC',
        'name' => 'user',
        'value' => '$data->user0->nama',   //where name is Client model attribute 
		'filter'=>CHtml::listData(User::model()->findAll(), 'id', 'nama'), */

		//),
		
	),
	'htmlOptions'=>array('style'=>'overflow:auto;'),
));

?>
</div>
</center>

