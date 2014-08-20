
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<head>

<?php //sql utama
$count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM tbl_data')->queryScalar();
$dt = date('Y-m-d');
$sqlcond=" WHERE(tbl_data.user = tbl_user.id and start_date  <= '".$dt."' and (end_date >= '".$dt."' or (start_date !='0000-00-00' and end_date='0000-00-00')))";

	$sql='SELECT tbl_data.*,tbl_user.nama as pid FROM tbl_data,tbl_user  '.$sqlcond;
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

<body>

<div style="width:100%;">
<div style="display:inline; width:48%; float:left;overflow-y:scroll;">


<?php //attribute utama
$count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM tbl_user')->queryScalar();
$dt = date('m.Y');
$dt2 = date('Y-m-1');
$dt3 = date('Y-m-1', strtotime('+1 month'));
//$dt3 = date('yyyy-mm');

$datesql=" WHERE(tbl_data.user = tbl_user.id and month_of_register =".$dt."  )";

	$sql='SELECT  distinct tbl_user.nama as pid, tbl_data.*, case `status` when \'1\' then \'Pre-Register\' when \'2\' then \'In Progress\' when \'3\' then \'Closed-Cancelled\' when \'4\' then \'Closed-Pending\' when \'5\' then \'Closed-Finished\' else \'Unon\' end \'status\',case `key_achievement` when \'1\' then \'Achieved\' when \'0\' then \'Not Achieved\' else \'Unon\' end \'key_achievement\', case `IT_Testing_PIC` when \'1\' then \'I GP Witraguna\' when \'2\' then \'Setiawan\' when \'3\' then \'Sofie Y Chaerang\' when \'4\' then \'Tulus Hamdani\' else \'Unon\' end \'IT_Testing_PIC\'  FROM tbl_data,tbl_user  '.$datesql.'';
$dataProvider=new CSqlDataProvider($sql, array(
    'totalItemCount'=>$count,
    'sort'=>array(
        'attributes'=>array(
             'no_br',
             'cr_number',
             'status',
             'reflex',
             'application_name',
             'pid',
             'departement_PIC',
             'IT_Testing_PIC',
             'request_date',
             'start_date',
             'end_date',
             'key_achievement',
             'month_of_register',
        ),
    ),
    'pagination'=>array(
        'pageSize'=>10,
    ),
));
?>

<?php //tabel utma
echo("<center><p style=\"font-family: 'Open Sans', sans-serif;\">CONTOH</p></center>");
$dataProvider->setPagination(false);

$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	//'id'=>'data-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		//'id',
		array('name'=>'no_br', 'header'=>'No BR'),
		array('name'=>'cr_number', 'header'=>'CR Number'),
		array(
			'header' => 'Status',
            'name'=>'status',
			'filter'=>array("1" =>"Pre-Register", "2" => "In Progress", "3" =>"Closed-Cancelled","4" => "Closed-Pending", "5" => "Closed-Finished"),
        ),
		array('name'=>'reflex', 'header'=>'Reflex'),
		array('name'=>'application_name', 'header'=>'Application Name'),
		array('name'=>'departement_PIC', 'header'=>'Departement PIC'),
		array('name'=>'IT_Testing_PIC', 'header'=>'IT Testing PIC'),
		array('name'=>'request_date', 'header'=>'Request Date'),
		array('name'=>'start_date', 'header'=>'Start Date'),
		array('name'=>'end_date', 'header'=>'End Date'),
		array('name'=>'month_of_register', 'header'=>'Month of Register',),
		array(
			'header' =>'Key Achievement',
            'name'=>'key_achievement',
            'value'=>'$data["key_achievement"]',
			'filter'=>array("0" =>"not Achieved", "1" => "Achieved"),
        ),
		
		/*array(
		'header' => 'IT Dev PIC',
        'name' => 'user',
        'value' => '$data->user0->nama',   //where name is Client model attribute 
		'filter'=>CHtml::listData(User::model()->findAll(), 'id', 'nama'), */

		//),
		
	),
	'htmlOptions'=>array('style'=>'width:100%;'),
));

