<?php
$this->breadcrumbs=array(
		
		'Create',
);

$this->menu=array(
	/* array('label'=>'顾客列表', 'url'=>array('index')), */
	/* array('label'=>'Manage Project', 'url'=>array('admin')), */
);
?>

<h1>创建顾客</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>