<?php
$this->breadcrumbs=array(
	'Issues'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>更新交易<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

