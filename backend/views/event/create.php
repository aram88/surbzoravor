<div class="container">
<?php
$this->breadcrumbs=array(
	'Իրադարձություններ'=>array('index'),
	'Ստեղծել',
);
$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-left'),
				'buttons' => array(
						array('label' => 'Իրադարձություններ', 'url' => '/event/admin','htmlOptions'=>array( 'class'=>'btn-success')),
				),
		)
);
?>
<br/>
<br/>
<div class="well">
<h1>Ստեղծել Իրադարձություն</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>