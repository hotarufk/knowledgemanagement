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
             'id', 'username', 'password', 'nama',
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
        array('name'=>'username', 'header'=>'Username'),
        array('name'=>'password', 'header'=>'Password'),
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