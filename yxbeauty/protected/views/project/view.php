<?php
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->name,
);

$this->menu=array(
		/* array('label'=>'交易列表', 'url'=>array('issue/index','pid'=>$model->id)), */
	/* array('label'=>'Create Project', 'url'=>array('create')), */
	/* array('label'=>'Update Project', 'url'=>array('update', 'id'=>$model->id)), */
/* 	array('label'=>'Delete Project', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')), */
	/* array('label'=>'Manage Project', 'url'=>array('admin')),  */
    array('label'=>'创建交易', 'url'=>array('issue/create','pid'=>$model->id)),
		array('label'=>'管理交易', 'url'=>array('issue/admin','pid'=>$model->id)),
		array('label'=>'顾客列表', 'url'=>array('index')),
		
		
);



if(Yii::app()->user->checkAccess('createProject',array('project'=>$model)))
{
	$this->menu[] = array('label'=>'创建顾客',
			'url'=>array('create'));
		
}
if(Yii::app()->user->checkAccess('updateProject',array('project'=>$model)))
{
	$this->menu[] = array('label'=>'更新顾客',
	'url'=>array('update', 'id'=>$model->id));// defined only the users who have the updateProject permission can update the projects
}

if(Yii::app()->user->checkAccess('admin',array('project'=>$model)))
{
	$this->menu[] = array('label'=>'管理顾客',
			'url'=>array('admin'));
} 

if(Yii::app()->user->checkAccess('createUser',array('project'=>$model)))
{
	$this->menu[] = array('label'=>'添加用户到项目',
			'url'=>array('adduser', 'id'=>$model->id));
}


/* var_dump(Yii::app()->user->checkAccess('deleteProject',array('project'=>$model))); */ //returned true
/* if(Yii::app()->user->checkAccess('deleteProject',array('project'=>$model)))
{
	$this->menu[] =array('label'=>'Delete Project', 
			     'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'));

	
}  */
?>

<h1>顾客</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
	),
)); ?>
    
    
	<?php /* echo CHtml::link('Add User To Project',array('adduser','id'=>$model->id)); */ ?>
	
	<?php /* var_dump($model); */ ?>
	<br/>

<br>
<h1>顾客交易</h1>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$issueDataProvider,
'itemView'=>'/issue/_view',
)); ?>


