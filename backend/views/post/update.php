<div class="container">
<?php
$this->breadcrumbs=array(
	'Նյուփեր'=>array(''),
	$model->name=>array('view','id'=>$model->id),
	'Փոփոխել',
);

$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-right'),
				'buttons' => array(
						array('label' => 'Ստեղծել', 'url' => '/post/create','htmlOptions'=>array( 'class'=>'btn-primary')),
						array('label' => 'Նյութեր', 'url' => '/post/admin','htmlOptions'=>array( 'class'=>'btn-success')),
						array('label'=>'Ջնջել','url'=>'#','htmlOptions'=>array('class'=>'btn-danger','submit'=>array('delete','id'=>$model->id),'confirm'=>'Դուք պատրաստվում եք ջնյել այս մենյուն և նրան պատկանող բոլոր նյութերը')),
				),
		)
);
?>

	<h1>Փոփոխել  <?php echo $model->name; ?></h1>
<div class="well">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>

</div>