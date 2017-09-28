<div class="container">
<?php
$this->breadcrumbs=array(
	'Նկարների Խմբերի Ցուցակ'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Փոփոխել',
);

$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-right'),
				'buttons' => array(
						array('label' => 'Ստեղծել', 'url' => '/galleryGroup/create','htmlOptions'=>array( 'class'=>'btn-primary')),
						array('label' => 'Նկարների Խմբերի Ցուցակ', 'url' => '/galleryGroup/admin','htmlOptions'=>array( 'class'=>'btn-success')),
						array('label'=>'Ջնջել','url'=>'#','htmlOptions'=>array('class'=>'btn-danger','submit'=>array('delete','id'=>$model->id),'confirm'=>'Դուք պատրաստվում եք ջնյել աըս նկարների խումբը և նրան պատկանող բոլոր նկարները')),
				),
		)
);

?>
<br/>
<br/>
<div class="well">
	<h1>Փոփոխել  <?php echo $model->name; ?> </h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>
</div>