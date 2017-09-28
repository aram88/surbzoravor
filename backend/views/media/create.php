<div class="container">
<?php
$this->breadcrumbs=array(
	'Ֆիլեր'=>array('admin'),
	'Ստեղծել',
);

?>

<h1>Ստեղծել Ֆայլ</h1>
<div class="well">


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>