<?php
$this->breadcrumbs=array(
	'Galleries'=>array('index'),
	$model->name,
);

$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-right'),
				'buttons' => array(
						array('label' => 'Ստեղծել', 'url' => '/gallery/create','htmlOptions'=>array( 'class'=>'btn-primary')),
						array('label' => 'Նկարների  Ցուցակ', 'url' => '/gallery/admin','htmlOptions'=>array( 'class'=>'btn-success')),
						array('label' => 'Փոփոխել', 'url' => '/gallery/update/'.$model->id,'htmlOptions'=>array( 'class'=>'btn-warning')),
						array('label'=>'Ջնջել','url'=>'#','htmlOptions'=>array('class'=>'btn-danger','submit'=>array('delete','id'=>$model->id),'confirm'=>'Դուք պատրաստվում եք ջնյել աըս նկարների խումբը և նրան պատկանող բոլոր նկարները')),
				),
		)
);

?>

<br/>
<br/>



<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		array('name'=>'gallery_group_id','value'=>$model->galleryGroup->name),
		'name',
		array('name'=>'image','type'=>'raw','value'=>CHtml::image($model->image)),
		'created_date',
		'modified_date',
),
)); ?>
