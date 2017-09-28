<?php
$this->breadcrumbs=array(
	'Galleries',
);

$this->menu=array(
array('label'=>'Create Gallerie','url'=>array('create')),
array('label'=>'Manage Gallerie','url'=>array('admin')),
);
?>

<h1>Galleries</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
