<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>



<?php
$this->pageTitle=Yii::app()->name . ' - Contact Us';

?>

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

<?php
ob_start();
$this->widget('bootstrap.widgets.TbGridView', array(
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
	'htmlOptions' => array('style' => 'width: 100%; overflow:scroll;'),
));
$Table = ob_get_contents();
ob_end_clean();
?>
</center>


<?php 
$count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM tbl_user')->queryScalar();
$sql='SELECT * FROM tbl_user';
$dataProvider=new CSqlDataProvider($sql, array(
    'totalItemCount'=>$count,
    'sort'=>array(
        'attributes'=>array(
             'id', 'username', 'password', 'nama',
        ),
    ),
    'pagination'=>array(
        'pageSize'=>10,
    ),
));
?>

<?php
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

<?php
$this->widget('zii.widgets.jui.CJuiTabs',array(
    'tabs'=>array(
        'Tabel'=>$Table,
        'Chart by BR'=>$brchart,
        
    ),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>false,
    ),
    'id'=>'MyTab-Menu',
));
?>


