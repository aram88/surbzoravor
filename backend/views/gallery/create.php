<div class="container">
<?php
$this->breadcrumbs=array(
	'Նկարների  Ցուցակ'=>array('admin'),
	'Ստեղծել',
);

$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-left'),
				'buttons' => array(
						array('label' => 'Նկարների  Ցուցակ', 'url' => '/gallery/admin','htmlOptions'=>array( 'class'=>'btn-success')),
							),
		)
);
?>
<br/>
<br/>

<div class="well">
<h1>Ստեղծել նկար</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'galleryList'=>$galleryList)); ?>
</div>
</div>