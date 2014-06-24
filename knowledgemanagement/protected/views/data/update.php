<?php
/* @var $this DataController */
/* @var $model Data */

$this->breadcrumbs=array(
	'Datas'=>array('index'),
	$model->no=>array('view','id'=>$model->no),
	'Update',
);

$this->menu=array(
	array('label'=>'List Data', 'url'=>array('index')),
	array('label'=>'Create Data', 'url'=>array('create')),
	array('label'=>'View Data', 'url'=>array('view', 'id'=>$model->no)),
	array('label'=>'Manage Data', 'url'=>array('admin')),
);
?>

<h1>Update Data <?php echo $model->no; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>