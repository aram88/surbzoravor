<div class="container">
<?php
$this->breadcrumbs=array(
	'Ընթերցվածքներ'=>array('admin'),
	$model->name,
);

$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-left'),
				'buttons' => array(
						array('label' => 'Ստեղծել', 'url' => '/reading/create','htmlOptions'=>array( 'class'=>'btn-primary')),
						array('label' => 'Ընթերցվածքներ', 'url' => '/reading/admin','htmlOptions'=>array( 'class'=>'btn-success')),
						array('label' => 'Փոփոխել', 'url' => '/reading/update/'.$model->id,'htmlOptions'=>array( 'class'=>'btn-warning')),
						array('label'=>'Ջնջել','url'=>'#','htmlOptions'=>array('class'=>'btn-danger','submit'=>array('delete','id'=>$model->id),'confirm'=>'Դուք պատրաստվում եք ջնյել այս մենյուն և նրան պատկանող բոլոր նյութերը')),
				),
		)
);
?>
<br/>
<br/>
<div class="well">
<h1><?php echo $model->name; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		array('name'=>'day_id', 'value'=>$model->day->name),
		'name',
		array('name'=>'text','type'=>'raw'),
		'created_date',
		'position',
),
)); ?>
</div>
</div>
