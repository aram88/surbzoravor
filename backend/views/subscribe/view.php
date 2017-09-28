<?php
$this->breadcrumbs=array(
	'Subscribes'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Subscribe','url'=>array('index')),
array('label'=>'Create Subscribe','url'=>array('create')),
array('label'=>'Update Subscribe','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Subscribe','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Subscribe','url'=>array('admin')),
);
?>

<h1>View Subscribe #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'email',
		'hash',
),
)); ?>
