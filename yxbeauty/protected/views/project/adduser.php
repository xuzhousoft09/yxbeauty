<?php

$this->pageTitle=Yii::app()->name.' - Add User To Project';
$this->breadcrumbs=array($model->project->name=>array('view','id'=>$model->project->id),'Add User'); 
 
?>

<h1>添加用户到<?php echo $model->project->name;?></h1>

<?php if(Yii::app()->user->hasFlash('success')):?>

<div class="successMessage">
<?php echo Yii::app()->user->getFlash('成功');?>
</div>

<?php endif;?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm')?>
<p class="note">Fields with<span class="required">*</span> are required.</p>
<div class="row">
<?php $this->widget('CAutoComplete',array(
		'model'=>$model,
		'attribute'=>'username',
		'data'=>$usernames,
		'multiple'=>false,
		'htmlOptions'=>array('size'=>25),
		
));?>

<?php echo $form->error($model,'username'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'role'); ?> 
<?php echo $form->dropDownList($model,'role',Project::getUserRoleOptions());?>
<?php echo $form->error($model,'role');?>
</div>
<p>本功能尚未完工，角色暂时随便选一个即可</p>
<div class="row buttons">
<?php echo CHtml::submitButton('Add User');?>
</div>

<?php $this->endWidget();?>
</div>