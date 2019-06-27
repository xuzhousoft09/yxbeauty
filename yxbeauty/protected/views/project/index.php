<?php
$this->breadcrumbs=array(
	'project',
);

$this->menu=array(
		array('label'=>'创建顾客', 'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess("admin")),

	array('label'=>'管理顾客', 'url'=>array('admin'),'visible'=>Yii::app()->user->checkAccess("admin")),
		
);

?>

<?php if($sysMessage != null):?>
<div class="sys-message">
<?php echo '最新消息:'."&nbsp$sysMessage" ;?>
</div>
<?php Yii::app()->clientScript->registerScript('fadeAndHideEffect','$(".sys-message").animate({opacity: 1.0}, 10000).fadeOut("slow");'
); endif; ?>




<br/>


<h1>顾客</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
