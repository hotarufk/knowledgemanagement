<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php 
$count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM tbl_user')->queryScalar();
$sql='SELECT * FROM tbl_user';
$dataProvider=new CSqlDataProvider($sql, array(
    'totalItemCount'=>$count,
    'sort'=>array(
        'attributes'=>array(
             'user_id', 'id', 'password', 'nama',
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
        array('name'=>'user_id', 'header'=>'#'),
        array('name'=>'id', 'header'=>'Username'),
        array('name'=>'password', 'header'=>'Email'),
        array('name'=>'nama', 'header'=>'Nama'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
			'template'=>'{create}',
			'buttons'=>array
            (
                'create' => array(
                    'label'=>'Criar Evento',
                    'icon'=>'plus',
                    
                ),
            ),
        ),
    ),
)); ?>

<?php

if (!is_object($data))
  die('There seems to be a problem with the data');
  
 ?>