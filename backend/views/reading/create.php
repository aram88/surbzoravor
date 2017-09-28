<?php
$this->breadcrumbs=array(
	'Ընթերցվածքներ'=>array('admin'),
	'Ստեղծել',
);


$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-left'),
				'buttons' => array(
						array('label' => 'Ընթերցվածքներ', 'url' => '/reading/admin','htmlOptions'=>array( 'class'=>'btn-success')),
							),
		)
);
?>
<br/>
<br/>
<h1>Ստեղծել ընթերցվածք</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>