?>
</div>
<div style="display:inline; width:40%; height:100%; float:left; margin-left:40px;">

<?php //Carry sql
	
	//$datesql=" WHERE( start_date  < '$model->to_date' and (end_date >= '$model->from_date' or (start_date !='0000-00-00' and end_date='0000-00-00')))";
	//$sql='SELECT (SELECT id FROM tbl_data) AS pid, (SELECT count(month_of_register) FROM tbl_data WHERE(month_of_register ='.$dt.')) AS curr, (SELECT id,count(month_of_register) FROM tbl_data WHERE(month_of_register <'.$dt.')) AS carr ';
	$sql='SELECT id, case `status` when \'1\' then \'Pre-Register\' when \'2\' then \'In Progress\' when \'3\' then \'Closed-Cancelled\' when \'4\' then \'Closed-Pending\' when \'5\' then \'Closed-Finished\' else \'Unon\' end \'status\',COUNT(CASE when`month_of_register` =\''.$dt.'\' and `start_date` > \''.$dt2.'\' and `start_date`  < \''.$dt3.'\'  THEN `id` ELSE NULL END) AS this_month, COUNT(CASE when`month_of_register` = \''.$dt.'\' and `start_date` < \''.$dt2.'\' THEN `id` ELSE NULL END) AS overmonth FROM tbl_data group by `status`';
		
		$dataProvider=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
							'pagination'=>false,
							'sort'=>array(
								'attributes'=>array(
								'status',
								'this_month',
								'overmonth',
        ),
    ),
		));
		
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinstrument-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php $this->endWidget(); ?>

<?php //tabel carry
//echo("<center><p style=\"font-family: 'Open Sans', sans-serif;\">CONTOH</p></center>");
$dataProvider->setPagination(false);

$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	//'id'=>'data-grid',
	'dataProvider'=>$dataProvider,
	'template'=>"{items}\n{pager}",

	'columns'=>array(
		//'id',
		array('name'=>'status', 'header'=>'Status'),
		array('name'=>'this_month', 'header'=>'Started This Month'),
		array('name'=>'overmonth', 'header'=>'Carried Over'),
		//array('name'=>'carr', 'header'=>'Carried Over'),
		
		
	),
	'htmlOptions'=>array('style'=>'width:30%;margin-left:30px;'),
));

?>


<?php //carry chart
$label=array();
$nilai=array();

/*foreach($dataProvider->getData() as $i=>$ii)
{
    $label[$i]=$ii['no_br'];
    $nilai[$i]=(int)$ii['count(no_br)'];
}

$this->widget('application.extensions.highcharts.HighchartsWidget', array(
   'options'=>array(
     'chart'=> array('defaultSeriesType'=>'column',),
      'title' => array('text' => 'By No BR'),
      'legend'=>array('enabled'=>false),
      'xAxis'=>array('categories'=>$label,
			'title'=>array('text'=>''),),
      'yAxis'=> array(
            'min'=> 0,
            'title'=> array(
            'text'=>'Jumlah'
            ),
        ),
      'series' => array(
         array('data' => $nilai)
      ),
      'tooltip' => array('formatter' => 'js:function(){ return "<b>"+this.point.name+"</b> :"+this.y; }'),
      'tooltip' => array(
		'formatter' => 'js:function() {return "<b>"+ this.x +"</b><br/>"+"Jumlah : "+ this.y; }'
      ),
      'plotOptions'=>array('pie'=>(array(
                    'allowPointSelect'=>true,
                    'showInLegend'=>true,
                    'cursor'=>'pointer',
					
					
                )
            )                       
        ),
      'credits'=>array('enabled'=>false),
	  
   )
)); */

?>

<?php //No BR sql
	//$datesql=" WHERE( start_date  < '$model->to_date' and (end_date >= '$model->from_date' or (start_date !='0000-00-00' and end_date='0000-00-00')))";
	$sql='SELECT id,count(no_br),no_br  FROM tbl_data WHERE(month_of_register ='.$dt.') GROUP BY no_br';
		
		$dataProvider=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
							'pagination'=>false,
							'sort'=>array(
								'attributes'=>array(
								'no_br',
								'count(no_br)'
        ),
    ),
		));
		
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinstrument-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php $this->endWidget(); ?>

