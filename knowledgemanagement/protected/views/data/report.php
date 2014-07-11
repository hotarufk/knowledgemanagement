<?php
/* @var $this DataController */
/* @var $model Data */
/* @var $form CActiveForm */
?>



<?php
$this->pageTitle=Yii::app()->name;

?>


<?php
ob_start();
$this->widget('bootstrap.widgets.TbGridView', array(
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
	'htmlOptions' => array('style' => 'width: 100%; overflow-x:scroll; '),
));
$Table = ob_get_contents();
ob_end_clean();
?>
</center>


<?php //Status
	$sql='SELECT count(status),status  FROM tbl_data GROUP BY status';
		
		$dataProvider=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
		));
		
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinstrument-form',
	'enableAjaxValidation'=>false,
)); ?>
<center>

<?php
$label=array();
$nilai=array();

foreach($dataProvider->getData() as $i=>$ii)
{
    $label[$i]=$ii['status'];
    $nilai[$i]=(int)$ii['count(status)'];
}
ob_start();
$this->widget('application.extensions.highcharts.HighchartsWidget', array(
   'options'=>array(
     'chart'=> array('defaultSeriesType'=>'column',),
      'title' => array('text' => 'By Status'),
      'legend'=>array('enabled'=>false),
      'xAxis'=>array('categories'=>array('Pre-Register','In-Progress','Closed-Cancelled','Closed-Pending','Closed Finished'),
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
$statchart = ob_get_contents();
ob_end_clean();
?>
</center>


<?php //No BR
	$sql='SELECT count(no_br),no_br  FROM tbl_data GROUP BY no_br';
		
		$dataProvider=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
		));
		
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinstrument-form',
	'enableAjaxValidation'=>false,
)); ?>
<center>
<?php $this->endWidget(); ?>

<?php
$label=array();
$nilai=array();

foreach($dataProvider->getData() as $i=>$ii)
{
    $label[$i]=$ii['no_br'];
    $nilai[$i]=(int)$ii['count(no_br)'];
}
ob_start();
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
));
$brchart = ob_get_contents();
ob_end_clean();
?>
</center>
<?php $this->endWidget(); ?>

<?php //CR Number
	$sql='SELECT count(cr_number),cr_number  FROM tbl_data GROUP BY cr_number';
		
		$dataProvider=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
		));
		
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinstrument-form',
	'enableAjaxValidation'=>false,
)); ?>
<center>

<?php
$label=array();
$nilai=array();

foreach($dataProvider->getData() as $i=>$ii)
{
    $label[$i]=$ii['cr_number'];
    $nilai[$i]=(int)$ii['count(cr_number)'];
}
ob_start();
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
$crchart = ob_get_contents();
ob_end_clean();
?>
</center>
<?php $this->endWidget(); ?>

<?php //Reflex
	$sql='SELECT count(reflex),reflex  FROM tbl_data GROUP BY reflex';
		
		$dataProvider=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
		));
		
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinstrument-form',
	'enableAjaxValidation'=>false,
)); ?>
<center>

<?php
$label=array();
$nilai=array();

foreach($dataProvider->getData() as $i=>$ii)
{
    $label[$i]=$ii['reflex'];
    $nilai[$i]=(int)$ii['count(reflex)'];
}
ob_start();
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
$refchart = ob_get_contents();
ob_end_clean();
?>
<?php $this->endWidget(); ?>
</center>

<?php //App Name
	$sql='SELECT count(application_name),application_name  FROM tbl_data GROUP BY application_name';
		
		$dataProvider=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
		));
		
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinstrument-form',
	'enableAjaxValidation'=>false,
)); ?>
<center>
<?php
$label=array();
$nilai=array();

foreach($dataProvider->getData() as $i=>$ii)
{
    $label[$i]=$ii['application_name'];
    $nilai[$i]=(int)$ii['count(application_name)'];
}
ob_start();
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
$appchart = ob_get_contents();
ob_end_clean();
?>
<?php $this->endWidget(); ?>
</center>

<?php //IT Dev PIC
	$sql='SELECT count(user)  FROM tbl_data GROUP BY user';
		
		$dataProvider=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
		));
		
?>

<?php
	$sql='SELECT nama  FROM tbl_user';
		
		$dataProviderUser=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
		));
		
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinstrument-form',
	'enableAjaxValidation'=>false,
)); ?>
<center>

<?php
$label=array();
$nilai=array();

foreach($dataProvider->getData() as $i=>$ii)
{
    
    $nilai[$i]=(int)$ii['count(user)'];
}
foreach($dataProviderUser->getData() as $i=>$ii)
{
    $label[$i]=$ii['nama'];
    
}
ob_start();
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
$itchart = ob_get_contents();
ob_end_clean();
?>
<?php $this->endWidget(); ?>
</center>
<?php //Dept PIC
	$sql='SELECT count(departement_PIC),departement_PIC FROM tbl_data GROUP BY departement_PIC';
		
		$dataProvider=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
		));
		
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinstrument-form',
	'enableAjaxValidation'=>false,
)); ?>
<center>

