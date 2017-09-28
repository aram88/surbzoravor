<?php
$this->breadcrumbs=array(
	'Static Pages',
);

$this->menu=array(
array('label'=>'Create StaticPage','url'=>array('create')),
array('label'=>'Manage StaticPage','url'=>array('admin')),
);
?>

<h1>Static Pages</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