<?php //tabel BR
//echo("<center><p style=\"font-family: 'Open Sans', sans-serif;\">CONTOH</p></center>");
$dataProvider->setPagination(false);

$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	//'id'=>'data-grid',
	'dataProvider'=>$dataProvider,
	'template'=>"{items}\n{pager}",

	'columns'=>array(
		//'id',
		array('name'=>'no_br', 'header'=>'No BR'),
		array('name'=>'count(no_br)', 'header'=>'Jumlah'),
		
		
	),
	'htmlOptions'=>array('style'=>'width:30%;margin-left:30px;'),
));

?>


<?php //No BR chart
$label=array();
$nilai=array();

foreach($dataProvider->getData() as $i=>$ii)
{
    $label[$i]=$ii['no_br'];
    $nilai[$i]=(int)$ii['count(no_br)'];
}

$this->widget('application.extensions.highcharts.HighchartsWidget', array(
'scripts' => array(
   'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
   'modules/exporting', // adds Exporting button/menu to chart
   'themes/grid'        // applies global 'grid' theme to all charts
),
   'options'=>array(
     'chart'=> array('defaultSeriesType'=>'column',),
      'title' => array('text' => 'By No BR'),
      'legend'=>array('enabled'=>false),
      'xAxis'=>array('categories'=>$label,
			'title'=>array('text'=>''),),
      'yAxis'=> array(
            'min'=> 0,
            'title'=> array(
            'text'=>'Jumlah'
            ),
        ),
      'series' => array(
         array('data' => $nilai)
      ),
      'tooltip' => array('formatter' => 'js:function(){ return "<b>"+this.point.name+"</b> :"+this.y; }'),
      'tooltip' => array(
		'formatter' => 'js:function() {return "<b>"+ this.x +"</b><br/>"+"Jumlah : "+ this.y; }'
      ),
      'plotOptions'=>array('pie'=>(array(
                    'allowPointSelect'=>true,
                    'showInLegend'=>true,
                    'cursor'=>'pointer',
					
					
                )
            )                       
        ),
      'credits'=>array('enabled'=>false),
	  
   )
));

?>


<?php //CR number sql
	//$datesql=" WHERE( start_date  < '$model->to_date' and (end_date >= '$model->from_date' or (start_date !='0000-00-00' and end_date='0000-00-00')))";
	$sql='SELECT id,count(cr_number),cr_number  FROM tbl_data WHERE((month_of_register ='.$dt.')) GROUP BY cr_number';
		
		$dataProvider=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
							'pagination'=>false,
							'sort'=>array(
								'attributes'=>array(
								'cr_number',
								'count(cr_number)'
        ),
    ),
		));
		
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinstrument-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php $this->endWidget(); ?>

<?php //tabel CR
//echo("<center><p style=\"font-family: 'Open Sans', sans-serif;\">CONTOH</p></center>");
$dataProvider->setPagination(false);

$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	//'id'=>'data-grid',
	'dataProvider'=>$dataProvider,
	'template'=>"{items}\n{pager}",

	'columns'=>array(
		//'id',
		array('name'=>'cr_number', 'header'=>'CR Number'),
		array('name'=>'count(cr_number)', 'header'=>'Jumlah'),
		
		
	),
	'htmlOptions'=>array('style'=>'width:30%;margin-left:30px;'),
));

?>


<?php //CR chart
$label=array();
$nilai=array();

foreach($dataProvider->getData() as $i=>$ii)
{
    $label[$i]=$ii['cr_number'];
    $nilai[$i]=(int)$ii['count(cr_number)'];
}

