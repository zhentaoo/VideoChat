<?php
/* @var $this ManagerController */
/* @var $model Manager */

$this->breadcrumbs=array(
	'Managers'=>array('index'),
	$model->manager_name,
);

$this->menu=array(
	array('label'=>'List Manager', 'url'=>array('index')),
	array('label'=>'Create Manager', 'url'=>array('create')),
	array('label'=>'Update Manager', 'url'=>array('update', 'id'=>$model->manager_name)),
	array('label'=>'Delete Manager', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->manager_name),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Manager', 'url'=>array('admin')),
);
?>

<h1>View Manager #<?php echo $model->manager_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'manager_name',
		'manager_psw',
	),
)); ?>
