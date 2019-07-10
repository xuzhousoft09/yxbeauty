<?php
/* $id = $_GET['id']+0;
$model=$this->loadModel($id);  */

$this->breadcrumbs=array(
		"projects"=>array('project/index'),
		
	/* 	$model->unsetAttributes();  */
);



$this->menu=array(

	array('label'=>'创建客户', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('project-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理客户</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'project-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
		
	'columns'=>array(
		'id',
		'name',
		'telephone',
		'deposit',
		'description',
		
	/* 	'create_user_id',  */
			array(         
					'name'=>'create_user_id',
					'value'=>'implode($data->getUserText($data->create_user_id)[0])',
					
			),
	
			'create_time',
		 /* 'update_user_id', */ 
			array(
					'name'=>'update_user_id',
					'value'=>'implode($data->getUserText($data->update_user_id)[0])',
						
			),
		
			'update_time',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
