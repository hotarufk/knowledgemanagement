<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'Datas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Data', 'url'=>array('index')),
	array('label'=>'Manage Data', 'url'=>array('admin')),
);
?>

<h1>Create Data</h1>

<?php $this->renderPartial('_upload', array('model'=>$model)); ?>