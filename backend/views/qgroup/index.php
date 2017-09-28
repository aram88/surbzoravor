<?php
$this->breadcrumbs=array(
	'Qgroups',
);

$this->menu=array(
array('label'=>'Create Qgroup','url'=>array('create')),
array('label'=>'Manage Qgroup','url'=>array('admin')),
);
?>

<h1>Qgroups</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
