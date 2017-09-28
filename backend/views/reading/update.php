<div class="container">
<?php
$this->breadcrumbs=array(
	'Ընթերցվածքներ'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Փոփոխել',
);

$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-left'),
				'buttons' => array(
						array('label' => 'Ստեղծել', 'url' => '/reading/create','htmlOptions'=>array( 'class'=>'btn-primary')),
						array('label' => 'Ընթերցվածքներ', 'url' => '/reading/admin','htmlOptions'=>array( 'class'=>'btn-success')),
						array('label'=>'Ջնջել','url'=>'#','htmlOptions'=>array('class'=>'btn-danger','submit'=>array('delete','id'=>$model->id),'confirm'=>'Դուք պատրաստվում եք ջնյել այս մենյուն և նրան պատկանող բոլոր նյութերը')),
				),
		)
);
?>
<br/>
<br/>

<div class="well">

	<h1>Փոփոխել  <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>
</div>