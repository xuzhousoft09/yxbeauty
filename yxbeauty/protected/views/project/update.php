<?php
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	"$model->name"=>array('view','id'=>$model->id),
	'Update',
);

/* $this->menu=array(
	array('label'=>'客户列表', 'url'=>array('index')),
	array('label'=>'创建客户', 'url'=>array('create')),
	array('label'=>'查看客户', 'url'=>array('view', 'id'=>$model->id)),

); */
?>

<h1>更新客户 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>