$this->widget('application.extensions.highcharts.HighchartsWidget', array(
   'options'=>array(
     'chart'=> array('defaultSeriesType'=>'column',),
      'title' => array('text' => 'By CR Number'),
      'legend'=>array('enabled'=>false),
      'xAxis'=>array('categories'=>$label,
			'title'=>array('text'=>''),),
      'yAxis'=> array(
            'min'=> 0,
            'title'=> array(
            'text'=>'Jumlah'
            ),
        ),
      'series' => array(
         array('data' => $nilai)
      ),
      'tooltip' => array('formatter' => 'js:function(){ return "<b>"+this.point.name+"</b> :"+this.y; }'),
      'tooltip' => array(
		'formatter' => 'js:function() {return "<b>"+ this.x +"</b><br/>"+"Jumlah : "+ this.y; }'
      ),
      'plotOptions'=>array('pie'=>(array(
                    'allowPointSelect'=>true,
                    'showInLegend'=>true,
                    'cursor'=>'pointer',
					
					
                )
            )                       
        ),
      'credits'=>array('enabled'=>false),
	  
   )
));

?>

<?php //status sql
	//$datesql=" WHERE( start_date  < '$model->to_date' and (end_date >= '$model->from_date' or (start_date !='0000-00-00' and end_date='0000-00-00')))";
	$sql='SELECT id,count(status),status, case `status` when \'1\' then \'Pre-Register\' when \'2\' then \'In Progress\' when \'3\' then \'Closed-Cancelled\' when \'4\' then \'Closed-Pending\' when \'5\' then \'Closed-Finished\' else \'Unon\' end \'status\'  FROM tbl_data WHERE((month_of_register ='.$dt.')) GROUP BY status';
		
		$dataProvider=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
							'pagination'=>false,
							'sort'=>array(
								'attributes'=>array(
								'status',
								'count(status)'
        ),
    ),
		));
		
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinstrument-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php $this->endWidget(); ?>

<?php //tabel status
//echo("<center><p style=\"font-family: 'Open Sans', sans-serif;\">CONTOH</p></center>");
$dataProvider->setPagination(false);

$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	//'id'=>'data-grid',
	'dataProvider'=>$dataProvider,
	'template'=>"{items}\n{pager}",

	'columns'=>array(
		//'id',
		array('name'=>'status', 'header'=>'Status'),
		array('name'=>'count(status)', 'header'=>'Jumlah'),
		
		
	),
	'htmlOptions'=>array('style'=>'width:30%;margin-left:30px;'),
));

?>


<?php //status chart
$label=array();
$nilai=array();

foreach($dataProvider->getData() as $i=>$ii)
{
    $label[$i]=$ii['status'];
    $nilai[$i]=(int)$ii['count(status)'];
}

$this->widget('application.extensions.highcharts.HighchartsWidget', array(
   'options'=>array(
     'chart'=> array('defaultSeriesType'=>'column',),
      'title' => array('text' => 'By Status'),
      'legend'=>array('enabled'=>false),
      'xAxis'=>array('categories'=>$label,
			'title'=>array('text'=>''),),
      'yAxis'=> array(
            'min'=> 0,
            'title'=> array(
            'text'=>'Jumlah'
            ),
        ),
      'series' => array(
         array('data' => $nilai)
      ),
      'tooltip' => array('formatter' => 'js:function(){ return "<b>"+this.point.name+"</b> :"+this.y; }'),
      'tooltip' => array(
		'formatter' => 'js:function() {return "<b>"+ this.x +"</b><br/>"+"Jumlah : "+ this.y; }'
      ),
      'plotOptions'=>array('pie'=>(array(
                    'allowPointSelect'=>true,
                    'showInLegend'=>true,
                    'cursor'=>'pointer',
					
					
                )
            )                       
        ),
      'credits'=>array('enabled'=>false),
	  
   )
));

?>

<?php //reflex sql
	//$datesql=" WHERE( start_date  < '$model->to_date' and (end_date >= '$model->from_date' or (start_date !='0000-00-00' and end_date='0000-00-00')))";
	$sql='SELECT id,count(reflex),reflex  FROM tbl_data WHERE((month_of_register ='.$dt.')) GROUP BY reflex';
		
		$dataProvider=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
							'pagination'=>false,
							'sort'=>array(
								'attributes'=>array(
								'reflex',
								'count(reflex)'
        ),
    ),
		));
		
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinstrument-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php $this->endWidget(); ?>

<?php //tabel reflex
//echo("<center><p style=\"font-family: 'Open Sans', sans-serif;\">CONTOH</p></center>");
$dataProvider->setPagination(false);

