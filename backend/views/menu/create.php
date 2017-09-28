<div class="container">
<?php
$this->breadcrumbs=array(
	'Մենյուներ'=>array('admin'),
	'Ստեղծել',
);

$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-right'),
				'buttons' => array(
						array('label' => 'Մենյուներ', 'url' => '/menu/admin','htmlOptions'=>array( 'class'=>'btn-success')),
							),
		)
);

?>
<br/>
<br/>

<div class="well">
<h1>Ստեղծել Մենյու</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>