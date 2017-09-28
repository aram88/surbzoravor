<div class="container">
<?php
$this->breadcrumbs=array(
	'Նյութեր'=>array('index'),
	'Ստեղծել',
);
?>

<h1>Ստեղծել Նյեւթ</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>