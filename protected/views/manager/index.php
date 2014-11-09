<?php
/* @var $this ManagerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Managers',
);

$this->menu=array(
	array('label'=>'Create Manager', 'url'=>array('create')),
	array('label'=>'Manage Manager', 'url'=>array('admin')),
);
?>

<h1>Managers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
