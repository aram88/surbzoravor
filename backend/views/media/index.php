<?php
$this->breadcrumbs=array(
	'Medias',
);

$this->menu=array(
array('label'=>'Create Media','url'=>array('create')),
array('label'=>'Manage Media','url'=>array('admin')),
);
?>

<h1>Medias</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
