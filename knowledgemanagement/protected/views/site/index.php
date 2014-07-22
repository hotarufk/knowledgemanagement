<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    
)); ?>
 
    <p>Knowledge Repository ini berfungsi sebagai tracker data dari setiap proyek</p>
    <p><?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'Lihat Data',
		'url'=>array('/data/index')
    )); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'Lihat Laporan',
		'url'=>array('/data/report')
    )); ?></p>
 
<?php $this->endWidget(); ?>

