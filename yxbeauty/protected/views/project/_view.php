<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('姓名')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('电话')); ?>:</b>
	<?php echo CHtml::encode($data->telephone); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('充值总额')); ?>:</b>
	<?php echo CHtml::encode($data->balance); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('消费总额')); ?>:</b>

    <br />
    
	<b><?php echo CHtml::encode($data->getAttributeLabel('备注')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('创建时间')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('创建用户ID')); ?>:</b>
	<?php echo CHtml::encode($data->create_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('更新时间')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('更新用户ID')); ?>:</b>
	<?php echo CHtml::encode($data->update_user_id); ?>
	<br />
	

</div>