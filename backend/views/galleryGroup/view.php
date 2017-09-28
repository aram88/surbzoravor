<div class="container">
<?php
$this->breadcrumbs=array(
	'Նկարների Խմբերի Ցուցակ'=>array('admin'),
	$model->name,
);

$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-right'),
				'buttons' => array(
						array('label' => 'Ստեղծել', 'url' => '/galleryGroup/create','htmlOptions'=>array( 'class'=>'btn-primary')),
						array('label' => 'Նկարների Խմբերի Ցուցակ', 'url' => '/galleryGroup/admin','htmlOptions'=>array( 'class'=>'btn-success')),
						array('label' => 'Փոփոխել', 'url' => '/galleryGroup/update/'.$model->id,'htmlOptions'=>array( 'class'=>'btn-warning')),
						array('label'=>'Ջնջել','url'=>'#','htmlOptions'=>array('class'=>'btn-danger','submit'=>array('delete','id'=>$model->id),'confirm'=>'Դուք պատրաստվում եք ջնյել աըս նկարների խումբը և նրան պատկանող բոլոր նկարները')),
				),
		)
);

?>

<br/>
<br/>

<div class="well " style="ma">
<h1>Նկարների Խումբ <?php echo $model->name; ?></h1>
<?php

 $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'name',
		'created_date',
		'modified_date',
		array('name'=>'image','type'=>'raw','value'=>CHtml::image($model->image)),
),
)); ?>
</div>
</div>