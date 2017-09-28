<div class="container">
<?php
$this->breadcrumbs=array(
	'Qgroups'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-left'),
				'buttons' => array(
						array('label' => 'Ստեղծել', 'url' => '/qgroup/create','htmlOptions'=>array( 'class'=>'btn-primary')),
						array('label' => 'Հարցերի խմբեր', 'url' => '/qgroup/admin','htmlOptions'=>array( 'class'=>'btn-success')),
						array('label'=>'Ջնջել','url'=>'#','htmlOptions'=>array('class'=>'btn-danger','submit'=>array('delete','id'=>$model->id),'confirm'=>'Դուք պատրաստվում եք ջնյել այս մենյուն և նրան պատկանող բոլոր նյութերը')),
				),
		)
);
?>
<br/>
<br/>
	<h1>Փոփոխել  <?php echo $model->name; ?></h1>
<div class="well">



<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>
</div>