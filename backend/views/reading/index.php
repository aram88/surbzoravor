<?php
$this->breadcrumbs=array(
	'Readings',
);

$this->menu=array(
array('label'=>'Create Reading','url'=>array('create')),
array('label'=>'Manage Reading','url'=>array('admin')),
);
?>

<h1>Readings</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
