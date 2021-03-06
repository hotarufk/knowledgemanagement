<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	   <?php Yii::app()->bootstrap->registerAllCss(); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main-customboot.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrapcustom.css" />
</head>

<body>

<div class="container" id="page">

	<!--<div id="header">
		<div id="logo"><br><br><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header --> -->
	<br><br><br>
	<?php
	$dt = date('Y-m-d');
	?>
	<div id="mainmenu">
		<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'inverse', // null or 'inverse'
    'brand'=>'<img src ="' . Yii::app()->request->baseUrl . '/images/logo.png" />',

    'brandUrl'=>'index.php',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>$dt, 'url'=>array('#')),
                array('label'=>'Report', 'url'=>array('/data/report'),'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Data', 'url'=>array('data/index'), 'visible'=>!Yii::app()->user->isGuest),
                //array('label'=>'File Eksternal', 'url'=>array('file/index'), 'visible'=>Yii::app()->user->checkAccess('admin')),
                array('label'=>'Manage Users', 'url'=>array('user/index'), 'visible'=>Yii::app()->user->checkAccess('admin')),
                array('label'=>'Log', 'url'=>array('log/index'), 'visible'=>Yii::app()->user->checkAccess('admin')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				
                )),
            
        
        
            )
			)
			); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>
	
	
	<!-- <div id="sidebar">
		<?php
			//echo CHtml::button('Test', array('onclick' => 'js:document.location.href="UserController/Index"'));
			echo CHtml::button('Data', array('submit' => array('Data/Create')));
			echo CHtml::button('User', array('submit' => array('User/Create')));
		 $this->widget('bootstrap.widgets.TbButton', array(
			'label'=>'Data',
			'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'size'=>'large', // null, 'large', 'small' or 'mini'
			'htmlOptions'=>array('submit' => array('Data/Create')),
		)); ?>
	</div> -->
	
	
	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