$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	//'id'=>'data-grid',
	'dataProvider'=>$dataProvider,
	'template'=>"{items}\n{pager}",

	'columns'=>array(
		//'id',
		array('name'=>'reflex', 'header'=>'Reflex'),
		array('name'=>'count(reflex)', 'header'=>'Jumlah'),
		
		
	),
	'htmlOptions'=>array('style'=>'width:30%;margin-left:30px;'),
));

?>


<?php //reflex chart
$label=array();
$nilai=array();

foreach($dataProvider->getData() as $i=>$ii)
{
    $label[$i]=$ii['reflex'];
    $nilai[$i]=(int)$ii['count(reflex)'];
}

$this->widget('application.extensions.highcharts.HighchartsWidget', array(
   'options'=>array(
     'chart'=> array('defaultSeriesType'=>'column',),
      'title' => array('text' => 'By Reflex'),
      'legend'=>array('enabled'=>false),
      'xAxis'=>array('categories'=>$label,
			'title'=>array('text'=>''),),
      'yAxis'=> array(
            'min'=> 0,
            'title'=> array(
            'text'=>'Jumlah'
            ),
        ),
      'series' => array(
         array('data' => $nilai)
      ),
      'tooltip' => array('formatter' => 'js:function(){ return "<b>"+this.point.name+"</b> :"+this.y; }'),
      'tooltip' => array(
		'formatter' => 'js:function() {return "<b>"+ this.x +"</b><br/>"+"Jumlah : "+ this.y; }'
      ),
      'plotOptions'=>array('pie'=>(array(
                    'allowPointSelect'=>true,
                    'showInLegend'=>true,
                    'cursor'=>'pointer',
					
					
                )
            )                       
        ),
      'credits'=>array('enabled'=>false),
	  
   )
));

?>


<?php //app sql
	//$datesql=" WHERE( start_date  < '$model->to_date' and (end_date >= '$model->from_date' or (start_date !='0000-00-00' and end_date='0000-00-00')))";
	$sql='SELECT id,count(application_name),application_name  FROM tbl_data WHERE((month_of_register ='.$dt.')) GROUP BY application_name';
		
		$dataProvider=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
							'pagination'=>false,
							'sort'=>array(
								'attributes'=>array(
								'application_name',
								'count(application_name)'
        ),
    ),
		));
		
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinstrument-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php $this->endWidget(); ?>

<?php //tabel app
//echo("<center><p style=\"font-family: 'Open Sans', sans-serif;\">CONTOH</p></center>");
$dataProvider->setPagination(false);

$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	//'id'=>'data-grid',
	'dataProvider'=>$dataProvider,
	'template'=>"{items}\n{pager}",

	'columns'=>array(
		//'id',
		array('name'=>'application_name', 'header'=>'Application Name'),
		array('name'=>'count(application_name)', 'header'=>'Jumlah'),
		
		
	),
	'htmlOptions'=>array('style'=>'width:30%;margin-left:30px;'),
));

?>


<?php //app chart
$label=array();
$nilai=array();

foreach($dataProvider->getData() as $i=>$ii)
{
    $label[$i]=$ii['application_name'];
    $nilai[$i]=(int)$ii['count(application_name)'];
}

$this->widget('application.extensions.highcharts.HighchartsWidget', array(
   'options'=>array(
     'chart'=> array('defaultSeriesType'=>'column',),
      'title' => array('text' => 'By Application Name'),
      'legend'=>array('enabled'=>false),
      'xAxis'=>array('categories'=>$label,
			'title'=>array('text'=>''),),
      'yAxis'=> array(
            'min'=> 0,
            'title'=> array(
            'text'=>'Jumlah'
            ),
        ),
      'series' => array(
         array('data' => $nilai)
      ),
      'tooltip' => array('formatter' => 'js:function(){ return "<b>"+this.point.name+"</b> :"+this.y; }'),
      'tooltip' => array(
		'formatter' => 'js:function() {return "<b>"+ this.x +"</b><br/>"+"Jumlah : "+ this.y; }'
      ),
      'plotOptions'=>array('pie'=>(array(
                    'allowPointSelect'=>true,
                    'showInLegend'=>true,
                    'cursor'=>'pointer',
					
					
                )
            )                       
        ),
      'credits'=>array('enabled'=>false),
	  
   )
));

