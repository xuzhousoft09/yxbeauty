<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
    
	<div class="row">
		<?php echo $form->labelEx($model,'姓名'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'电话'); ?>
		<?php echo $form->textField($model,'telephone',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'telephone'); ?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'充值总额'); ?>
		<?php echo $form->textField($model,'deposit',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'deposit'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'备注'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>




	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->