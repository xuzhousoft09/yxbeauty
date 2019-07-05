<?php
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->name,
);

$this->menu=array(
		/* array('label'=>'交易列表', 'url'=>array('issue/index','pid'=>$model->id)), */
	/* array('label'=>'Create Project', 'url'=>array('create')), */
	
/* 	array('label'=>'Delete Project', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')), */
	/* array('label'=>'Manage Project', 'url'=>array('admin')),  */
		
    array('label'=>'创建交易', 'url'=>array('issue/create','pid'=>$model->id)),
    array('label'=>'管理交易', 'url'=>array('issue/admin','pid'=>$model->id)),
);


if(Yii::app()->user->checkAccess('updateProject',array('project'=>$model)))
{
	$this->menu[] = array('label'=>'更新客户',
	'url'=>array('update', 'id'=>$model->id));// defined only the users who have the updateProject permission can update the projects
}


if(Yii::app()->user->checkAccess('createUser',array('project'=>$model)))
{
	$this->menu[] = array('label'=>'分配用户到客户',
	'url'=>array('adduser', 'id'=>$model->id));
}
if(Yii::app()->user->checkAccess('createUser',array('project'=>$model)))
{
	$this->menu[] = array('label'=>'管理客户',
			'url'=>array('admin', 'id'=>$model->id));
}

/* var_dump(Yii::app()->user->checkAccess('deleteProject',array('project'=>$model))); */ //returned true

?>

<h1>客户</h1>
<?php foreach($model->caculateTheConsumptions($model->id)[0] as $c)?>
<?php foreach($model->getUserText($model->update_user_id)[0] as $updater)?>
<?php foreach($model->getUserText($model->create_user_id)[0] as $creater)?>
<?php $d = $model->deposit; $b = $d - $c;?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'telephone',
		'deposit',	
			array(
					'name'=>'消费总额',
					'value'=>CHtml::encode($c),
					'type'=>'raw',
			),
			array(
					'name'=>'余额',
					'value'=>CHtml::encode($b),
					'type'=>'raw',
			),
		'description',
		'create_time',
		array(
					'name'=>'创建用户',
					'value'=>CHtml::encode($creater),
					'type'=>'raw',
			),
		'update_time',
		array(
					'name'=>'更新用户',
					'value'=>CHtml::encode($updater),
					'type'=>'raw',
			),
	),
	
		
)); ?>
<br>

<h1>客户交易</h1>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$issueDataProvider,
'itemView'=>'/issue/_view',
)); ?>


