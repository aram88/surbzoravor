<?php
$this->breadcrumbs=array(
	'Static Pages'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List StaticPage','url'=>array('index')),
array('label'=>'Manage StaticPage','url'=>array('admin')),
);
?>

<h1>Create StaticPage</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>