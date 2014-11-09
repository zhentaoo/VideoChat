<?php
/* @var $this ManagerController */
/* @var $data Manager */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('manager_name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->manager_name), array('view', 'id'=>$data->manager_name)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manager_psw')); ?>:</b>
	<?php echo CHtml::encode($data->manager_psw); ?>
	<br />


</div>