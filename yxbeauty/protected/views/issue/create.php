<?php
$this->breadcrumbs=array(
	
	'Create',
);

$this->menu=array(
	array('label'=>'交易列表', 'url'=>array('issue/index','pid'=>$model->project_id)),
	
	/* array('label'=>'Manage Issue', 'url'=>array('admin')), */
);
?>

<h1>创建交易</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>