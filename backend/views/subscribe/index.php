<?php
$this->breadcrumbs=array(
	'Subscribes',
);

$this->menu=array(
array('label'=>'Create Subscribe','url'=>array('create')),
array('label'=>'Manage Subscribe','url'=>array('admin')),
);
?>

<h1>Subscribes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
