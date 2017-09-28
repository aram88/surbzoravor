<div class="container">
<?php
$this->breadcrumbs=array(
	'Մենյուներ'=>array('admin'),
	$model->name,
);


$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-right'),
				'buttons' => array(
						array('label' => 'Ստեղծել', 'url' => '/menu/create','htmlOptions'=>array( 'class'=>'btn-primary')),
						array('label' => 'Մենյուներ', 'url' => '/menu/admin','htmlOptions'=>array( 'class'=>'btn-success')),
						array('label' => 'Փոփոխել', 'url' => '/menu/update/'.$model->id,'htmlOptions'=>array( 'class'=>'btn-warning')),
						array('label'=>'Ջնջել','url'=>'#','htmlOptions'=>array('class'=>'btn-danger','submit'=>array('delete','id'=>$model->id),'confirm'=>'Դուք պատրաստվում եք ջնյել այս մենյուն և նրան պատկանող բոլոր նյութերը')),
				),
		)
);
?>

<h1><?php echo $model->name; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'name',
		'sub_show',
		'text',
		array('name'=>'image','type'=>'raw','value'=>$model->image == ''?CHtml::image($model->getImage("sm_")):''),
		'visible',
		'created_date',
		'modified_date',
		'position',
		array('name'=>'menu_id', 'value'=>isset($model->menu->name)? $model->menu->name: NULL),
		array('name'=>'location','value'=>$model->location?$model->locationData[$model->location]:''),
		'main_show',
),
)); ?>
</div>
