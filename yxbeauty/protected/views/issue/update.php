<?php
$this->breadcrumbs=array(
	'issues'=>array('index'),
	$model->name=>array('index','id'=>$model->pid),
	'issues',
);
?>

<h1>更新交易<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

