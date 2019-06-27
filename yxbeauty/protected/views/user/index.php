<?php
$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
		
	array('label'=>'Create User', 'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess("admin")),
	/* array('label'=>'Manage User', 'url'=>array('admin')), */
	array('label'=>'Manage User', 'url'=>array('admin'),'visible'=>Yii::app()->user->checkAccess("admin")),
		);
?>

<h1>用户</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
