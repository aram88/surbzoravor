<?php
$this->breadcrumbs=array(
	'Gallery Groups',
);

$this->menu=array(
array('label'=>'Create GalleryGroup','url'=>array('create')),
array('label'=>'Manage GalleryGroup','url'=>array('admin')),
);
?>

<h1>Gallery Groups</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
