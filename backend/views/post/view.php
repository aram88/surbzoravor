<div class="container">
<?php
$this->breadcrumbs=array(
	'Նյութեր'=>array('admin'),
	$model->name,
);

$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-left'),
				'buttons' => array(
						array('label' => 'Ստեղծել', 'url' => '/post/create','htmlOptions'=>array( 'class'=>'btn-primary')),
						array('label' => 'Նյութեր', 'url' => '/post/admin','htmlOptions'=>array( 'class'=>'btn-success')),
						array('label' => 'Փոփոխել', 'url' => '/post/update/'.$model->id,'htmlOptions'=>array( 'class'=>'btn-warning')),
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
		array('name'=>'menu_id','value'=>$model->menu_id >0?$model->menu->name:''),
		array('name'=>'stick', 'value'=>app()->params['yesNoArray'][$model->stick]),
		'name',
		array('name'=>'text','type'=>'raw' ),
		'path',
		array('name'=>'visible', 'value'=>app()->params['yesNoArray'][$model->visible]),
		'created_date',
		array('name'=>'home_page', 'value'=>app()->params['yesNoArray'][$model->home_page]),
		array('name'=>'image','value'=>$model->image? CHtml::image($model->getImage('st_')):'','type'=>'raw'),
		array('name'=>'read_all', 'value'=>app()->params['yesNoArray'][$model->read_all]),
		array('name'=>'read', 'value'=>app()->params['yesNoArray'][$model->read]),
),
)); ?>
</div>
</div>