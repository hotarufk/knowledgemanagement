<?php
/* @var $this FileController */
/* @var $dataProvider CActiveDataProvider */
define ('SITE_ROOT', realpath(dirname(__FILE__)));
$this->breadcrumbs=array(
	'Files',
);

$this->menu=array(
	array('label'=>'Create File', 'url'=>array('create')),
	array('label'=>'Manage File', 'url'=>array('admin')),
);
?>

<h1>Files</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>