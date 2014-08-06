<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Users</h1>
<?php
$dataProvider = $model->search();
$pagination =  array('pageSize' => 5,);//set jumlah halaman/page
$dataProvider->setPagination($pagination);

$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	'id'=>'data-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		//'id'
		'username',
		'password', 
		'nama', 
		array(
			'header' =>'Role',
            'name'=>'role',
            'value'=>'$data->roleText($data->role)',
			'filter'=>array("0" =>"Admin", "1" => "User"),		
		),
		
	),
	'htmlOptions'=>array('style'=>'width:100%;'),
)); 

?>

