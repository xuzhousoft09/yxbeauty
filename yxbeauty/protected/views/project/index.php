<?php
$this->breadcrumbs=array(
	'projects',
);

$this->menu=array(
		array('label'=>'创建客户', 'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess("admin")),
		
		
);

if(Yii::app()->user->checkAccess('admin'))
{
	$this->menu[] = array('label'=>'管理客户',
			'url'=>array('admin','id'=>'1'));
}

?>

<?php if($sysMessage != null):?>
<div class="sys-message">
<?php echo '最新消息:'."&nbsp$sysMessage" ;?>
</div>
<?php Yii::app()->clientScript->registerScript('fadeAndHideEffect','$(".sys-message").animate({opacity: 1.0}, 10000).fadeOut("slow");'
); endif; ?>




<br/>


<h1>客户</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
		'enablePagination' => FALSE,
)); ?>
