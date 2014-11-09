<?php
/* @var $this ManagerController */
/* @var $model Manager */

$this->breadcrumbs=array(
	'Managers'=>array('index'),
	$model->manager_name=>array('view','id'=>$model->manager_name),
	'Update',
);

$this->menu=array(
	array('label'=>'List Manager', 'url'=>array('index')),
	array('label'=>'Create Manager', 'url'=>array('create')),
	array('label'=>'View Manager', 'url'=>array('view', 'id'=>$model->manager_name)),
	array('label'=>'Manage Manager', 'url'=>array('admin')),
);
?>

<h1>Update Manager <?php echo $model->manager_name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>