<?php
$this->breadcrumbs=array(
	'Generals',
);

$this->menu=array(
array('label'=>'Create General','url'=>array('create')),
array('label'=>'Manage General','url'=>array('admin')),
);
?>

<h1>Generals</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
