<?php
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'顾客列表', 'url'=>array('index')),
	array('label'=>'创建顾客', 'url'=>array('create')),
	array('label'=>'查看顾客', 'url'=>array('view', 'id'=>$model->id)),
	/* array('label'=>'Manage Project', 'url'=>array('admin')), */
);
?>

<h1>更新顾客 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>