<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('姓名')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('issue/view', 'id'=>$data->id)); ?>
	<br />

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('记录')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('类型ID')); ?>:</b>
	<?php /* echo CHtml::encode($data->type_id); */ ?>
	<?php echo CHtml::encode($data->getTypeText()); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('状态ID')); ?>:</b>
	<?php echo CHtml::encode($data->getStatusText()); ?>
	
	<br />

	

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('requester_id')); ?>:</b>
	<?php echo CHtml::encode($data->requester_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->create_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->update_user_id); ?>
	<br />

	*/ ?>

</div>