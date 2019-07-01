<?php
$this->breadcrumbs=array(
	'Issues'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'交易列表', 'url'=>array('index')),
	array('label'=>'创建交易', 'url'=>array('create','id'=>$model->pid)),
	array('label'=>'查看交易', 'url'=>array('view', 'id'=>$model->id)),
	/* array('label'=>'Manage Issue', 'url'=>array('admin')), */
);
?>

<h1>Update Issue <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>