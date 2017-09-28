<div class="container">
<?php
$this->breadcrumbs=array(
	'ֆայլեր'=>array('admin'),
	$model->name,
);

$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-left'),
				'buttons' => array(
						array('label' => 'Ստեղծել', 'url' => '/media/create','htmlOptions'=>array( 'class'=>'btn-primary')),
						array('label' => 'ֆայլեր', 'url' => '/admin/admin','htmlOptions'=>array( 'class'=>'btn-success')),
						array('label'=>'Ջնջել','url'=>'#','htmlOptions'=>array('class'=>'btn-danger','submit'=>array('delete','id'=>$model->id),'confirm'=>'Դուք պատրաստվում եք ջնյել այս մենյուն և նրան պատկանող բոլոր նյութերը')),
				),
		)
);
?>
<br/>
<br/>
<h1><?php echo $model->name; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'name',
		'path',
),
)); ?>
</div>