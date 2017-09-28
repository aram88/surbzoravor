<?php
$this->breadcrumbs=array(
	'Generals'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List General','url'=>array('index')),
array('label'=>'Create General','url'=>array('create')),
array('label'=>'Update General','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete General','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage General','url'=>array('admin')),
);
?>

<h1>View General #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'post_id',
		'created_date',
		'modified_date',
),
)); ?>