?>

<?php //ITdev sql
	//$datesql=" WHERE( start_date  < '$model->to_date' and (end_date >= '$model->from_date' or (start_date !='0000-00-00' and end_date='0000-00-00')))";
	$sql='SELECT tbl_data.id,count(tbl_data.user) as pidcount,tbl_user.nama as pid FROM tbl_data,tbl_user WHERE((tbl_data.user = tbl_user.id and month_of_register ='.$dt.')) GROUP BY pid';
		
		$dataProvider=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
							'pagination'=>false,
							'sort'=>array(
								'attributes'=>array(
								'pid',
								'pidcount'
        ),
    ),
		));
		
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinstrument-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php $this->endWidget(); ?>

<?php //tabel ITdev
//echo("<center><p style=\"font-family: 'Open Sans', sans-serif;\">CONTOH</p></center>");
$dataProvider->setPagination(false);

$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	//'id'=>'data-grid',
	'dataProvider'=>$dataProvider,
	'template'=>"{items}\n{pager}",

	'columns'=>array(
		//'id',
		array('name'=>'pid', 'header'=>'IT Dev PIC'),
		array('name'=>'pidcount', 'header'=>'Jumlah'),
		
		
	),
	'htmlOptions'=>array('style'=>'width:30%;margin-left:30px;'),
));

?>


<?php //ITdev chart
$label=array();
$nilai=array();

foreach($dataProvider->getData() as $i=>$ii)
{
    $label[$i]=$ii['pid'];
    $nilai[$i]=(int)$ii['pidcount'];
}

$this->widget('application.extensions.highcharts.HighchartsWidget', array(
   'options'=>array(
     'chart'=> array('defaultSeriesType'=>'column',),
      'title' => array('text' => 'By IT Dev PIC'),
      'legend'=>array('enabled'=>false),
      'xAxis'=>array('categories'=>$label,
			'title'=>array('text'=>''),),
      'yAxis'=> array(
            'min'=> 0,
            'title'=> array(
            'text'=>'Jumlah'
            ),
        ),
      'series' => array(
         array('data' => $nilai)
      ),
      'tooltip' => array('formatter' => 'js:function(){ return "<b>"+this.point.name+"</b> :"+this.y; }'),
      'tooltip' => array(
		'formatter' => 'js:function() {return "<b>"+ this.x +"</b><br/>"+"Jumlah : "+ this.y; }'
      ),
      'plotOptions'=>array('pie'=>(array(
                    'allowPointSelect'=>true,
                    'showInLegend'=>true,
                    'cursor'=>'pointer',
					
					
                )
            )                       
        ),
      'credits'=>array('enabled'=>false),
	  
   )
));

?>

<?php //app sql
	//$datesql=" WHERE( start_date  < '$model->to_date' and (end_date >= '$model->from_date' or (start_date !='0000-00-00' and end_date='0000-00-00')))";
	$sql='SELECT id,count(departement_PIC),departement_PIC  FROM tbl_data WHERE((month_of_register ='.$dt.')) GROUP BY departement_PIC';
		
		$dataProvider=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
							'pagination'=>false,
							'sort'=>array(
								'attributes'=>array(
								'departement_PIC',
								'count(departement_PIC)'
        ),
    ),
		));
		
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinstrument-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php $this->endWidget(); ?>

<?php //tabel app
//echo("<center><p style=\"font-family: 'Open Sans', sans-serif;\">CONTOH</p></center>");
$dataProvider->setPagination(false);

$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	//'id'=>'data-grid',
	'dataProvider'=>$dataProvider,
	'template'=>"{items}\n{pager}",

	'columns'=>array(
		//'id',
		array('name'=>'departement_PIC', 'header'=>'Departement PIC'),
		array('name'=>'count(departement_PIC)', 'header'=>'Jumlah'),
		
		
	),
	'htmlOptions'=>array('style'=>'width:30%;margin-left:30px;'),
));

?>


