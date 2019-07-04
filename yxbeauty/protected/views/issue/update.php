<?php
$this->breadcrumbs=array(
	$model->project->name=>array('project/view', 'id'=>$model->project->id),
		/* 'Issues'=>array('index'), */
		$model->name=>array('issue/view', 'id'=>$model->id),
);
?>

<h1>更新交易<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