<?php
$label=array();
$nilai=array();

foreach($dataProvider->getData() as $i=>$ii)
{
    $label[$i]=$ii['departement_PIC'];
    $nilai[$i]=(int)$ii['count(departement_PIC)'];
}
ob_start();
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
$depchart = ob_get_contents();
ob_end_clean();
?>
</center>
<?php $this->endWidget(); ?>

<?php //Test PIC
	$sql='SELECT count(IT_testing_PIC),IT_testing_PIC FROM tbl_data GROUP BY IT_testing_PIC';
		
		$dataProvider=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
		));
		
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinstrument-form',
	'enableAjaxValidation'=>false,
)); ?>
<center>

<?php
$label=array();
$nilai=array();

foreach($dataProvider->getData() as $i=>$ii)
{
    $label[$i]=$ii['IT_testing_PIC'];
    $nilai[$i]=(int)$ii['count(IT_testing_PIC)'];
}
ob_start();
$this->widget('application.extensions.highcharts.HighchartsWidget', array(
   'options'=>array(
     'chart'=> array('defaultSeriesType'=>'column',),
      'title' => array('text' => 'By IT Testing PIC'),
      'legend'=>array('enabled'=>false),
      'xAxis'=>array('categories'=>array('I GP Witraguna', 'Setiawan', 'Sofie Y Chaerang', 'Tulus Hamdani'),
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
$teschart = ob_get_contents();
ob_end_clean();
?>
</center>
<?php $this->endWidget(); ?>

<?php //Key Achievement
	$sql='SELECT count(key_achievement),key_achievement  FROM tbl_data GROUP BY key_achievement';
		
		$dataProvider=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
		));
		
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinstrument-form',
	'enableAjaxValidation'=>false,
)); ?>
<center>

<?php
$label=array();
$nilai=array();

foreach($dataProvider->getData() as $i=>$ii)
{
    $label[$i]=$ii['key_achievement'];
    $nilai[$i]=(int)$ii['count(key_achievement)'];
}
ob_start();
$this->widget('application.extensions.highcharts.HighchartsWidget', array(
   'options'=>array(
     'chart'=> array('defaultSeriesType'=>'column',),
      'title' => array('text' => 'By Key Achievement'),
      'legend'=>array('enabled'=>false),
      'xAxis'=>array('categories'=>array('Not Achieved', 'Achieved'),
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
$keychart = ob_get_contents();
ob_end_clean();
?>
</center>
<?php $this->endWidget(); ?>

<?php //Month of Register
	$sql='SELECT count(month_of_register),month_of_register  FROM tbl_data GROUP BY month_of_register';
		
		$dataProvider=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
		));
		
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinstrument-form',
	'enableAjaxValidation'=>false,
)); ?>
<center>

<?php
$label=array();
$nilai=array();

foreach($dataProvider->getData() as $i=>$ii)
{
    $label[$i]=$ii['month_of_register'];
    $nilai[$i]=(int)$ii['count(month_of_register)'];
}
ob_start();
$this->widget('application.extensions.highcharts.HighchartsWidget', array(
   'options'=>array(
     'chart'=> array('defaultSeriesType'=>'column',),
      'title' => array('text' => 'By Month of Register'),
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
$mthchart = ob_get_contents();
ob_end_clean();
?>
</center>
<?php $this->endWidget(); ?>

<?php
$this->widget('zii.widgets.jui.CJuiTabs',array(
    'tabs'=>array(
        'Tabel'=>array('content' => $Table, 'id' => 'Tabel'),
        'Chart by No BR'=>array('content'=>$brchart, 'id'=>'No_BR'),
        'Chart by Status'=>array('content'=>$statchart, 'id' => 'Status'),
        'Chart by CR Number'=>array('content'=>$crchart, 'id'=> 'CR_Number'),
        'Chart by Reflex'=>array('content'=>$refchart, 'id'=>'Reflex'),
        'Chart by App Name'=>array('content'=>$appchart,'id'=>'Application_Name'),
        'Chart by IT Dev PIC'=>array('content'=>$itchart,'id'=>'IT_Dev_PIC'),
        'Chart by Departement PIC'=>array('content'=>$depchart,'id'=>'Departement_PIC'),
        'Chart by IT Testing PIC'=>array('content'=>$teschart,'id'=>'IT_Testing_PIC'),
        'Chart by Key Achivement'=>array('content'=>$keychart,'id'=>'Key_Achivement'),
        'Chart by Month of Register'=>array('content'=>$mthchart,'id'=>'Month_of_Register'),
        
    ),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>false,
    ),
    'id'=>'MyTab-Menu',
	'htmlOptions' => array('style' => 'width: 150%; font-size:1em'),
));
?>