<?php //app chart
$label=array();
$nilai=array();

foreach($dataProvider->getData() as $i=>$ii)
{
    $label[$i]=$ii['departement_PIC'];
    $nilai[$i]=(int)$ii['count(departement_PIC)'];
}

$this->widget('application.extensions.highcharts.HighchartsWidget', array(
   'options'=>array(
     'chart'=> array('defaultSeriesType'=>'column',),
      'title' => array('text' => 'By Departement PIC'),
      'legend'=>array('enabled'=>false),
      'xAxis'=>array('categories'=>$label,
			'title'=>array('text'=>''),),
      'yAxis'=> array(
            'min'=> 0,
            'title'=> array(
            'text'=>'Jumlah'
            ),
        ),
      'series' => array(
         array('data' => $nilai)
      ),
      'tooltip' => array('formatter' => 'js:function(){ return "<b>"+this.point.name+"</b> :"+this.y; }'),
      'tooltip' => array(
		'formatter' => 'js:function() {return "<b>"+ this.x +"</b><br/>"+"Jumlah : "+ this.y; }'
      ),
      'plotOptions'=>array('pie'=>(array(
                    'allowPointSelect'=>true,
                    'showInLegend'=>true,
                    'cursor'=>'pointer',
					
					
                )
            )                       
        ),
      'credits'=>array('enabled'=>false),
	  
   )
));

?>

<?php //app sql
	//$datesql=" WHERE( start_date  < '$model->to_date' and (end_date >= '$model->from_date' or (start_date !='0000-00-00' and end_date='0000-00-00')))";
	$sql='SELECT id,count(key_achievement),key_achievement, case `key_achievement` when \'1\' then \'Achieved\' when \'0\' then \'Not Achieved\'  else \'Unon\' end \'key_achievement\' FROM tbl_data WHERE((month_of_register ='.$dt.')) GROUP BY key_achievement';
		
		$dataProvider=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
							'pagination'=>false,
							'sort'=>array(
								'attributes'=>array(
								'key_achievement',
								'count(key_achievement)'
        ),
    ),
		));
		
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinstrument-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php $this->endWidget(); ?>

<?php //tabel app
//echo("<center><p style=\"font-family: 'Open Sans', sans-serif;\">CONTOH</p></center>");
$dataProvider->setPagination(false);

$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	//'id'=>'data-grid',
	'dataProvider'=>$dataProvider,
	'template'=>"{items}\n{pager}",

	'columns'=>array(
		//'id',
		array('name'=>'key_achievement', 'header'=>'Key Achievement'),
		array('name'=>'count(key_achievement)', 'header'=>'Jumlah'),
		
		
	),
	'htmlOptions'=>array('style'=>'width:30%;margin-left:30px;'),
));

?>


<?php //app chart
$label=array();
$nilai=array();

foreach($dataProvider->getData() as $i=>$ii)
{
    $label[$i]=$ii['key_achievement'];
    $nilai[$i]=(int)$ii['count(key_achievement)'];
}

$this->widget('application.extensions.highcharts.HighchartsWidget', array(
   'options'=>array(
     'chart'=> array('defaultSeriesType'=>'column',),
      'title' => array('text' => 'By Key Achievement'),
      'legend'=>array('enabled'=>false),
      'xAxis'=>array('categories'=>$label,
			'title'=>array('text'=>''),),
      'yAxis'=> array(
            'min'=> 0,
            'title'=> array(
            'text'=>'Jumlah'
            ),
        ),
      'series' => array(
         array('data' => $nilai)
      ),
      'tooltip' => array('formatter' => 'js:function(){ return "<b>"+this.point.name+"</b> :"+this.y; }'),
      'tooltip' => array(
		'formatter' => 'js:function() {return "<b>"+ this.x +"</b><br/>"+"Jumlah : "+ this.y; }'
      ),
      'plotOptions'=>array('pie'=>(array(
                    'allowPointSelect'=>true,
                    'showInLegend'=>true,
                    'cursor'=>'pointer',
					
					
                )
            )                       
        ),
      'credits'=>array('enabled'=>false),
	  
   )
));

?>
</div>


</center>
</body>
