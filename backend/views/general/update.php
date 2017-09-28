<?php
$this->breadcrumbs=array(
	'Generals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List General','url'=>array('index')),
	array('label'=>'Create General','url'=>array('create')),
	array('label'=>'View General','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage General','url'=>array('admin')),
	);
	?>

	<h1>Update General <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>