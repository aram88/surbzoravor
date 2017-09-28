<?php
$this->breadcrumbs=array(
	'Days'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-left'),
				'buttons' => array(
						array('label' => 'Ստեղծել', 'url' => '/day/create','htmlOptions'=>array( 'class'=>'btn-primary')),
						array('label' => 'Օրեր', 'url' => '/day/admin','htmlOptions'=>array( 'class'=>'btn-success')),
						array('label'=>'Ջնջել','url'=>'#','htmlOptions'=>array('class'=>'btn-danger','submit'=>array('delete','id'=>$model->id),'confirm'=>'Դուք պատրաստվում եք ջնյել այս մենյուն և նրան պատկանող բոլոր նյութերը')),
				),
		)
);
?>
<br/>
<br/>
	<h1>Փոփոխել <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>