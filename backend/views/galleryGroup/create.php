<div class="container">
<?php
$this->breadcrumbs=array(
	'Նկարների խումբ'=>array('admin'),
	'Create',
);

$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-right'),
				'buttons' => array(
						array('label' => 'Նկարների Խմբերի Ցուցակ', 'url' => '/galleryGroup/admin','htmlOptions'=>array( 'class'=>'btn-success')),
							),
		)
);

?>
<br/>
<br/>

<div class="well">
<h1>Ստեղծել նկարների խումբ</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>
