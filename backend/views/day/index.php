<?php
$this->breadcrumbs=array(
	'Days',
);

$this->menu=array(
array('label'=>'Create Day','url'=>array('create')),
array('label'=>'Manage Day','url'=>array('admin')),
);
?>

<h1>Days</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
