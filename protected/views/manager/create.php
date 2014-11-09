<?php
/* @var $this ManagerController */
/* @var $model Manager */

$this->breadcrumbs=array(
	'Managers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Manager', 'url'=>array('index')),
	array('label'=>'Manage Manager', 'url'=>array('admin')),
);
?>

<h1>Create Manager</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>