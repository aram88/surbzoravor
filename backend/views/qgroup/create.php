<div class="container">
<?php
$this->breadcrumbs=array(
	'Հարցերի խումբ'=>array('admin'),
	
);


?>

<h1>Ստեղծել հարցերի խումբ</h1>
<div class="well">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>