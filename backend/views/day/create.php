<div class="container">
<?php
$this->breadcrumbs=array(
	'Օրեր'=>array('admin'),
	'Ստեղծել',
);

?>

<h1>Ստեղծել Օր</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>